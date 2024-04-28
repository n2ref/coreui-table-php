<?php
namespace CoreUI\Table\Control;
use CoreUI\Table;


/**
 *
 */
class PageSize extends Table\Abstract\Control {

    use Table\Trait\Attributes;

    protected ?array $list = null;


    /**
     * @param array|null  $list
     * @param string|null $id
     */
    public function __construct(array $list = null, string $id = null) {

        $this->list = $list;

        if ($id) {
            $this->id = $id;
        }
    }


    /**
     * Установка вариантов количества страниц
     * @param array|null $list
     * @return self
     */
    public function setList(array $list = null): self {

        $this->list = $list;
        return $this;
    }


    /**
     * Получение вариантов количества страниц
     * @return array|null
     */
    public function getList():? array {

        return $this->list;
    }


    /**
     * Преобразование в массив
     * @return array
     */
    public function toArray(): array {

        $data = parent::toArray();

        $data['type'] = 'page_size';

        if ( ! is_null($this->attr)) {
            $data['attr'] = $this->attr;
        }
        if ( ! is_null($this->list)) {
            $data['list'] = $this->list;
        }

        return $data;
    }
}