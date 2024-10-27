<?php
namespace CoreUI\Table\Adapters\Mysql\Search;
use CoreUI\Table\Adapters\Mysql;

/**
 *
 */
class Between extends Mysql\Search {


    /**
     * Формирование условия для поиска
     * @return string|null
     */
    public function getWhere():? string {

        $where = null;

        $search_value = $this->getValue();
        $search_field = $this->getField();

        if (is_array($search_value) && is_string($search_field)) {
            $search_field = trim($search_field);

            if ( ! empty($search_value['start']) && empty($search_value['end'])) {
                $quoted_value = $this->connection->quote($search_value['start']);
                $where = "{$search_field} >= {$quoted_value}";

            } elseif (empty($search_value['start']) && ! empty($search_value['end'])) {
                $quoted_value = $this->connection->quote($search_value['end']);
                $where = "{$search_field} <= {$quoted_value}";

            } elseif ( ! empty($search_value['start']) && ! empty($search_value['end'])) {
                $quoted_value1 = $this->connection->quote($search_value['start']);
                $quoted_value2 = $this->connection->quote($search_value['end']);
                $where = "{$search_field} BETWEEN {$quoted_value1} AND {$quoted_value2}";
            }
        }

        return $where;
    }
}