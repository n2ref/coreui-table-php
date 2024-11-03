<?php
namespace CoreUI\Table\Trait;


/**
 *
 */
trait ValueN {

    private string|int|float|null $value_n = null;


    /**
     * Установка не активного значения
     * @param string|int|float|null $value_n
     * @return self
     */
    public function setValueN(string|int|float $value_n = null): self {
        $this->value_n = $value_n;

        return $this;
    }


    /**
     * Получение не активного значения
     * @return string|int|float|null
     */
    public function getValueN(): string|int|float|null {
        return $this->value_n;
    }
}