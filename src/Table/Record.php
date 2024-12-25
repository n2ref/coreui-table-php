<?php
namespace CoreUI\Table;

use CoreUI\Table\Trait\Attributes;

require_once 'Cell.php';


/**
 *
 */
class Record implements \Iterator {

    use Attributes;

    private array $cells = [];
    private ?array $attr = null;


    /**
     * Row constructor.
     * @param array $record
     */
    public function __construct(array $record) {

        foreach ($record as $key => $cell) {
            $this->cells[$key] = new Cell($cell);
        }
    }


    /**
     * Get cell class
     * @param string $field
     * @return Cell|string
     */
    public function __get(string $field) {

        if ( ! array_key_exists($field, $this->cells)) {
            $this->cells[$field] = new Cell('');
        }

        return $this->cells[$field]->getValue();
    }


    /**
     * Set value in cell
     * @param string $field
     * @param mixed  $value
     */
    public function __set(string $field, mixed $value) {

        if (array_key_exists($field, $this->cells)) {
            $this->cells[$field]->setValue($value);
        } else {
            $this->cells[$field] = new Cell($value);
        }
    }


    /**
     * Check cell
     * @param string $field
     * @return bool
     */
    public function __isset(string $field) {
        return isset($this->cells[$field]);
    }


    /**
     * @param string $field
     * @return Cell
     */
    public function cell(string $field): Cell {

        if ( ! array_key_exists($field, $this->cells)) {
            $this->cells[$field] = new Cell('');
        }

        return $this->cells[$field];
    }


    /**
     * @return void
     */
    public function rewind(): void {
        reset($this->cells);
    }


    /**
     * @return mixed
     */
    public function key(): mixed {
        return key($this->cells);
    }


    /**
     * @return mixed
     */
    public function current(): mixed {
        return current($this->cells)->getValue();
    }


    /**
     * @return bool
     */
    public function valid(): bool {
        return key($this->cells) !== null;
    }


    /**
     * @return void
     */
    public function next(): void {
        next($this->cells);
    }


    /**
     * Очистка полей которые не входят в заданный состав
     * @param array $fields
     * @return void
     */
    public function limitFields(array $fields): void {

        if ( ! empty($this->cells)) {
            foreach ($this->cells as $field => $cell) {

                if ( ! in_array($field, $fields)) {
                    unset($this->cells[$field]);
                }
            }
        }
    }


    /**
     * Преобразование в массив
     * @return array
     */
    public function toArray(): array {

        $data = [];

        if ( ! empty($this->cells)) {
            foreach ($this->cells as $field => $cell) {
                if ($cell instanceof Cell) {
                    $cell_array = $cell->toArray();

                    $data[$field] = $cell_array['value'];

                    if (isset($cell_array['attr'])) {
                        $data['_meta']['fields'][$field]['attr'] = $cell_array['attr'];
                    }
                    if (isset($cell_array['show'])) {
                        $data['_meta']['fields'][$field]['show'] = $cell_array['show'];
                    }
                }
            }
        }

        if ( ! is_null($this->attr)) {
            $data['_meta']['attr'] = $this->attr;
        }

        return $data;
    }
}