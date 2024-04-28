<?php
namespace CoreUI\Table\Column;
use CoreUI\Table\Abstract;
use CoreUI\Table\Trait;


/**
 *
 */
class Button extends Abstract\Column {

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

        $data['type'] = 'button';

        return $data;
    }
}