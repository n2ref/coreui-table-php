<?php
namespace CoreUI\Table\Column;
use CoreUI\Table\Abstract;
use CoreUI\Table\Trait;


/**
 *
 */
class Image extends Abstract\Column {

    const STYLE_THUMB   = 'thumb';
    const STYLE_CIRCLE  = 'circle';
    const STYLE_ROUNDED = 'rounded';

    protected ?string $style      = null;
    protected ?bool   $border     = null;
    protected ?int    $img_width  = null;
    protected ?int    $img_height = null;

    /**
     * @param string          $field
     * @param string|null     $label
     * @param string|int|null $width
     */
    public function __construct(string $field, string $label = null, string|int $width = null) {

        $this->setField($field);
        $this->setLabel($label);
        $this->setWidth($width);
        $this->setSort(false);
    }


    /**
     * Установка стиля
     * @param string|null $style
     * @return $this
     */
    public function setStyle(string $style = null): self {
        $this->style = $style;
        return $this;
    }


    /**
     * Получение стиля
     * @return int|null
     */
    public function getStyle():? int {
        return $this->style;
    }


    /**
     * Установка наличия границ
     * @param bool|null $border
     * @return $this
     */
    public function setBorder(bool $border = null): self {
        $this->border = $border;
        return $this;
    }


    /**
     * Получение наличия границ
     * @return bool|null
     */
    public function getBorder():? bool {
        return $this->border;
    }


    /**
     * Установка ширины картинки
     * @param int|null $width
     * @return $this
     */
    public function setImgWidth(int $width = null): self {
        $this->img_width = $width;
        return $this;
    }


    /**
     * Получение ширины картинки
     * @return int|null
     */
    public function getImgWidth():? int {
        return $this->img_width;
    }


    /**
     * Установка высоты картинки
     * @param int|null $height
     * @return $this
     */
    public function setImgHeight(int $height = null): self {
        $this->img_height = $height;
        return $this;
    }


    /**
     * Получение высоты картинки
     * @return int|null
     */
    public function getImgHeight():? int {
        return $this->img_height;
    }


    /**
     * Установка ширины и высоты картинки
     * @param int $width
     * @param int $height
     * @return $this
     */
    public function setImgSize(int $width, int $height): self {

        $this->img_width  = $width;
        $this->img_height = $height;
        return $this;
    }


    /**
     * Преобразование в массив
     * @return array
     */
    public function toArray(): array {

        $data = parent::toArray();

        $data['type'] = 'image';

        if ( ! is_null($this->style)) {
            $data['imgStyle'] = $this->style;
        }
        if ( ! is_null($this->border)) {
            $data['imgBorder'] = $this->border;
        }
        if ( ! is_null($this->img_width)) {
            $data['imgWidth'] = $this->img_width;
        }
        if ( ! is_null($this->img_height)) {
            $data['imgHeight'] = $this->img_height;
        }

        return $data;
    }
}