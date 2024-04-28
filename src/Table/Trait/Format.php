<?php
namespace CoreUI\Table\Trait;


/**
 *
 */
trait Format {

    protected ?string $format = null;


    /**
     * Установка формата даты
     * YYYY, MM, M, DD, D, hh, mm, m, ss, s
     * @param string|null $format
     * @return $this
     */
    public function setFormat(string $format = null): self {
        $this->format = $format;
        return $this;
    }


    /**
     * Получение формата даты
     * @return string|null
     */
    public function getFormat():? string {
        return $this->format;
    }
}