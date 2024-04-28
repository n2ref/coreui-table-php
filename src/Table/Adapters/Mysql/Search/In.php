<?php
namespace CoreUI\Table\Adapters\Mysql\Search;
use CoreUI\Table\Adapters\Mysql;

/**
 *
 */
class In extends Mysql\Search {


    /**
     * Формирование условия для поиска
     * @return string
     */
    public function getWhere(): string {

        $where = null;

        $search_value = $this->getValue();
        $search_field = $this->getField();

        if (is_array($search_value) && is_string($search_field)) {
            $search_field = trim($search_field);

            $values = [];

            foreach ($search_value as $value) {
                if (is_string($value) || is_numeric($value)) {
                    $values[] = $this->connection->quote($value);
                }
            }

            if ($values) {
                $quoted_value = implode(',', $values);
                $where        = "{$search_field} IN({$quoted_value})";
            }
        }

        return $where;
    }
}