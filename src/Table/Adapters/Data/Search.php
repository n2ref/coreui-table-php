<?php
namespace CoreUI\Table\Adapters\Data;


/**
 *
 */
abstract class Search {

    protected mixed   $value = null;
    protected ?string $field = null;


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
     * Поиск
     * @param array $data_value
     * @return bool
     */
    abstract public function isSearchData(mixed $data_value): bool;
}