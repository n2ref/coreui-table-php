<?php
namespace CoreUI\Table\Abstract;
use CoreUI\Table\Trait;


/**
 *
 */
abstract class Column {

    use Trait\Attributes;

    protected ?string         $label       = null;
    protected string          $field       = '';
    protected ?string         $description = null;
    protected string|int|null $width       = null;
    protected string|int|null $min_width   = null;
    protected string|int|null $max_width   = null;
    protected ?string         $fixed       = null;
    protected ?bool           $is_sortable = null;
    protected ?bool           $is_show     = null;
    protected ?array          $attr_header = [];


    /**
     * @param string $field
     * @return self
     */
    public function setField(string $field): self {
        $this->field = $field;
        return $this;
    }


    /**
     * @return string
     */
    public function getField(): string {
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
     * @return $this
     */
    public function setFixedLeft(): self {

        $this->fixed = 'left';
        return $this;
    }


    /**
     * @return self
     */
    public function getFixedRight(): self {

        $this->fixed = 'right';
        return $this;
    }


    /**
     * @param bool|null $is_sort
     * @return $this
     */
    public function setSort(bool $is_sort = null): self {
        $this->is_sortable = $is_sort;
        return $this;
    }


    /**
     * @return bool|null
     */
    public function getSort():? bool {
        return $this->is_sortable;
    }


    /**
     * @param bool|null $is_show
     * @return $this
     */
    public function setShow(bool $is_show = null): self {
        $this->is_show = $is_show;
        return $this;
    }


    /**
     * @return bool|null
     */
    public function getShow():? bool {
        return $this->is_show;
    }


    /**
     * @param string|int|null $width
     * @return $this
     */
    public function setWidth(string|int $width = null): self {
        $this->width = $width;
        return $this;
    }


    /**
     * @return string|int|null
     */
    public function getWidth(): string|int|null {
        return $this->width;
    }


    /**
     * @param string|int|null $width
     * @return $this
     */
    public function setMinWidth(string|int $width = null): self {
        $this->min_width = $width;
        return $this;
    }


    /**
     * @return string|int|null
     */
    public function getMinWidth(): string|int|null {
        return $this->min_width;
    }


    /**
     * @param string|int|null $width
     * @return $this
     */
    public function setMaxWidth(string|int $width = null): self {
        $this->max_width = $width;
        return $this;
    }


    /**
     * @return string|int|null
     */
    public function getMaxWidth(): string|int|null {
        return $this->max_width;
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

        $data = [
            'field' => $this->field
        ];

        if ( ! is_null($this->label)) {
            $data['label'] = $this->label;
        }
        if ( ! is_null($this->description)) {
            $data['description'] = $this->description;
        }
        if ( ! is_null($this->width)) {
            $data['width'] = $this->width;
        }
        if ( ! is_null($this->min_width)) {
            $data['minWidth'] = $this->min_width;
        }
        if ( ! is_null($this->max_width)) {
            $data['maxWidth'] = $this->max_width;
        }
        if ( ! is_null($this->is_show)) {
            $data['show'] = $this->is_show;
        }
        if ( ! is_null($this->is_sortable)) {
            $data['sortable'] = $this->is_sortable;
        }
        if ( ! is_null($this->fixed)) {
            $data['fixed'] = $this->fixed;
        }
        if ( ! empty($this->attr)) {
            $data['attr'] = $this->attr;
        }
        if ( ! empty($this->attr_header)) {
            $data['attrHeader'] = $this->attr_header;
        }

        return $data;
    }
}