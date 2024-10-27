<?php
namespace CoreUI\Table\Adapters\Mysql\Search;
use CoreUI\Table\Adapters\Mysql;

/**
 *
 */
class Custom extends Mysql\Search {


    /**
     * Формирование условия для поиска
     * @return string|null
     */
    public function getWhere():? string {

        $where = null;

        $search_value = $this->getValue();
        $search_field = $this->getField();

        if (is_string($search_field)) {
            $search_field = trim($search_field);

            if (is_string($search_value) || is_numeric($search_value)) {
                if ($search_value != '') {
                    $where = str_replace("%?%", $this->connection->quote("%{$search_value}%"), $search_field);
                    $where = str_replace("%?",  $this->connection->quote("%{$search_value}"),  $where);
                    $where = str_replace("?%",  $this->connection->quote("{$search_value}%"),  $where);
                    $where = str_replace("?",   $this->connection->quote($search_value),       $where);
                }

            } elseif (is_array($search_value)) {
                foreach ($search_value as $key => $value) {
                    if (is_string($value) || is_numeric($value)) {
                        $value = $this->connection->quote($value);

                        if (is_string($key)) {
                            $search_field = str_replace(":{$key}", $value, $search_field);

                        } elseif (is_numeric($key)) {
                            $count = 1;
                            $search_field = str_replace("?", $value, $search_field, $count);
                        }
                    }
                }

                $where = $search_field;
            }
        }

        return $where;
    }
}