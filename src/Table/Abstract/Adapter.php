<?php
namespace CoreUI\Table\Abstract;


use CoreUI\Table\Exception;

abstract class Adapter {

    protected int    $page        = 1;
    protected ?int   $page_count  = 25;
    protected ?array $sort        = null;
    protected ?array $search      = null;
    protected bool   $is_fetched  = false;
    protected int    $total_count = 0;
    protected array  $records     = [];


    /**
     * Установка страницы и количества строк
     * @param int      $page
     * @param int|null $page_count
     * @return $this
     * @throws Exception
     */
    public function setPage(int $page, int $page_count = null): self {

        if ($page < 0) {
            throw new Exception('Incorrect page param');
        }
        if ($page_count < 0) {
            throw new Exception('Incorrect page_count param');
        }

        $this->page       = $page;
        $this->page_count = $page_count;
        return $this;
    }


    /**
     * Установка количества строк на странице
     * @param int|null $page_count
     * @return $this
     */
    public function setPageCount(int $page_count = null): self {

        $this->page_count = $page_count;
        return $this;
    }


    /**
     * Установка сортировки
     * @param array $sort_data
     * @param array $sort_fields
     * @return self
     */
    abstract public function setSort(array $sort_data, array $sort_fields): self;


    /**
     * Установка поиска
     * @param array $search_data
     * @param array $search_fields
     * @return self
     */
    abstract public function setSearch(array $search_data, array $search_fields): self;


    /**
     * Получение данных
     * @return array
     */
    abstract public function fetchRecords(): array;
}