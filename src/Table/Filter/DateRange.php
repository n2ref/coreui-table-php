<?php
namespace CoreUI\Table\Filter;
use CoreUI\Table;


/**
 *
 */
class DateRange extends Table\Abstract\Filter {

    use Table\Trait\Attributes;

    private ?string         $label       = null;
    private ?\DateTime      $value_start = null;
    private ?\DateTime      $value_end   = null;
    private string|int|null $width       = null;

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
     * @param \DateTime|null $value_start
     * @param \DateTime|null $value_end
     * @return $this
     */
    public function setValue(\DateTime $value_start = null, \DateTime $value_end = null): self {
        $this->value_start = $value_start;
        $this->value_end   = $value_end;

        return $this;
    }


    /**
     * @return array
     */
    public function getValue(): array {

        return [
            'start' => $this->value_start?->format('Y-m-d'),
            'end'   => $this->value_end?->format('Y-m-d'),
        ];
    }


    /**
     * Преобразование в массив
     * @return array
     */
    public function toArray(): array {

        $data = parent::toArray();

        $data['type'] = 'filter:dateRange';

        if ( ! is_null($this->width)) { $data['width'] = $this->width; }
        if ( ! is_null($this->label)) { $data['label'] = $this->label; }

        if ( ! is_null($this->value_start) || ! is_null($this->value_end)) {
            $data['value'] = [
                'start' => $this->value_start?->format('Y-m-d'),
                'end'   => $this->value_end?->format('Y-m-d'),
            ];
        }

        if ( ! is_null($this->attr)) { $data['attr'] = $this->attr; }

        return $data;
    }
}