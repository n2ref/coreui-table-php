<?php
namespace CoreUI\Table\Abstract;


/**
 *
 */
abstract class Filter {

    protected ?string $id    = null;
    protected string  $field = '';

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
     * @param string $field
     * @return self
     */
    public function setField(string $field): self {

        $this->field = $field;
        return $this;
    }


    /**
     * @return string
     */
    public function getField(): string {
        return $this->field;
    }


    /**
     * Установка поискового значения
     * @return self
     */
    abstract public function setValue(): self;


    /**
     * Получение поискового значения
     * @return mixed
     */
    abstract public function getValue(): mixed;


    /**
     * @return array
     */
    public function toArray(): array {

        $data = [
            'field' => $this->field
        ];

        if ( ! is_null($this->id)) {
            $data['id'] = $this->id;
        }

        return $data;
    }
}