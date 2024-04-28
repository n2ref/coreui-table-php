<?php
namespace CoreUI\Table\Control;
use CoreUI\Table\Abstract;
use CoreUI\Table\Trait;


/**
 *
 */
class Button extends Abstract\Control {

    use Trait\Attributes;

    protected string  $content = '';
    protected ?string $onclick = null;


    /**
     * @param string      $content
     * @param string|null $id
     */
    public function __construct(string $content, string $id = null) {

        $this->content = $content;

        if ($id) {
            $this->id = $id;
        }
    }


    /**
     * Установка контента
     * @param string $content
     * @return self
     */
    public function setContent(string $content): self {

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

        $data['type']    = 'button';
        $data['content'] = $this->content;

        if ( ! is_null($this->onclick)) {
            $data['onClick'] = $this->onclick;
        }
        if ( ! is_null($this->attr)) {
            $data['attr'] = $this->attr;
        }

        return $data;
    }
}