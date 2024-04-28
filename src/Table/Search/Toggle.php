<?php
namespace CoreUI\Table\Search;
use CoreUI\Table;


/**
 *
 */
class Toggle extends Table\Abstract\Search {

    private string|int|float|null $value   = null;
    private string|int|float|null $value_y = null;


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
     * Установка активного значения
     * @param string|int|float|null $value_y
     * @return $this
     */
    public function setValueY(string|int|float $value_y = null): self {
        $this->value_y = $value_y;

        return $this;
    }


    /**
     * Получение активного значения
     * @return string|int|float|null
     */
    public function getValueY(): string|int|float|null {
        return $this->value_y;
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

        $data['type']  = 'switch';
        $data['field'] = $this->field;


        if ( ! is_null($this->value)) {
            $data['value'] = $this->value;
        }
        if ( ! is_null($this->value_y)) {
            $data['valueY'] = $this->value_y;
        }

        return $data;
    }
}