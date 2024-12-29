<?php
namespace CoreUI\Table\Control;
use CoreUI\Table;


/**
 *
 */
class FilterClear extends Table\Abstract\Control {

    use Table\Trait\Attributes;

    private ?string $content = null;


    /**
     * @param string|null $content
     * @param string|null $id
     */
    public function __construct(string $content = null, string $id = null) {

        $this->content = $content;

        if ($id) {
            $this->id = $id;
        }
    }


    /**
     * Установка контента
     * @param string|null $content
     * @return self
     */
    public function setContent(string $content = null): self {

        $this->content = $content;
        return $this;
    }


    /**
     * Получение контента
     * @return string|null
     */
    public function getContent():? string {

        return $this->content;
    }


    /**
     * Преобразование в массив
     * @return array
     */
    public function toArray(): array {

        $data = parent::toArray();

        $data['type'] = 'filterClear';

        if ( ! is_null($this->content)) { $data['content'] = $this->content; }
        if ( ! is_null($this->attr))    { $data['attr'] = $this->attr; }

        return $data;
    }
}