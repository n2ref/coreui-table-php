<?php
namespace CoreUI\Table\Control;
use CoreUI\Table;


/**
 *
 */
class Pages extends Table\Abstract\Control {

    use Table\Trait\Attributes;

    protected ?int  $count     = null;
    protected ?bool $show_prev = null;
    protected ?bool $show_next = null;


    /**
     * @param int|null    $count
     * @param string|null $id
     */
    public function __construct(int $count = null, string $id = null) {

        $this->count = $count;

        if ($id) {
            $this->id = $id;
        }
    }


    /**
     * Установка размерности пагинации
     * @param int|null $count
     * @return self
     */
    public function setCount(int $count = null): self {

        $this->count = $count;
        return $this;
    }


    /**
     * Получение размерности пагинации
     * @return int|null
     */
    public function getCount():? int {

        return $this->count;
    }


    /**
     * Установка видимости кнопки
     * @param bool|null $show
     * @return self
     */
    public function showPrev(bool $show = null): self {

        $this->show_prev = $show;
        return $this;
    }


    /**
     * Установка видимости кнопки
     * @param bool|null $show
     * @return self
     */
    public function showNext(bool $show = null): self {

        $this->show_next = $show;
        return $this;
    }


    /**
     * Преобразование в массив
     * @return array
     */
    public function toArray(): array {

        $data = parent::toArray();

        $data['type'] = 'pages';

        if ( ! is_null($this->count)) {
            $data['count'] = $this->count;
        }
        if ( ! is_null($this->attr)) {
            $data['attr'] = $this->attr;
        }
        if ( ! is_null($this->show_prev) || ! is_null($this->show_next)) {
            $data['show'] = [
                'prev' => $this->show_prev,
                'next' => $this->show_next,
            ];
        }

        return $data;
    }
}