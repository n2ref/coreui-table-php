<?php
namespace CoreUI\Table\Filter;
use CoreUI\Table;


/**
 *
 */
class Text extends Table\Abstract\Filter {

    use Table\Trait\Attributes;

    private ?string         $label  = null;
    private ?string         $value  = null;
    private string|int|null $width  = null;
    private ?array          $button = null;

    /**
     * @param string      $field
     * @param string|null $label
     * @param string|null $id
     */
    public function __construct(string $field, string $label = null, string $id = null) {

        $this->field = $field;
        $this->label = $label;

        if ($id) {
            $this->id = $id;
        }
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
     * @return string
     */
    public function getLabel(): string {
        return $this->label;
    }


    /**
     * Установка ширины поля
     * @param string|int|float|null $width
     * @return $this
     */
    public function setWidth(string|int|float $width = null): self {
        $this->width = $width;

        return $this;
    }


    /**
     * Получение ширины поля
     * @return string|int|float|null
     */
    public function getWidth(): string|int|float|null {
        return $this->width;
    }


    /**
     * @return string
     */
    public function getField(): string {
        return $this->field;
    }


    /**
     * @param string $field
     * @return self
     */
    public function setField(string $field): self {

        $this->field = $field;
        return $this;
    }


    /**
     * @param string|null $value
     * @return $this
     */
    public function setValue(string $value = null): self {
        $this->value = $value;

        return $this;
    }


    /**
     * @return string|null
     */
    public function getValue():? string {
        return $this->value;
    }


    /**
     * @param string     $content
     * @param array|null $attr
     * @return $this
     */
    public function setButton(string $content, array $attr = null): self {

        $this->button = [
            'content' => $content,
        ];

        if ( ! empty($attr)) {
            foreach ($attr as $name => $value) {
                if (is_scalar($value)) {
                    $this->button['attr'][$name] = $value;
                }
            }
        }

        return $this;
    }


    /**
     * Преобразование в массив
     * @return array
     */
    public function toArray(): array {

        $data = parent::toArray();

        $data['type'] = 'filter:text';

        if ( ! is_null($this->width)) {
            $data['width'] = $this->width;
        }
        if ( ! is_null($this->label)) {
            $data['label'] = $this->label;
        }
        if ( ! is_null($this->value)) {
            $data['value'] = $this->value;
        }
        if ( ! is_null($this->button)) {
            $data['btn'] = $this->button;
        }
        if ( ! is_null($this->attr)) {
            $data['attr'] = $this->attr;
        }

        return $data;
    }
}