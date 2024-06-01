<?php
namespace CoreUI\Table\Column;
use CoreUI\Table\Abstract;
use CoreUI\Table\Trait;


/**
 *
 */
class Progress extends Abstract\Column {

    protected ?bool           $show_percent = null;
    protected ?string         $bar_color    = null;
    protected string|int|null $bar_width    = null;
    protected string|int|null $bar_height   = null;

    /**
     * @param string          $field
     * @param string|null     $label
     * @param string|int|null $width
     */
    public function __construct(string $field, string $label = null, string|int $width = null) {

        $this->setField($field);
        $this->setLabel($label);
        $this->setWidth($width);
    }


    /**
     * Установка цвета
     * @param string|null $color
     * @return $this
     */
    public function setBarColor(string $color = null): self {
        $this->bar_color = $color;
        return $this;
    }


    /**
     * Получение цвета
     * @return string|null
     */
    public function getBarColor():? string {
        return $this->bar_color;
    }


    /**
     * Установка отображения процентов
     * @param bool|null $show
     * @return $this
     */
    public function setShowPercent(bool $show = null): self {
        $this->show_percent = $show;
        return $this;
    }


    /**
     * Получение отображения процентов
     * @return bool|null
     */
    public function getShowPercent():? bool {
        return $this->show_percent;
    }


    /**
     * Установка ширины бара
     * @param string|int|null $width
     * @return $this
     */
    public function setBarWidth(string|int $width = null): self {
        $this->bar_width = $width;
        return $this;
    }


    /**
     * Получение ширины бара
     * @return string|int|null
     */
    public function getBarWidth(): string|int|null {
        return $this->bar_width;
    }


    /**
     * Установка высоты бара
     * @param string|int|null $height
     * @return $this
     */
    public function setBarHeight(string|int $height = null): self {
        $this->bar_height = $height;
        return $this;
    }


    /**
     * Получение высоты бара
     * @return string|int|null
     */
    public function getBarHeight(): string|int|null {
        return $this->bar_height;
    }


    /**
     * Установка ширины и высоты бара
     * @param string|int $width
     * @param string|int $height
     * @return $this
     */
    public function setBarSize(string|int $width, string|int $height): self {

        $this->bar_width  = $width;
        $this->bar_height = $height;
        return $this;
    }


    /**
     * Преобразование в массив
     * @return array
     */
    public function toArray(): array {

        $data = parent::toArray();

        $data['type'] = 'progress';

        if ( ! is_null($this->show_percent)) {
            $data['showPercent'] = $this->show_percent;
        }
        if ( ! is_null($this->bar_color)) {
            $data['barColor'] = $this->bar_color;
        }
        if ( ! is_null($this->bar_width)) {
            $data['barWidth'] = $this->bar_width;
        }
        if ( ! is_null($this->bar_height)) {
            $data['barHeight'] = $this->bar_height;
        }

        return $data;
    }
}