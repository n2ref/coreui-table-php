<?php
namespace CoreUI\Table\Abstract;
use CoreUI\Table\Trait;


/**
 *
 */
abstract class Column {

    use Trait\Attributes;

    protected ?string         $label         = null;
    protected ?string         $field         = null;
    protected ?string         $description   = null;
    protected string|int|null $width         = null;
    protected string|int|null $min_width     = null;
    protected string|int|null $max_width     = null;
    protected ?string         $fixed         = null;
    protected ?bool           $is_sortable   = null;
    protected ?bool           $is_show       = null;
    protected ?bool           $is_show_label = null;
    protected ?array          $attr_header   = [];
    protected ?bool           $menu_always   = null;
    protected array           $menu          = [];


    /**
     * @param string|null $field
     * @return $this
     */
    public function setField(string $field = null): self {
        $this->field = $field;
        return $this;
    }


    /**
     * @return string|null
     */
    public function getField():? string {
        return $this->field;
    }


    /**
     * @return string
     */
    public function getLabel(): string {
        return $this->label;
    }


    /**
     * @param string|null $label
     * @return $this
     */
    public function setLabel(string $label = null): self {
        $this->label = $label;
        return $this;
    }


    /**
     * Установка описания для колонки
     * @param string|null $description
     * @return self
     */
    public function setDescription(string $description = null): self {

        $this->description = $description;
        return $this;
    }


    /**
     * Получение описания для колонки
     * @return string|null
     */
    public function getDescription():? string {
        return $this->description;
    }


    /**
     * Установка признака, что колонка будет зафиксирована слева
     * @return $this
     */
    public function setFixedLeft(): self {

        $this->fixed = 'left';
        return $this;
    }


    /**
     * Установка признака, что колонка будет зафиксирована справа
     * @return self
     */
    public function setFixedRight(): self {

        $this->fixed = 'right';
        return $this;
    }


    /**
     * Установка признака будет ли сортироваться колонка
     * @param bool|null $is_sort
     * @return $this
     */
    public function setSort(bool $is_sort = null): self {
        $this->is_sortable = $is_sort;
        return $this;
    }


    /**
     * Получение признака будет ли сортироваться колонка
     * @return bool|null
     */
    public function getSort():? bool {
        return $this->is_sortable;
    }


    /**
     * Установка признака будет ли отображаться колонка
     * @param bool|null $is_show
     * @return $this
     */
    public function setShow(bool $is_show = null): self {
        $this->is_show = $is_show;
        return $this;
    }


    /**
     * Получение признака будет ли отображаться колонка
     * @return bool|null
     */
    public function getShow():? bool {
        return $this->is_show;
    }


    /**
     * Установка признака будет ли отображаться название колонки
     * @param bool|null $is_show_label
     * @return $this
     */
    public function setShowLabel(bool $is_show_label = null): self {
        $this->is_show_label = $is_show_label;
        return $this;
    }


    /**
     * Получение признака будет ли отображаться название колонки
     * @return bool|null
     */
    public function getShowLabel():? bool {
        return $this->is_show_label;
    }


    /**
     * Установка ширины колонки
     * @param string|int|null $width
     * @return $this
     */
    public function setWidth(string|int $width = null): self {
        $this->width = $width;
        return $this;
    }


    /**
     * Получение ширины колонки
     * @return string|int|null
     */
    public function getWidth(): string|int|null {
        return $this->width;
    }


    /**
     * Установка минимальной ширины колонки
     * @param string|int|null $width
     * @return $this
     */
    public function setMinWidth(string|int $width = null): self {
        $this->min_width = $width;
        return $this;
    }


    /**
     * Получение минимальной ширины колонки
     * @return string|int|null
     */
    public function getMinWidth(): string|int|null {
        return $this->min_width;
    }


    /**
     * Установка максимальной ширины колонки
     * @param string|int|null $width
     * @return $this
     */
    public function setMaxWidth(string|int $width = null): self {
        $this->max_width = $width;
        return $this;
    }


    /**
     * Получение максимальной ширины колонки
     * @return string|int|null
     */
    public function getMaxWidth(): string|int|null {
        return $this->max_width;
    }


    /**
     * Указывает, будет ли меню видно всегда
     * @param bool|null $is_show
     * @return $this
     */
    public function showMenuAlways(bool $is_show = null): self {

        $this->menu_always = $is_show;
        return $this;
    }


    /**
     * Добавление пункта меню для колонки
     * @param string $text
     * @return $this
     */
    public function addMenuHeader(string $text): self {

        $this->menu[] = [
            'type' => 'header',
            'text' => $text,
        ];

        return $this;
    }


    /**
     * Добавление пункта меню для колонки
     * @param string     $text
     * @param string     $on_click
     * @param array|null $attr
     * @return $this
     */
    public function addMenuButton(string $text, string $on_click, array $attr = null): self {

        $this->menu[] = [
            'type'    => 'button',
            'text'    => $text,
            'onClick' => $on_click,
            'attr'    => $attr,
        ];

        return $this;
    }


