<?php
namespace CoreUI\Table\Control;
use CoreUI\Table;


/**
 *
 */
class Dropdown extends Table\Abstract\Control {

    use Table\Trait\Attributes;

    const POSITION_START = 'start';
    const POSITION_END   = 'end';

    protected string  $content  = '';
    protected array   $items    = [];
    protected ?string $position = null;


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
     * Установка позиции для выпадающего списка
     * @param string|null $position
     * @return self
     */
    public function setPosition(string $position = null): self {

        $this->position = $position;
        return $this;
    }


    /**
     * Получение позиции для выпадающего списка
     * @return string|null
     */
    public function getPosition():? string {

        return $this->position;
    }


    /**
     * Добавление кнопки
     * @param string      $content
     * @param string|null $id
     * @return Dropdown\Button
     */
    public function addButton(string $content, string $id = null): Dropdown\Button {

        $button = new Dropdown\Button($content, $id);

        $this->items[] = $button;
        return $button;
    }


    /**
     * Добавление ссылки
     * @param string      $content
     * @param string|null $id
     * @return Dropdown\Link
     */
    public function addLink(string $content, string $id = null): Dropdown\Link {

        $button = new Dropdown\Link($content, $id);

        $this->items[] = $button;
        return $button;
    }


    /**
     * Добавление разделителя
     * @return Dropdown
     */
    public function addDivider(): self {

        $this->items[] = [ 'type' => 'divider' ];
        return $this;
    }


    /**
     * Очистка списка
     * @return self
     */
    public function clearItems(): self {

        $this->items = [];
        return $this;
    }


    /**
     * Преобразование в массив
     * @return array
     */
    public function toArray(): array {

        $data = parent::toArray();

        $data['type']    = 'dropdown';
        $data['content'] = $this->content;
        $data['items']   = [];

        foreach ($this->items as $item) {
            if (is_array($item)) {
                $data['items'][] = $item;
            } else {
                $data['items'][] = $item->toArray();
            }
        }

        if ( ! is_null($this->position)) {
            $data['position'] = $this->position;
        }
        if ( ! is_null($this->attr)) {
            $data['attr'] = $this->attr;
        }

        return $data;
    }
}