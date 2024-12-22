<?php
namespace CoreUI\Table\Control;
use CoreUI\Table;


/**
 *
 */
class Divider extends Table\Abstract\Control {

    use Table\Trait\Attributes;

    protected ?int    $width = null;
    protected ?string $text = null;


    /**
     * @param string|null $id
     */
    public function __construct(string $id = null) {

        if ($id) {
            $this->id = $id;
        }
    }


    /**
     * Установка ширины
     * @param int|null $width
     * @return $this
     */
    public function setWidth(int $width = null): self {
        $this->width = $width;
        return $this;
    }


    /**
     * Получение ширины
     * @return int|null
     */
    public function getWidth():? int {
        return $this->width;
    }


    /**
     * Установка текста
     * @param string|null $text
     * @return $this
     */
    public function setText(string $text = null): self {
        $this->text = $text;
        return $this;
    }


    /**
     * Получение текста
     * @return int|null
     */
    public function getText():? int {
        return $this->text;
    }


    /**
     * Преобразование в массив
     * @return array
     */
    public function toArray(): array {

        $data = parent::toArray();

        $data['type'] = 'divider';

        if ( ! is_null($this->attr))  { $data['attr'] = $this->attr; }
        if ( ! is_null($this->width)) { $data['width'] = $this->width; }
        if ( ! is_null($this->text))  { $data['text'] = $this->text; }

        return $data;
    }
}