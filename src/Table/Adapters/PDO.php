<?php
namespace CoreUI\Table\Adapters;
use CoreUI\Table;
use CoreUI\Table\Exception;

require_once 'Mysql/Select.php';


/**
 *
 */
abstract class PDO extends Table\Abstract\Adapter {

    const CALC_NONE  = 'none';
    const CALC_ALL   = 'all';
    const CALC_ROUND = 'round';

    protected ?\PDO   $connection   = null;
    protected string  $query        = '';
    protected ?array  $query_params = null;
    protected ?string $query_result = null;
    protected string  $total_calc   = self::CALC_NONE;



    /**
     * @param \PDO|null $connection
     */
    public function __construct(\PDO $connection = null) {

        $this->connection = $connection;
    }


    /**
     * Получение sql запроса который выполняется для получения данных
     * @return string
     */
    public function getQueryResult(): string {

        return $this->query_result;
    }


    /**
     * Установка обработчика для работы с базой
     * @param \PDO $connection
     * @return $this
     */
    public function setConnection(\PDO $connection): self {
        $this->connection = $connection;

        return $this;
    }


    /**
     * Получение обработчика для работы с базой
     * @return \PDO|null
     */
    public function getConnection():? \PDO {

        return $this->connection;
    }


    /**
     * @param string $calc_total
     * @return $this
     */
    public function setCalcTotal(string $calc_total): self {
        $this->total_calc = $calc_total;

        return $this;
    }


    /**
     * Установка базового запроса для получения данных из базы
     * @param string     $query
     * @param array|null $params
     * @return $this
     */
    public function setQuery(string $query, array $params = null): self {

        $this->query        = $query;
        $this->query_params = $params;
        return $this;
    }


    /**
     * Получение количества
     * @return int|null
     */
    public function getTotalCount():? int {

        return $this->total_count;
    }


    /**
     * Установка сортировки
     * @param array $sort_data
     * @param array $sort_fields
     * @return self
     */
    public function setSort(array $sort_data, array $sort_fields): self {

        $this->sort = [];

        foreach ($sort_data as $sort) {

            if ( ! empty($sort['field']) &&
                 ! empty($sort['order']) &&
                isset($sort_fields[$sort['field']]) &&
                is_string($sort_fields[$sort['field']]) &&
                is_string($sort['order']) &&
                in_array(strtolower($sort['order']), ['asc', 'desc'])
            ) {
                $this->sort[$sort['field']] = [
                    'order' => strtolower($sort['order']),
                    'query' => $sort_fields[$sort['field']],
                ];
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
    abstract public function setSearch(array $search_data, array $search_fields): self;


    /**
     * Получение данных из базы
     * @return array
     * @throws Exception
     */
    public function fetchRecords(): array {

        if ( ! $this->is_fetched) {
            if (empty($this->connection)) {
                throw new Table\Exception('Connection db not found');
            }

            if (empty($this->query)) {
                throw new Table\Exception('Query not found');
            }

            $this->records    = $this->fetchData();
            $this->is_fetched = true;
        }

        return $this->records;
    }


    /**
     * @param string     $query
     * @param array|null $params
     * @return array
     */
    protected function fetchAll(string $query, array $params = null): array {

        $sth = $this->connection->prepare($query);

        if ( ! empty($params)) {
            foreach ($params as $name => $param) {
                if ( ! is_numeric($name)) {
                    $sth->bindParam($name, $param, is_int($param) ? \PDO::PARAM_INT : \PDO::PARAM_STR);
                    unset($params[$name]);
                }
            }
        }

        $sth->execute($params ?: null);

        return $sth->fetchAll(\PDO::FETCH_ASSOC) ?: [];
    }


    /**
     * @param string     $query
     * @param array|null $params
     * @return string|null
     */
    protected function fetchOne(string $query, array $params = null):? string {

        $result = $this->fetchAll($query, $params);

        return $result ? current(current($result)) : null;
    }
}