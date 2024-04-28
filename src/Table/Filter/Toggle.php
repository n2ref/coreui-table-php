<?php
namespace CoreUI\Table\Filter;
use CoreUI\Table\Trait;
use CoreUI\Table\Abstract;


/**
 *
 */
class Toggle extends Abstract\Filter {

    use Trait\ValueY;

    private ?string               $label   = null;
    private string|int|float|null $value   = null;


    /**
     * @param string      $field
     * @param string|null $label
     * @param string|null $id
     */
    public function __construct(string $field, string $label = null, string $id = null) {

        $this->field = $field;
        $this->label = $label;

        if ($id) {
            $this->id = $id;
        }
    }


    /**
     * @return string
     */
    public function getLabel(): string {
        return $this->label;
    }


    /**
     * @param string|null $label
     * @return $this
     */
    public function setLabel(string $label = null): self {
        $this->label = $label;

        return $this;
    }


    /**
     * @return string
     */
    public function getField(): string {
        return $this->field;
    }


    /**
     * @param string $field
     * @return self
     */
    public function setField(string $field): self {

        $this->field = $field;
        return $this;
    }


    /**
     * @param string|null $value
     * @return $this
     */
    public function setValue(string $value = null): self {
        $this->value = $value;

        return $this;
    }


    /**
     * @return string|null
     */
    public function getValue():? string {
        return $this->value;
    }


    /**
     * Преобразование в массив
     * @return array
     */
    public function toArray(): array {

        $data = parent::toArray();

        $data['type'] = 'filter:switch';

        if ( ! is_null($this->label)) {
            $data['label'] = $this->label;
        }
        if ( ! is_null($this->value)) {
            $data['value'] = $this->value;
        }
        if ( ! is_null($this->value_y)) {
            $data['valueY'] = $this->value_y;
        }

        return $data;
    }
}