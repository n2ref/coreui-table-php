<?php
namespace CoreUI\Table\Column;
use CoreUI\Table\Abstract;
use CoreUI\Table\Trait;


/**
 *
 */
class Numbers extends Abstract\Column {

    /**
     * @param string|null $label
     */
    public function __construct(string $label = null) {

        $this->setLabel($label);
    }


    /**
     * Преобразование в массив
     * @return array
     */
    public function toArray(): array {

        $data = parent::toArray();

        $data['type'] = 'numbers';

        return $data;
    }
}