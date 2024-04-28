<?php
namespace CoreUI\Table\Search;
use CoreUI\Table;


/**
 *
 */
class Number extends Table\Abstract\Search {

    use Table\Trait\Attributes;

    private int|float|null        $value_start = null;
    private int|float|null        $value_end   = null;
    private string|int|float|null $width       = null;


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
     * @param int|float|null $start
     * @param int|float|null $end
     * @return $this
     */
    public function setValue(int|float $start = null, int|float $end = null): self {

        $this->value_start = $start;
        $this->value_end   = $end;

        return $this;
    }


    /**
     * Получение поискового значения
     * @return array|null
     */
    public function getValue():? array {
        return [
            'start' => $this->value_start,
            'end'   => $this->value_end,
        ];
    }


    /**
     * Преобразование в массив
     * @return array
     */
    public function toArray(): array {

        $data = parent::toArray();

        $data['type']  = 'number';
        $data['field'] = $this->field;


        if ( ! is_null($this->id)) {
            $data['id'] = $this->id;
        }
        if ( ! is_null($this->width)) {
            $data['width'] = $this->width;
        }
        if ( ! is_null($this->value_start) || ! is_null($this->value_end)) {
            $data['value'] = [
                'start' => $this->value_start,
                'end'   => $this->value_end,
            ];
        }
        if ( ! is_null($this->attr)) {
            $data['attr'] = $this->attr;
        }

        return $data;
    }
}