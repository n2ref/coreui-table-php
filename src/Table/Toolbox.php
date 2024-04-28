<?php
namespace CoreUI\Table;


/**
 *
 */
class Toolbox {

    private string $type   = 'out';
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
     * @param array $controls
     * @return self
     */
    public function left(array $controls): self {

        if (is_null($this->left)) {
            $this->left = [];
        }

        foreach ($controls as $control) {
            if ($control instanceof Abstract\Control) {
                $this->left[] = $controls;
            }
        }

        return $this;
    }


    /**
     * Добавление элементов управления в центральную часть
     * @param array $controls
     * @return self
     */
    public function center(array $controls): self {

        if (is_null($this->center)) {
            $this->center = [];
        }

        foreach ($controls as $control) {
            if ($control instanceof Abstract\Control) {
                $this->center[] = $controls;
            }
        }

        return $this;
    }


    /**
     * Добавление элементов управления в правую часть
     * @param array $controls
     * @return self
     */
    public function right(array $controls): self {

        if (is_null($this->right)) {
            $this->right = [];
        }

        foreach ($controls as $control) {
            if ($control instanceof Abstract\Control) {
                $this->right[] = $controls;
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

        $this->left = null;
        $this->center = null;
        $this->right = null;

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
                if ($control instanceof Abstract\Control) {
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
                if ($control instanceof Abstract\Control) {
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
                if ($control instanceof Abstract\Control) {
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