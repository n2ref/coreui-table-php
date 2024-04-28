<?php
namespace CoreUI\Table\Control;
use CoreUI\Table;


/**
 *
 */
class Caption extends Table\Abstract\Control {

    protected string  $title       = '';
    protected string  $value       = '';
    protected ?string $description = null;


    /**
     * @param string      $title
     * @param string      $value
     * @param string|null $id
     */
    public function __construct(string $title, string $value, string $id = null) {

        $this->title = $title;
        $this->value = $value;

        if ($id) {
            $this->id = $id;
        }
    }


    /**
     * Установка заголовка
     * @param string $title
     * @return self
     */
    public function setTitle(string $title): self {

        $this->title = $title;
        return $this;
    }


    /**
     * Получение заголовка
     * @return string
     */
    public function getTitle(): string {

        return $this->title;
    }


    /**
     * Установка значения
     * @param string $value
     * @return self
     */
    public function setValue(string $value): self {

        $this->value = $value;
        return $this;
    }


    /**
     * Получение значения
     * @return string
     */
    public function getValue(): string {

        return $this->value;
    }


    /**
     * Преобразование в массив
     * @return array
     */
    public function toArray(): array {

        $data = parent::toArray();

        $data['type']  = 'caption';
        $data['title'] = $this->title;
        $data['value'] = $this->value;

        if ( ! is_null($this->description)) {
            $data['description'] = $this->description;
        }

        return $data;
    }
}