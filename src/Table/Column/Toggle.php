<?php
namespace CoreUI\Table\Column;
use CoreUI\Table\Abstract;
use CoreUI\Table\Trait;


/**
 *
 */
class Toggle extends Abstract\Column {

    use Trait\ValueY;

    protected ?bool   $disabled  = null;
    protected ?string $on_change = null;


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
     * @param bool|null $disabled
     * @return $this
     */
    public function setDisabled(bool $disabled = null): self {
        $this->disabled = $disabled;
        return $this;
    }


    /**
     * @return bool|null
     */
    public function getDisabled():? bool {
        return $this->disabled;
    }


    /**
     * @param string|null $on_change
     * @return $this
     */
    public function setOnChange(string $on_change = null): self {
        $this->on_change = $on_change;
        return $this;
    }


    /**
     * @return string|null
     */
    public function getOnChange():? string {
        return $this->on_change;
    }


    /**
     * Преобразование в массив
     * @return array
     */
    public function toArray(): array {

        $data = parent::toArray();

        $data['type'] = 'switch';

        if ( ! is_null($this->value_y)) {
            $data['valueY'] = $this->value_y;
        }
        if ( ! is_null($this->disabled)) {
            $data['disabled'] = $this->disabled;
        }
        if ( ! is_null($this->on_change)) {
            $data['onChange'] = $this->on_change;
        }

        return $data;
    }
}