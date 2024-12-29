<?php
namespace CoreUI\Table\Control;
use CoreUI\Table;


/**
 *
 */
class ButtonGroup extends Table\Abstract\Control {

    protected array $buttons = [];


    /**
     * @param string|null $id
     */
    public function __construct(string $id = null) {

        if ($id) {
            $this->id = $id;
        }
    }


    /**
     * Добавление кнопки
     * @param string      $content
     * @param string|null $id
     * @return Button
     */
    public function addButton(string $content, string $id = null): Button {

        $button = new Button($content, $id);

        $this->buttons[] = $button;

        return $button;
    }


    /**
     * Добавление ссылки
     * @param string      $content
     * @param string      $url
     * @param string|null $id
     * @return Link
     */
    public function addLink(string $content, string $url = '#', string $id = null): Link {

        $link = new Link($content, $url, $id);

        $this->buttons[] = $link;

        return $link;
    }


    /**
     * Добавление выпадающего списка
     * @param string      $content
     * @param string|null $id
     * @return Dropdown
     */
    public function addDropdown(string $content, string $id = null): Dropdown {

        $dropdown = new Dropdown($content, $id);

        $this->buttons[] = $dropdown;

        return $dropdown;
    }


    /**
     * Очистка добавленных кнопок
     * @return self
     */
    public function clearButtons(): self {

        $this->buttons = [];
        return $this;
    }


    /**
     * Преобразование в массив
     * @return array
     */
    public function toArray(): array {

        $data = parent::toArray();

        $data['type']    = 'buttonGroup';
        $data['buttons'] = [];

        foreach ($this->buttons as $buttons) {
            $data['items'][] = $buttons->toArray();
        }

        return $data;
    }
}