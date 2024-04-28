<?php
namespace CoreUI\Table\Adapters\Data\Search;
use CoreUI\Table\Adapters\Data;

/**
 *
 */
class Text extends Data\Search {


    /**
     * Поиск
     * @param mixed $data_value
     * @return bool
     */
    public function isSearchData(mixed $data_value): bool {

        $result       = false;
        $search_value = $this->getValue();

        if (is_string($search_value) && is_string($data_value)) {
            $search_value = trim($search_value);

            if ($search_value != '' &&
                mb_stripos($data_value, $search_value, 0, 'utf8') !== false
            ) {
                $result = true;
            }
        }

        return $result;
    }
}