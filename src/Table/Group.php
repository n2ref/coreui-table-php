<?php
namespace CoreUI\Table;
use CoreUI\Table\Trait;


/**
 *
 */
class Group {

    use Trait\Attributes;

    private string  $field         = '';
    private ?string $render        = null;
    private ?bool   $is_collapsing = null;


    /**
     * @param string $field
     */
    public function __construct(string $field) {
        $this->field = $field;
    }


    /**
     * @param mixed $field
     * @return $this
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
     * @param mixed $render
     * @return $this
     */
    public function setRenderFunction(string $render = null): self {
        $this->render = $render;
        return $this;
    }


    /**
     * @return string
     */
    public function getRenderFunction(): string {
        return $this->render;
    }


    /**
     * @param bool|null $is_collapsing
     * @return self
     */
    public function setCollapsing(bool $is_collapsing = null): self {
        $this->is_collapsing = $is_collapsing;
        return $this;
    }


    /**
     * @return bool|null
     */
    public function getCollapsing():? bool {
        return $this->is_collapsing;
    }


    /**
     * Преобразование в массив
     * @return array
     */
    public function toArray(): array {

        $data = [
            'field' => $this->field,
        ];

        if ( ! is_null($this->is_collapsing)) {
            $data['isCollapsing'] = $this->is_collapsing;
        }
        if ( ! is_null($this->render)) {
            $data['render'] = $this->render;
        }
        if ( ! is_null($this->attr)) {
            $data['attr'] = $this->attr;
        }

        return $data;
    }
}