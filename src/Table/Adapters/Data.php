<?php
namespace CoreUI\Table\Adapters;
use CoreUI\Table;


/**
 *
 */
class Data extends Table\Abstract\Adapter {

    private array $data = [];


    /**
     * @param array $data
     * @return $this
     */
    public function setData(array $data): self {

        $this->data = $data;
        return $this;
    }


    /**
     * Получение данных.
     * @return array
     * @throws \Exception
     */
    public function fetchRecords(): array {

        if ( ! $this->is_fetched && ! empty($this->data)) {
            $this->is_fetched = true;

            if ( ! empty($this->search)) {
                $this->data = $this->searchData($this->data, $this->search);
            }

            if ( ! empty($this->sort)) {
                $this->data = $this->sortRecords($this->data, $this->sort);
            }


            $this->total_count = count($this->data);

            if ($this->total_count > (($this->page - 1) * $this->page_count) - $this->page_count) {
                $data_result = $this->pageData($this->data, $this->page_count, $this->page);

                if ( ! empty($data_result)) {
                    foreach ($data_result as $row) {
                        $this->records[] = new Table\Record($row);
                    }
                }

            } else {
                $this->records = [];
            }
        }

        return $this->records;
    }


    /**
     * Установка сортировки
     * @param array $sort_data
     * @param array $sort_fields
     * @return self
     */
    public function setSort(array $sort_data, array $sort_fields): self {

        $this->sort = [];

        foreach ($sort_data as $field => $order) {

            if (is_string($order) &&
                in_array(strtolower($order), ['asc', 'desc']) &&
                in_array($field, $sort_fields)
            ) {
                $this->sort[$field] = strtolower($order);
            }
        }

        return $this;
    }


    /**
     * Установка поиска
     * @param array $search_data
     * @param array $search_fields
     * @return self
     */
    public function setSearch(array $search_data, array $search_fields): Table\Abstract\Adapter {

        $this->search = [];

        foreach ($search_data as $field => $search_value) {

            if (isset($search_fields[$field]) &&
                $search_fields[$field] instanceof Data\Search
            ) {
                $this->search[$field] = $search_fields[$field]
                    ->setField($field)
                    ->setValue($search_value);
            }
        }

        return $this;
    }


    /**
     * Поиск
     * @param array $data
     * @param array $search_items
     * @return array
     */
    private function searchData(array $data, array $search_items): array {

        foreach ($data as $key => $row) {

            foreach ($search_items as $field => $search) {

                if ( ! array_key_exists($field, $row)) {
                    unset($data[$key]);
                    continue 2;
                }

                if ($search instanceof Data\Search &&
                    ! $search->isSearchData($row[$field])
                ) {
                    unset($data[$key]);
                    continue 2;
                }
            }
        }

        return $data;
    }


    /**
     * Сортировка
     * @param array $data
     * @param array $sort_fields
     * @param int   $sort_flag
     * @return array
     */
    private function sortRecords(array $data, array $sort_fields, int $sort_flag = SORT_REGULAR): array {

        $args = [];

        foreach ($sort_fields as $field => $direction) {
            $col    = array_column($data, $field);
            $args[] = $col;

            if ('asc' === $direction) {
                $args[] = SORT_ASC;
            } else {
                $args[] = SORT_DESC;
            }

            $args[] = $sort_flag;
        }

        $args[] = $data;
        call_user_func_array("array_multisort", $args);

        return $data;
    }


    /**
     * Страница
     * @param array $data
     * @param int   $records_per_page
     * @param int   $current_page
     * @return array
     */
    private function pageData(array $data, int $records_per_page, int $current_page = 1): array {

        $new_data = [];
        $offset   = ($current_page - 1) * $records_per_page;
        $i        = 1;

        foreach ($data as $key => $row) {
            if ($current_page == 1) {
                if ($i <= $records_per_page) {
                    $new_data[$key] = $row;
                } else {
                    break;
                }

            } elseif ($current_page > 1) {
                if ($offset < $i && $i <= $offset + $records_per_page) {
                    $new_data[$key] = $row;

                } elseif ($offset < $i && $i > $offset + $records_per_page) {
                    break;
                }

            } else {
                break;
            }

            $i++;
        }

        return $new_data;
    }
}