<?php
namespace CoreUI\Table\Abstract;


/**
 *
 */
abstract class Search {

    protected ?string $id                = null;
    protected string  $field             = '';
    protected ?string $label             = null;
    protected ?string $description       = null;
    protected ?string $description_title = null;
    protected ?string $prefix            = null;


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
     * @param string|null $label
     * @return $this
     */
    public function setLabel(string $label = null): self {
        $this->label = $label;

        return $this;
    }


    /**
     * @return string
     */
    public function getLabel(): string {
        return $this->label;
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
     * @return string
     */
    public function getDescription(): string {
        return $this->description;
    }


    /**
     * @param string|null $description
     * @return $this
     */
    public function setDescription(string $description = null): self {

        $this->description = $description;
        return $this;
    }


    /**
     * @return string
     */
    public function getDescriptionTitle(): string {
        return $this->description_title;
    }


    /**
     * @param string|null $description
     * @return $this
     */
    public function setDescriptionTitle(string $description = null): self {

        $this->description_title = $description;
        return $this;
    }


    /**
     * @return string
     */
    public function getPrefix(): string {
        return $this->prefix;
    }


    /**
     * @param string|null $prefix
     * @return $this
     */
    public function setPrefix(string $prefix = null): self {

        $this->prefix = $prefix;
        return $this;
    }


    /**
     * Установка поискового значения
     * @return $this
     */
    abstract public function setValue(): self;


    /**
     * Получение поискового значения
     * @return string|null
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
        if ( ! is_null($this->label)) {
            $data['label'] = $this->label;
        }
        if ( ! is_null($this->description)) {
            $data['description'] = $this->description;
        }
        if ( ! is_null($this->description_title)) {
            $data['description_title'] = $this->description_title;
        }
        if ( ! is_null($this->prefix)) {
            $data['prefix'] = $this->prefix;
        }

        return $data;
    }
}