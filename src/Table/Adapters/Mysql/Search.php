<?php
namespace CoreUI\Table\Adapters\Mysql;


/**
 *
 */
abstract class Search {

    protected mixed     $value      = null;
    protected ?string   $field      = null;
    protected \PDO|null $connection = null;


    /**
     * Установка поискового значения
     * @param mixed $value
     * @return self
     */
    public function setValue(mixed $value): self {

        $this->value = $value;
        return $this;
    }


    /**
     * Получение поискового значения
     * @return mixed
     */
    public function getValue(): mixed {

        return $this->value;
    }


    /**
     * Получение поискового поля
     * @param string $field
     * @return self
     */
    public function setField(string $field): self {

        $this->field = $field;
        return $this;
    }


    /**
     * Установка поискового поля
     * @return string|null
     */
    public function getField():? string {

        return $this->field;
    }


    /**
     * Установка подключения к базе
     * @param \PDO $connection
     * @return mixed
     */
    public function setConnection(\PDO $connection): self {

        $this->connection = $connection;

        return $this;
    }


    /**
     * Формирование условия для поиска
     * @return string|null
     */
    abstract public function getWhere():? string;
}