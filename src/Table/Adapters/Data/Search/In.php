<?php
namespace CoreUI\Table\Adapters\Data\Search;
use CoreUI\Table\Adapters\Data;

/**
 *
 */
class In extends Data\Search {


    /**
     * Поиск
     * @param mixed $data_value
     * @return bool
     */
    public function isSearchData(mixed $data_value): bool {

        $result       = false;
        $search_value = $this->getValue();

        if (is_array($search_value) &&
            (is_string($data_value) || is_numeric(is_string($data_value))) &&
            (in_array('', $search_value) || in_array($data_value, $search_value))
        ) {
            $result = true;
        }

        return $result;
    }
}