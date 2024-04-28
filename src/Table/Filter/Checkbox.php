<?php
namespace CoreUI\Table\Filter;
use CoreUI\Table;


/**
 *
 */
class Checkbox extends Table\Abstract\Filter {

    private ?string $label   = null;
    private ?array  $value   = null;
    private ?array  $options = null;


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
    public function getLabel(): string {
        return $this->label;
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
    public function getOptions(): array|null {
        return $this->options;
    }


    /**
     * Установка поискового значения
     * @param array|null $checked_items
     * @return $this
     */
    public function setValue(array $checked_items = null): self {
        $this->value = $checked_items;

        return $this;
    }


    /**
     * Получение поискового значения
     * @return array|null
     */
    public function getValue():? array {
        return $this->value;
    }


    /**
     * Преобразование в массив
     * @return array
     */
    public function toArray(): array {

        $data = parent::toArray();

        $data['type']  = 'filter:checkbox';

        if ( ! is_null($this->value)) {
            $data['value'] = $this->value;
        }
        if ( ! is_null($this->options)) {
            $data['options'] = $this->options;
        }

        return $data;
    }
}