<?php
namespace CoreUI\Table;


/**
 *
 */
class Columns {

    private array $columns = [];


    /**
     * Добавление колонки
     * @param string     $content
     * @param array|null $attributes
     * @return self
     */
    public function addColumn(string $content, array $attributes = null): self {

        $column = [
            'content' => $content,
        ];

        if ( ! is_null($attributes)) {
            foreach ($attributes as $name => $value) {
                if (is_string($name) && (is_string($value) || is_numeric($value))) {
                    if ( ! isset($column['attr'])) {
                        $column['attr'] = [];
                    }

                    $column['attr'][$name] = $value;
                }
            }
        }

        $this->columns[] = $column;

        return $this;
    }


    /**
     * @return array
     */
    public function toArray(): array {

        return $this->columns;
    }
}