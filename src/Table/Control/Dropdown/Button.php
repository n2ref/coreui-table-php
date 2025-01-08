<?php
namespace CoreUI\Table\Control\Dropdown;
use CoreUI\Table;

/**
 * 
 */
class Button {

    protected ?string $id      = null;
    protected string  $content = '';
    protected string  $onclick = '';


    /**
     * @param string      $content
     * @param string      $onclick
     * @param string|null $id
     */
    public function __construct(string $content, string $onclick = '', string $id = null) {

        $this->content = $content;
        $this->onclick = $onclick;

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
     * @return string
     */
    public function getContent(): string {

        return $this->content;
    }


    /**
     * Установка события
     * @param string $onclick
     * @return self
     */
    public function setOnClick(string $onclick): self {

        $this->onclick = $onclick;
        return $this;
    }


    /**
     * Получение события
     * @return string
     */
    public function getOnClick(): string {

        return $this->onclick;
    }


    /**
     * Преобразование в массив
     * @return array
     */
    public function toArray(): array {

        $data = [
            'type'    => 'button',
            'content' => $this->content,
            'onClick' => $this->onclick,
        ];

        if ( ! is_null($this->id)) {
            $data['id'] = $this->id;
        }

        return $data;
    }
}