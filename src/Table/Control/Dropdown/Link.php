<?php
namespace CoreUI\Table\Control\Dropdown;

/**
 * 
 */
class Link {

    protected string $content = '';
    protected string $url     = '';


    /**
     * @param string $content
     * @param string $url
     */
    public function __construct(string $content, string $url = '#') {

        $this->content = $content;
        $this->url     = $url;
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
     * Установка ссылки
     * @param string $url
     * @return self
     */
    public function setUrl(string $url): self {

        $this->url = $url;
        return $this;
    }


    /**
     * Получение ссылки
     * @return string
     */
    public function getUrl(): string {

        return $this->url;
    }


    /**
     * Преобразование в массив
     * @return array
     */
    public function toArray(): array {

        return [
            'type'    => 'link',
            'content' => $this->content,
            'url'     => $this->url,
        ];
    }
}