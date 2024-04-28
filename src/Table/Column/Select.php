<?php
namespace CoreUI\Table\Column;
use CoreUI\Table\Abstract;


/**
 *
 */
class Select extends Abstract\Column {

    /**
     * @param string      $field
     * @param string|null $label
     */
    public function __construct(string $field, string $label = null) {

        $this->setField($field);
        $this->setLabel($label);
    }


    /**
     * Преобразование в массив
     * @return array
     */
    public function toArray(): array {

        $data = parent::toArray();

        $data['type'] = 'select';

        return $data;
    }
}