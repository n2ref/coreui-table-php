<?php
namespace CoreUI\Table\Search;
use CoreUI\Table;


/**
 *
 */
class Text extends Table\Abstract\Search {

    use Table\Trait\Attributes;

    private ?string               $value = null;
    private string|int|float|null $width = null;


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
     * Установка поискового значения
     * @param string|null $value
     * @return $this
     */
    public function setValue(string $value = null): self {
        $this->value = $value;

        return $this;
    }


    /**
     * Получение поискового значения
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

        $data['type']  = 'text';
        $data['field'] = $this->field;


        if ( ! is_null($this->width)) {
            $data['width'] = $this->width;
        }
        if ( ! is_null($this->value)) {
            $data['value'] = $this->value;
        }
        if ( ! is_null($this->attr)) {
            $data['attr'] = $this->attr;
        }

        return $data;
    }
}