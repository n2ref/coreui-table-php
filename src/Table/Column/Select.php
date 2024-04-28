<?php
namespace CoreUI\Table\Column;
use CoreUI\Table\Abstract;


/**
 *
 */
class Select extends Abstract\Column {


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