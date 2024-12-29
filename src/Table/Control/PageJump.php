<?php
namespace CoreUI\Table\Control;
use CoreUI\Table;


/**
 *
 */
class PageJump extends Table\Abstract\Control {

    use Table\Trait\Attributes;


    /**
     * @param string|null $id
     */
    public function __construct(string $id = null) {

        if ($id) {
            $this->id = $id;
        }
    }


    /**
     * Преобразование в массив
     * @return array
     */
    public function toArray(): array {

        $data = parent::toArray();

        $data['type'] = 'pageJump';

        if ( ! is_null($this->attr)) {
            $data['attr'] = $this->attr;
        }

        return $data;
    }
}