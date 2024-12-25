<?php
namespace CoreUI\Table\Trait;


/**
 *
 */
trait ValueY {

    private string|int|float|null $value_y = 1;


    /**
     * Установка активного значения
     * @param string|int|float|null $value_y
     * @return $this
     */
    public function setValueY(string|int|float $value_y = null): self {
        $this->value_y = $value_y;

        return $this;
    }


    /**
     * Получение активного значения
     * @return string|int|float|null
     */
    public function getValueY(): string|int|float|null {
        return $this->value_y;
    }
}