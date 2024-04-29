<?php
namespace CoreUI\Table\Adapters;
use CoreUI\Table;

/**
 *
 */
class Mysql extends PDO {


    /**
     * Установка поиска
     * @param array $search_data
     * @param array $search_fields
     * @return self
     */
    public function setSearch(array $search_data, array $search_fields): self {

        $this->search = [];

        foreach ($search_data as $search) {

            if (is_array($search) &&
                ! empty($search['field']) &&
                isset($search['value']) &&
                is_string($search['field']) &&
                (is_string($search['value']) || is_array($search['value'])) &&
                isset($search_fields[$search['field']]) &&
                $search_fields[$search['field']] instanceof Mysql\Search
            ) {
                $search_fields[$search['field']]
                    ->setConnection($this->getConnection())
                    ->setValue($search['value']);

                $this->search[$search['field']] = $search_fields[$search['field']];
            }
        }

        return $this;
    }


    /**
     * Получение данных по запросу sql
     * @return array
     */
    protected function fetchData(): array {

        $select = new Mysql\Select($this->query);

        if ( ! empty($this->search)) {
            foreach ($this->search as $search) {
                if ($search instanceof Mysql\Search) {
                    $select->addWhere($search->getWhere());
                }
            }
        }


        if ( ! empty($this->sort)) {
            $order = [];
            foreach ($this->sort as $sort) {
                $order[] = "{$sort['query']} {$sort['order']}";
            }
            $select->setOrderBy(implode(', ', $order));
        }


        $records_per_page = $this->total_calc === self::CALC_ROUND
            ? $this->page_count + 1
            : $this->page_count;

        $offset = ($this->page - 1) * $this->page_count;


        if ($this->total_calc === self::CALC_ROUND) {
            $select_sql = $select->getSql();

            if (str_contains($select_sql, ' SQL_CALC_FOUND_ROWS')) {
                $select_sql = str_replace(' SQL_CALC_FOUND_ROWS', "", $select_sql);
            }

            $explain = $this->fetchAll("EXPLAIN {$select_sql}", $this->query_params);

            foreach ($explain as $value) {
                if ($value['rows'] > $this->total_count) {
                    $this->total_count = $value['rows'];
                }
            }

            $select->setLimit($records_per_page, $offset);
            $this->query_result = $select->getSql();

            $result = $this->fetchAll($this->query_result, $this->query_params);

            if (count($result) > $this->page_count) {
                $this->total_count = $offset + $this->page_count;
                unset($result[array_key_last($result)]);

            } else {
                $this->total_count = $offset + count($result);
            }

        } else {
            $select->setLimit($records_per_page, $offset);
            $this->query_result = $select->getSql();

            if ( ! str_contains($this->query_result, ' SQL_CALC_FOUND_ROWS')) {
                $this->query_result = preg_replace('~^(\s*SELECT\s+)~', "$1SQL_CALC_FOUND_ROWS ", $this->query_result);
            }

            $result            = $this->fetchAll($this->query_result, $this->query_params);
            $this->total_count = (int)$this->fetchOne("SELECT FOUND_ROWS()");
        }


        $records = [];

        if ( ! empty($result)) {
            foreach ($result as $record) {
                if (is_array($record)) {
                    $records[] = new Table\Record($record);

                } elseif ($record instanceof Table\Record) {
                    $records[] = $record;
                }
            }
        }

        return $records;
    }
}