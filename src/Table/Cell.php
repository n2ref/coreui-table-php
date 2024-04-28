<?php
namespace CoreUI\Table;
use CoreUI\Table\Trait;


/**
 *
 */
class Cell {

    use Trait\Attributes;

    private mixed  $value   = '';
    private ?bool  $is_show = null;


    /**
     * @param mixed $value
     */
    public function __construct(mixed $value) {
        $this->value = $value;
    }


    /**
     * @return string
     */
    public function __toString(): string {
        return (string)$this->value;
    }


    /**
     * @param mixed $value
     * @return Cell
     */
    public function setValue(mixed $value): self {
        $this->value = $value;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getValue(): mixed {
        return $this->value;
    }


    /**
     * @param bool|null $is_show
     * @return self
     */
    public function setShow(bool $is_show = null): self {
        $this->is_show = $is_show;
        return $this;
    }


    /**
     * @return bool|null
     */
    public function getShow():? bool {
        return $this->is_show;
    }


    /**
     * Преобразование в массив
     * @return array
     */
    public function toArray(): array {

        $data = [
            'value' => $this->value,
        ];

        if ( ! is_null($this->is_show)) {
            $data['show'] = $this->is_show;
        }
        if ( ! is_null($this->attr)) {
            $data['attr'] = $this->attr;
        }

        return $data;
    }
}