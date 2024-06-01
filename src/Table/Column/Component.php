<?php
namespace CoreUI\Table\Column;
use CoreUI\Table\Abstract;
use CoreUI\Table\Trait;


/**
 *
 */
class Component extends Abstract\Column {

    /**
     * @param string          $field
     * @param string|null     $label
     * @param string|int|null $width
     */
    public function __construct(string $field, string $label = null, string|int $width = null) {

        $this->setField($field);
        $this->setLabel($label);
        $this->setWidth($width);
        $this->setSort(false);
    }


    /**
     * Преобразование в массив
     * @return array
     */
    public function toArray(): array {

        $data = parent::toArray();

        $data['type'] = 'component';

        return $data;
    }
}