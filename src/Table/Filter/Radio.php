<?php
namespace CoreUI\Table\Filter;
use CoreUI\Table;


/**
 *
 */
class Radio extends Table\Abstract\Filter {

    private ?string               $label   = null;
    private string|int|float|null $value   = null;
    private ?array                $options = null;


    /**
     * @param string      $field
     * @param string|null $label
     * @param string|null $id
     */
    public function __construct(string $field, string $label = null, string $id = null) {

        $this->setField($field);
        $this->setLabel($label);

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
     * Установка вариантов значений
     * @param array|null $options
     * @return $this
     */
    public function setOptions(array $options = null): self {
        $this->options = $options;

        return $this;
    }


    /**
     * Получение вариантов значений
     * @return array|null
     */
    public function getOptions():? array {
        return $this->options;
    }


    /**
     * Установка поискового значения
     * @param string|int|float|null $value
     * @return $this
     */
    public function setValue(string|int|float $value = null): self {
        $this->value = $value;

        return $this;
    }


    /**
     * Получение поискового значения
     * @return string|int|float|null
     */
    public function getValue(): string|int|float|null {
        return $this->value;
    }


    /**
     * Преобразование в массив
     * @return array
     */
    public function toArray(): array {

        $data = parent::toArray();

        $data['type']  = 'filter:radio';

        if ( ! is_null($this->value)) {
            $data['value'] = $this->value;
        }
        if ( ! is_null($this->options)) {
            $data['options'] = $this->options;
        }

        return $data;
    }
}