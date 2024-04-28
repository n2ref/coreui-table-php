<?php
namespace CoreUI\Table\Column;
use CoreUI\Table\Abstract;
use CoreUI\Table\Trait;


/**
 *
 */
class Money extends Abstract\Column {

    use Trait\NoWrap;

    protected ?string $currency = null;

    /**
     * @param string      $field
     * @param string|null $label
     */
    public function __construct(string $field, string $label = null) {

        $this->setField($field);
        $this->setLabel($label);
    }


    /**
     * @param string|null $currency
     * @return $this
     */
    public function setCurrency(string $currency = null): self {
        $this->currency = $currency;
        return $this;
    }


    /**
     * @return string|null
     */
    public function getCurrency():? string {
        return $this->currency;
    }


    /**
     * Преобразование в массив
     * @return array
     */
    public function toArray(): array {

        $data = parent::toArray();

        $data['type'] = 'money';

        if ( ! is_null($this->currency)) {
            $data['currency'] = $this->currency;
        }
        if ( ! is_null($this->is_no_wrap)) {
            $data['noWrap'] = $this->is_no_wrap;
        }
        if ( ! is_null($this->is_no_wrap_toggle)) {
            $data['noWrapToggle'] = $this->is_no_wrap_toggle;
        }

        return $data;
    }
}