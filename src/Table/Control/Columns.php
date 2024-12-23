<?php
namespace CoreUI\Table\Control;
use CoreUI\Table;


/**
 *
 */
class Columns extends Table\Abstract\Control {

    private ?array $button          = null;
    private ?array $button_complete = null;


    /**
     * @param string|null $id
     */
    public function __construct(string $id = null) {

        if ($id) {
            $this->id = $id;
        }
    }


    /**
     * @param string|null $content
     * @param array|null  $attr
     * @return $this
     */
    public function setButton(string $content = null, array $attr = null): self {

        if ($content === null && $attr === null) {
            $this->button = null;

        } else {
            $this->button = [];

            if ( ! empty($content)) {
                $this->button['content'] = $content;
            }

            if ( ! empty($attr)) {
                foreach ($attr as $name => $value) {
                    if (is_scalar($value)) {
                        $this->button['attr'][$name] = $value;
                    }
                }
            }
        }

        return $this;
    }


    /**
     * @param string|null $content
     * @param array|null  $attr
     * @return $this
     */
    public function setButtonComplete(string $content = null, array $attr = null): self {


        if ($content === null && $attr === null) {
            $this->button_complete = null;

        } else {
            $this->button_complete = [];

            if ( ! empty($content)) {
                $this->button_complete['content'] = $content;
            }

            if ( ! empty($attr)) {
                foreach ($attr as $name => $value) {
                    if (is_scalar($value)) {
                        $this->button_complete['attr'][$name] = $value;
                    }
                }
            }
        }

        return $this;
    }


    /**
     * Преобразование в массив
     * @return array
     */
    public function toArray(): array {

        $data = parent::toArray();

        $data['type'] = 'columns';

        if ( ! is_null($this->button)) {
            $data['btn'] = $this->button;
        }
        if ( ! is_null($this->button_complete)) {
            $data['btnComplete'] = $this->button_complete;
        }

        return $data;
    }
}