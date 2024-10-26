<?php
namespace CoreUI\Table\Search;
use CoreUI\Table\Trait;


/**
 *
 */
class CheckboxBtn extends Checkbox {

    use Trait\OptionClass;

    /**
     * Преобразование в массив
     * @return array
     */
    public function toArray(): array {

        $data = parent::toArray();

        $data['type'] = 'checkboxBtn';

        if ( ! empty($this->option_class)) {
            $data['optionClass'] = $this->option_class;
        }

        return $data;
    }
}