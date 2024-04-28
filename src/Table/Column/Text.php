<?php
namespace CoreUI\Table\Column;
use CoreUI\Table\Abstract;
use CoreUI\Table\Trait;


/**
 *
 */
class Text extends Abstract\Column {

    use Trait\NoWrap;

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
     * Преобразование в массив
     * @return array
     */
    public function toArray(): array {

        $data = parent::toArray();

        $data['type'] = 'text';

        if ( ! is_null($this->is_no_wrap)) {
            $data['noWrap'] = $this->is_no_wrap;
        }
        if ( ! is_null($this->is_no_wrap_toggle)) {
            $data['noWrapToggle'] = $this->is_no_wrap_toggle;
        }

        return $data;
    }
}