    /**
     * Добавление пункта меню для колонки
     * @param string     $text
     * @param string     $url
     * @param array|null $attr
     * @return $this
     */
    public function addMenuLink(string $text, string $url, array $attr = null): self {

        $this->menu[] = [
            'type' => 'link',
            'text' => $text,
            'url'  => $url,
            'attr' => $attr,
        ];

        return $this;
    }


    /**
     * Добавление разделителя для меню в колонке
     * @return $this
     */
    public function addMenuDivider(): self {

        $this->menu[] = [
            'type' => 'divider',
        ];

        return $this;
    }


    /**
     * Очистка всех пунктов меню
     * @return $this
     */
    public function clearMenu(): self {

        $this->menu = [];
        return $this;
    }


    /**
     * Установка значения атрибута
     * @param string $name
     * @param string $value
     * @return self
     */
    public function setAttrHeader(string $name, string $value): self {

        if (is_null($this->attr_header)) {
            $this->attr_header = [];
        }

        $this->attr_header[$name] = $value;

        return $this;
    }


    /**
     * Установка значения в начале атрибута
     * @param string $name
     * @param string $value
     * @return self
     */
    public function setAttrHeaderPrepend(string $name, string $value): self {

        if (is_null($this->attr_header)) {
            $this->attr_header = [];
        }

        $this->attr_header[$name] = array_key_exists($name, $this->attr_header)
            ? $value . $this->attr_header[$name]
            : $value;

        return $this;
    }


    /**
     * Установка значения в конце атрибута
     * @param string $name
     * @param string $value
     * @return self
     */
    public function setAttrHeaderAppend(string $name, string $value): self {

        if (is_null($this->attr_header)) {
            $this->attr_header = [];
        }

        $this->attr_header[$name] = array_key_exists($name, $this->attr_header)
            ? $this->attr_header[$name] . $value
            : $value;

        return $this;
    }


    /**
     * Добавление класса
     * @param string $value
     * @return self
     */
    public function addAttrHeaderClass(string $value): self {

        if (is_null($this->attr_header)) {
            $this->attr_header = [];
        }

        $value = trim($value);

        if ($value != '') {
            $name = 'class';

            if (array_key_exists($name, $this->attr_header)) {
                $value_quote = preg_quote($value);

                if (preg_match("~(^| ){$value_quote}( |$)~", $this->attr_header[$name]) === false) {
                    $this->attr_header[$name] .= " {$value}";
                }

            } else {
                $this->attr_header[$name] = $value;
            }
        }

        return $this;
    }


    /**
     * Удаление класса
     * @param string $value
     * @return self
     */
    public function removeAttrHeaderClass(string $value): self {

        if ( ! is_null($this->attr_header)) {
            $value = trim($value);

            if ($value != '') {
                $name = 'class';

                if (array_key_exists($name, $this->attr_header)) {
                    $value_quote = preg_quote($value);

                    $this->attr_header[$name] = preg_replace("~(^| ){$value_quote}( |$)~", '', $this->attr_header[$name]);
                }
            }
        }

        return $this;
    }


    /**
     * Установка атрибутов
     * @param array $attributes
     * @return self
     */
    public function setAttributesHeader(array $attributes): self {

        if (is_null($this->attr_header)) {
            $this->attr_header = [];
        }

        foreach ($attributes as $attr => $value) {
            if (is_string($value) || is_numeric($value)) {
                $this->attr_header[$attr] = $value;
            }
        }

        return $this;
    }


    /**
     * Получение всех атрибутов
     * @return array|null
     */
    public function getAttributesHeader():? array {
        return $this->attr_header;
    }


    /**
     * @param string $name
     * @return string|null
     */
    public function getAttrHeader(string $name):? string {

        if ($this->attr_header && array_key_exists($name, $this->attr_header)) {
            return $this->attr_header[$name];
        } else {
            return null;
        }
    }


    /**
     * @return array
     */
    public function toArray(): array {

        $data = [];

        if ( ! is_null($this->field))         { $data['field']       = $this->field; }
        if ( ! is_null($this->label))         { $data['label']       = $this->label; }
        if ( ! is_null($this->description))   { $data['description'] = $this->description; }
        if ( ! is_null($this->width))         { $data['width']       = $this->width; }
        if ( ! is_null($this->min_width))     { $data['minWidth']    = $this->min_width; }
        if ( ! is_null($this->max_width))     { $data['maxWidth']    = $this->max_width; }
        if ( ! is_null($this->is_show))       { $data['show']        = $this->is_show; }
        if ( ! is_null($this->is_show_label)) { $data['showLabel']   = $this->is_show_label; }
        if ( ! is_null($this->is_sortable))   { $data['sortable']    = $this->is_sortable; }
        if ( ! is_null($this->fixed))         { $data['fixed']       = $this->fixed; }
        if ( ! empty($this->attr))            { $data['attr']        = $this->attr; }
        if ( ! empty($this->attr_header))     { $data['attrHeader']  = $this->attr_header; }

        if ( ! empty($this->menu)) {
            if (isset($this->menu_always)) {
                $data['menu']['showAlways'] = $this->menu_always;
            }

            $data['menu']['items'] = $this->menu;
        }


        return $data;
    }
}