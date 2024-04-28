<?php
namespace CoreUI\Table\Abstract;


/**
 *
 */
abstract class Control {

    protected ?string $id = null;


    /**
     * Установка идентификатора
     * @param string|null $id
     * @return $this
     */
    public function setId(string $id = null): self {
        $this->id = $id;

        return $this;
    }


    /**
     * Получение идентификатора
     * @return string|null
     */
    public function getId():? string {
        return $this->id;
    }


    /**
     * @return array
     */
    public function toArray(): array {

        $data = [];

        if ( ! is_null($this->id)) {
            $data['id'] = $this->id;
        }

        return $data;
    }
}