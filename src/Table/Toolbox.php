<?php
namespace CoreUI\Table;


/**
 *
 */
class Toolbox {

    private string $type   = '';
    private ?array $left   = null;
    private ?array $center = null;
    private ?array $right  = null;


    /**
     * @param string $type
     */
    public function __construct(string $type) {

        $this->type = $type;
    }


    /**
     * @return string
     */
    public function getType(): string {
        return $this->type;
    }


    /**
     * Добавление элементов управления в левую часть
     * @param array  $controls
     * @param string $position
     * @return self
     */
    public function left(array $controls, string $position = \CoreUI\Table::LAST): self {

        if (is_null($this->left)) {
            $this->left = [];
        }

        foreach ($controls as $control) {
            if ($control instanceof Abstract\Control ||
                $control instanceof Abstract\Filter
            ) {
                if ($position === \CoreUI\Table::LAST) {
                    $this->left[] = $control;

                } elseif ($position === \CoreUI\Table::FIRST) {
                    array_unshift($this->left , $control);
                }
            }
        }

        return $this;
    }


    /**
     * Добавление элементов управления в центральную часть
     * @param array  $controls
     * @param string $position
     * @return self
     */
    public function center(array $controls, string $position = \CoreUI\Table::LAST): self {

        if (is_null($this->center)) {
            $this->center = [];
        }

        foreach ($controls as $control) {
            if ($control instanceof Abstract\Control ||
                $control instanceof Abstract\Filter
            ) {
                if ($position === \CoreUI\Table::LAST) {
                    $this->center[] = $control;

                } elseif ($position === \CoreUI\Table::FIRST) {
                    array_unshift($this->center , $control);
                }

                $this->center[] = $control;
            }
        }

        return $this;
    }


    /**
     * Добавление элементов управления в правую часть
     * @param array  $controls
     * @param string $position
     * @return self
     */
    public function right(array $controls, string $position = \CoreUI\Table::LAST): self {

        if (is_null($this->right)) {
            $this->right = [];
        }

        foreach ($controls as $control) {
            if ($control instanceof Abstract\Control ||
                $control instanceof Abstract\Filter
            ) {
                if ($position === \CoreUI\Table::LAST) {
                    $this->right[] = $control;

                } elseif ($position === \CoreUI\Table::FIRST) {
                    array_unshift($this->right , $control);
                }
            }
        }

        return $this;
    }


    /**
     * Очистка элементов управления в левой части
     * @return $this
     */
    public function clearLeft(): self {
        $this->left = null;

        return $this;
    }


    /**
     * Очистка элементов управления в центральной части
     * @return $this
     */
    public function clearCenter(): self {
        $this->center = null;

        return $this;
    }


    /**
     * Очистка элементов управления в правой части
     * @return $this
     */
    public function clearRight(): self {
        $this->right = null;

        return $this;
    }


    /**
     * Очистка элементов управления
     * @return $this
     */
    public function clearAll(): self {

        $this->left   = null;
        $this->center = null;
        $this->right  = null;

        return $this;
    }


    /**
     * @return array
     */
    public function toArray(): array {

        $result = [
            'type' => $this->type
        ];

        if ( ! is_null($this->left)) {
            $left = [];

            foreach ($this->left as $control) {
                if ($control instanceof Abstract\Control ||
                    $control instanceof Abstract\Filter
                ) {
                    $left[] = $control->toArray();
                }
            }

            if ($left) {
                $result['left'] = $left;
            }
        }

        if ( ! is_null($this->center)) {
            $center = [];

            foreach ($this->center as $control) {
                if ($control instanceof Abstract\Control ||
                    $control instanceof Abstract\Filter
                ) {
                    $center[] = $control->toArray();
                }
            }

            if ($center) {
                $result['center'] = $center;
            }
        }

        if ( ! is_null($this->right)) {
            $right = [];

            foreach ($this->right as $control) {
                if ($control instanceof Abstract\Control ||
                    $control instanceof Abstract\Filter
                ) {
                    $right[] = $control->toArray();
                }
            }

            if ($right) {
                $result['right'] = $right;
            }
        }

        return $result;
    }
}