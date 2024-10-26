<?php
namespace CoreUI\Table\Search;
use CoreUI\Table\Trait;

/**
 *
 */
class RadioBtn extends Radio {

    use Trait\OptionClass;

    /**
     * Преобразование в массив
     * @return array
     */
    public function toArray(): array {

        $data = parent::toArray();

        $data['type'] = 'radioBtn';

        if ( ! empty($this->option_class)) {
            $data['optionClass'] = $this->option_class;
        }

        return $data;
    }
}