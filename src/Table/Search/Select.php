<?php
namespace CoreUI\Table\Search;
use CoreUI\Table;


/**
 *
 */
class Select extends Table\Abstract\Search {

    use Table\Trait\Attributes;

    private ?array                $value = null;
    private string|int|float|null $width = null;
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
     * Установка ширины поля
     * @param string|int|float|null $width
     * @return $this
     */
    public function setWidth(string|int|float $width = null): self {
        $this->width = $width;

        return $this;
    }


    /**
     * Получение ширины поля
     * @return string|int|float|null
     */
    public function getWidth(): string|int|float|null {
        return $this->width;
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
     * @param array|null $selected_items
     * @return $this
     */
    public function setValue(array $selected_items = null): self {
        $this->value = $selected_items;

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

        $data['type']  = 'select';
        $data['field'] = $this->field;


        if ( ! is_null($this->width)) {
            $data['width'] = $this->width;
        }
        if ( ! is_null($this->value)) {
            $data['value'] = $this->value;
        }
        if ( ! is_null($this->options)) {
            $data['options'] = $this->options;
        }
        if ( ! is_null($this->attr)) {
            $data['attr'] = $this->attr;
        }

        return $data;
    }
}