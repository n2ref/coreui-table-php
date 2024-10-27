<?php
namespace CoreUI\Table\Adapters\Mysql\Search;
use CoreUI\Table\Adapters\Mysql;

/**
 *
 */
class Equal extends Mysql\Search {


    /**
     * Формирование условия для поиска
     * @return string|null
     */
    public function getWhere():? string {

        $where = null;

        $search_value = $this->getValue();
        $search_field = $this->getField();

        if (is_string($search_value) && is_string($search_field)) {
            $search_value = trim($search_value);
            $search_field = trim($search_field);

            if ($search_value != '') {
                $quoted_value = $this->connection->quote($search_value);

                $where = "{$search_field} = {$quoted_value}";
            }
        }

        return $where;
    }
}