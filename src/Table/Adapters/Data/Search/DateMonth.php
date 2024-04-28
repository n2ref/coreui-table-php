<?php
namespace CoreUI\Table\Adapters\Data\Search;
use CoreUI\Table\Adapters\Data;

/**
 *
 */
class DateMonth extends Data\Search {


    /**
     * Поиск
     * @param mixed $data_value
     * @return bool
     * @throws \Exception
     */
    public function isSearchData(mixed $data_value): bool {

        $result       = false;
        $search_value = $this->getValue();

        if (is_string($data_value) &&
            is_string($search_value) &&
            preg_match('~^[\d]{4}\-[\d]{1,2}$~', $search_value)
        ) {

            $data_value = strtotime($data_value);

            $date_start = new \DateTime("{$search_value}-01 00:00:00");
            $date_end   = new \DateTime($date_start->format('Y-m-t 23:59:59'));

            if ($data_value >= $date_start->getTimestamp() &&
                $data_value <= $date_end->getTimestamp()
            ) {
                $result = true;
            }
        }

        return $result;
    }
}