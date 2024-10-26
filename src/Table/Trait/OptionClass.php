<?php
namespace CoreUI\Table\Trait;


/**
 *
 */
trait OptionClass {

    private ?string $option_class = null;


    /**
     * Установка класса для внешнего вида
     * @param string|null $option_class
     * @return $this
     */
    public function setOptionClass(string $option_class = null): self {
        $this->option_class = $option_class;

        return $this;
    }


    /**
     * Получение класса для внешнего вида
     * @return string|null
     */
    public function getOptionClass():? string {
        return $this->option_class;
    }
}