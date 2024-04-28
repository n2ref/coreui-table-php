<?php
namespace CoreUI\Table\Adapters\Data\Search;
use CoreUI\Table\Adapters\Data;

/**
 *
 */
class Number extends Data\Search {


    /**
     * Поиск
     * @param mixed $data_value
     * @return bool
     */
    public function isSearchData(mixed $data_value): bool {

        $result       = false;
        $search_value = $this->getValue();

        if (is_array($search_value) && (is_string($data_value) || is_numeric($data_value))) {
            if ( ! empty($search_value['start']) && empty($search_value['end'])) {
                if ($data_value >= $search_value['start']) {
                    $result = true;
                }

            } elseif (empty($search_value['start']) && ! empty($search_value['end'])) {
                if ($data_value <= $search_value['end']) {
                    $result = true;
                }

            } elseif ( ! empty($search_value['start']) && ! empty($search_value['end'])) {
                if ($data_value <= $search_value['start'] ||
                    $data_value >= $search_value['end']
                ) {
                    $result = true;
                }
            }
        }

        return $result;
    }
}