<?php
namespace CoreUI\Table\Adapters\Data\Search;
use CoreUI\Table\Adapters\Data;

/**
 *
 */
class Equal extends Data\Search {


    /**
     * Поиск
     * @param mixed $data_value
     * @return bool
     */
    public function isSearchData(mixed $data_value): bool {

        $result       = false;
        $search_value = $this->getValue();

        if ($search_value == $data_value) {
            $result = true;
        }

        return $result;
    }
}