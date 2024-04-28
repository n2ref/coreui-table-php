<?php
namespace CoreUI\Table\Control;
use CoreUI\Table;


/**
 *
 */
class Link extends Table\Abstract\Control {

    use Table\Trait\Attributes;

    protected string  $content = '';
    protected string  $url     = '';
    protected ?string $onclick = null;


    /**
     * @param string      $content
     * @param string      $url
     * @param string|null $id
     */
    public function __construct(string $content, string $url = '#', string $id = null) {

        $this->content = $content;
        $this->url     = $url;

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
     * Установка обработчика нажатия на кнопку
     * @param string|null $onclick
     * @return self
     */
    public function setOnClick(string $onclick = null): self {

        $this->onclick = $onclick;
        return $this;
    }


    /**
     * Получение обработчика нажатия на кнопку
     * @return string|null
     */
    public function getOnClick():? string {

        return $this->onclick;
    }


    /**
     * Преобразование в массив
     * @return array
     */
    public function toArray(): array {

        $data = parent::toArray();

        $data['type']    = 'link';
        $data['content'] = $this->content;
        $data['url']     = $this->url;

        if ( ! is_null($this->onclick)) {
            $data['onClick'] = $this->onclick;
        }
        if ( ! is_null($this->attr)) {
            $data['attr'] = $this->attr;
        }

        return $data;
    }
}