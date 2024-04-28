<?php
namespace CoreUI\Table\Control;
use CoreUI\Table;


/**
 *
 */
class Custom extends Table\Abstract\Control {

    protected string $content = '';


    /**
     * @param string      $content
     * @param string|null $id
     */
    public function __construct(string $content = '', string $id = null) {

        $this->content = $content;

        if ($id) {
            $this->id = $id;
        }
    }


    /**
     * Установка содержимого
     * @param string $content
     * @return self
     */
    public function setContent(string $content): self {

        $this->content = $content;
        return $this;
    }


    /**
     * Получение содержимого
     * @return string
     */
    public function getContent(): string {

        return $this->content;
    }


    /**
     * Преобразование в массив
     * @return array
     */
    public function toArray(): array {

        $data = parent::toArray();

        $data['type']    = 'custom';
        $data['content'] = $this->content;


        return $data;
    }
}