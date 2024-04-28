<?php
namespace CoreUI;


/**
 *
 */
class Table {

    protected ?string         $id               = null;
    protected ?int            $page             = null;
    protected ?int            $records_per_page = null;
    protected ?array          $group            = null;
    protected ?string         $on_click         = null;
    protected ?string         $click_url        = null;
    protected int|string|null $max_height       = null;
    protected int|string|null $min_height       = null;
    protected int|string|null $height           = null;
    protected int|string|null $max_width        = null;
    protected int|string|null $min_width        = null;
    protected int|string|null $width            = null;
    protected ?string         $class_style      = null;
    protected ?string         $primary_key      = null;
    protected ?bool           $show_headers     = null;
    protected ?bool           $no_border        = null;
    protected ?bool           $no_wrap          = null;
    protected ?bool           $no_wrap_toggle   = null;
    protected ?bool           $save_state       = null;
    protected ?bool           $overflow         = null;
    protected ?int            $thead_top        = null;
    protected ?string         $lang             = null;
    protected ?array          $lang_list        = null;
    protected ?array          $records_request  = null;
    protected ?array          $header           = null;
    protected ?array          $footer           = null;
    protected ?array          $sort             = null;
    protected ?array          $columns_header   = null;
    protected ?array          $columns_footer   = null;
    protected ?array          $search           = null;
    protected array           $columns          = [];
    protected array           $records          = [];


    /**
     * @param string|null $table_id
     */
    public function __construct(string $table_id = null) {

        if ($table_id) {
            $this->id = $table_id;
        }
    }


    /**
     * Событие выполняемое при клике на строку
     * @param string|null $on_click
     * @return self
     */
    public function setClick(string $on_click = null): self {

        $this->on_click = $on_click;
        return $this;
    }


    /**
     * Адрес открываемый при клике на строку
     * @param string|null $click_url
     * @return self
     */
    public function setClickUrl(string $click_url = null): self {

        $this->click_url = $click_url;
        return $this;
    }


    /**
     * Установка количества строк на странице
     * @param int $count
     * @return self
     * @throws \Exception
     */
    public function setRecordsPerPage(int $count): self {

        if ($count < 0) {
            throw new \Exception('Incorrect value specified');
        }

        $this->records_per_page = $count;
        return $this;
    }


    /**
     * Получение текущего id
     * @param string|null $id
     * @return self
     */
    public function setId(string $id = null): self {

        $this->id = $id;
        return $this;
    }


    /**
     * Получение текущего id
     * @return string
     */
    public function getId(): string {

        return $this->id;
    }


    /**
     * Получение текущей страницы
     * @return int
     */
    public function getPage(): int {

        return $this->page;
    }


    /**
     * Получение текущего количества строк на странице
     * @return int
     */
    public function getRecordsPerPage(): int {

        return $this->records_per_page;
    }


    /**
     * Установка максимальной высоты
     * @param int|string $max_height
     * @return self
     */
    public function setMaxHeight(int|string $max_height): self {

        $this->max_height = $max_height;
        return $this;
    }


    /**
     * Установка минимальной высоты
     * @param int|string $min_height
     * @return self
     */
    public function setMinHeight(int|string $min_height): self {

        $this->min_height = $min_height;
        return $this;
    }


    /**
     * Установка высоты
     * @param int|string $height
     * @return self
     */
    public function setHeight(int|string $height): self {

        $this->height = $height;
        return $this;
    }


    /**
     * Установка максимальной ширины
     * @param int|string $max_width
     * @return self
     */
    public function setMaxWidth(int|string $max_width): self {

        $this->max_width = $max_width;
        return $this;
    }


    /**
     * Установка минимальной ширины
     * @param int|string $min_width
     * @return self
     */
    public function setMinWidth(int|string $min_width): self {

        $this->min_width = $min_width;
        return $this;
    }


    /**
     * Установка ширины
     * @param int|string $width
     * @return self
     */
    public function setWidth(int|string $width): self {

        $this->width = $width;
        return $this;
    }


    /**
     * Установка класса
     * @param string $class_style
     * @return self
     */
    public function setClass(string $class_style): self {

        $this->class_style = $class_style;
        return $this;
    }


    /**
     * Установка первичного поля
     * @param string|null $primary_key
     * @return self
     */
    public function setPrimaryKey(string $primary_key = null): self {

        $this->primary_key = $primary_key;
        return $this;
    }


    /**
     * Установка видимости заголовка
     * @param bool|null $column_headers
     * @return self
     */
    public function setColumnHeader(bool $column_headers = null): self {

        $this->column_headers = $column_headers;
        return $this;
    }


    /**
     * Установка первичного поля
     * @param bool|null $overflow
     * @return self
     */
    public function setOverflow(bool $overflow = null): self {

        $this->overflow = $overflow;
        return $this;
    }


    /**
     * Установка высоты на которой заголовок будет оставаться.
     * Работает при неактивном overflow
     * @param bool|null $thead_top
     * @return self
     */
    public function setTheadTop(bool $thead_top = null): self {

        $this->thead_top = $thead_top;
        return $this;
    }


    /**
     * Убирает внешние границы с таблицы
     * @param bool|null $no_border
     * @return self
     */
    public function setNoBorder(bool $no_border = null): self {

        $this->no_border = $no_border;
        return $this;
    }


    /**
     * Установка ограничения текста в рамках одной строки для всех возможных колонок
     * @param bool|null $no_wrap
     * @return self
     */
    public function setNoWrap(bool $no_wrap = null): self {

        $this->no_wrap = $no_wrap;
        return $this;
    }


    /**
     * Установка кнопки разворачивания и сворачивания содержимого в no_wrap колонках
     * @param bool|null $no_wrap_toggle
     * @return self
     */
    public function setNoWrapToggle(bool $no_wrap_toggle = null): self {

        $this->no_wrap_toggle = $no_wrap_toggle;
        return $this;
    }


    /**
     * Указывает сохранять ли измененные состояния таблицы.
     * Если активно, то при формировании таблицы сохраненные состояния будут в приоритете.
     * @param bool|null $save_state
     * @return self
     */
    public function setSaveState(bool $save_state = null): self {

        $this->save_state = $save_state;
        return $this;
    }


    /**
     * Установка параметров для загрузки содержимого таблицы
     * @param string|null $url
     * @param string      $method
     * @param array|null  $params
     * @return self
     */
    public function setRecordsRequest(string $url = null, string $method = 'GET', array $params = null): self {

        if ($url === null) {
            $this->records_request = null;

        } else {
            $this->records_request = [
                'url'    => $url,
                'method' => $method,
            ];

            if ( ! empty($params)) {
                $this->records_request['params'] = [];

                foreach ($params as $name => $value) {
                    if (is_string($value) && $value) {
                        $this->records_request['params'][$name] = $value;
                    }
                }
            }
        }

        return $this;
    }


    /**
     * Установка данных
     * @param mixed $records
     */
    public function setRecords(array $records): self {

        $this->records = [];

        foreach ($records as $record) {
            if ($record instanceof Table\Record) {
                $this->records[] = $record;

            } elseif (is_array($record)) {
                $this->records[] = new Table\Record($record);
            }
        }

        return $this;
    }


    /**
     * Получение данных
     * @return array
     */
    public function getRecords(): array {

        return $this->records;
    }


    /**
     * Установка языка
     * @param string|null $lang
     * @return $this
     */
    public function setLang(string $lang = null): self {

        $this->lang = $lang;
        return $this;
    }


    /**
     * Установка своих отдельных переводов
     * @param array $lang_items
     * @return $this
     */
    public function setLangList(array $lang_items): self {

        foreach ($lang_items as $key => $value) {
            if (is_scalar($value)) {
                $this->lang_list[$key] = $value;
            }
        }

        return $this;
    }


    /**
     * Установка группировки строк по полю
     * @param string|null $field_name
     * @param array       $attr
     * @return self
     */
    public function setGroupBy(string $field_name = null, array $attr = []): self {

        if ( ! $field_name) {
            $this->group = null;

        } else {
            $this->group = [
                'field' => $field_name,
            ];

            if ( ! empty($attr)) {
                foreach ($attr as $name => $value) {
                    if (is_scalar($value)) {
                        $this->group['attr'][$name] = $value;
                    }
                }
            }
        }

        return $this;
    }


    /**
     * Установка сортировки по колонке
     * @param string|null $field_name
     * @param string      $order
     * @return self
     */
    public function setSort(string $field_name = null, string $order = 'asc'): self {

        if ( ! $field_name) {
            $this->sort = null;

        } else {
            $this->sort = [
                [
                    'field' => $field_name,
                    'order' => $order == 'desc' ? 'desc' : 'asc',
                ]
            ];
        }

        return $this;
    }


    /**
     * Установка сортировки по нескольким колонкам
     * @param array|null $fields
     * @return self
     */
    public function setSorts(array $fields = null): self {

        if ( ! $fields) {
            $this->sort = null;

        } else {
            $sort = [];

            foreach ($fields as $name => $order) {
                if (is_string($order)) {
                    $sort[] = [
                        'field' => $name,
                        'order' => $order == 'desc' ? 'desc' : 'asc',
                    ];
                }
            }

            $this->sort = $sort ?: null;
        }

        return $this;
    }


    /**
     * Получение экземпляра колонки по названию поля
     * @param string $field
     * @return \CoreUI\Table\Abstract\Column|null
     */
    public function getColumnByField(string $field):? Table\Abstract\Column {

        $result_column = null;

        if ( ! empty($this->columns)) {
            foreach ($this->columns as $column) {
                if ($column instanceof Table\Abstract\Column && $column->getField() == $field) {
                    $result_column = $column;
                    break;
                }
            }
        }

        return $result_column;
    }


    /**
     * Добавление строки над таблицей, снаружи
     * @return Table\Toolbox
     */
    public function addHeaderOut(): Table\Toolbox {

        return $this->addHeader('out');
    }


    /**
     * Добавление строки над таблицей, внутри
     * @return Table\Toolbox
     */
    public function addHeaderIn(): Table\Toolbox {

        return $this->addHeader('in');
    }


    /**
     * Добавление строки под таблицей, внутри
     * @return Table\Toolbox
     */
    public function addFooterIn(): Table\Toolbox {

        return $this->addFooter('in');
    }


    /**
     * Добавление строки под таблицей, снаружи
     * @return Table\Toolbox
     */
    public function addFooterOut(): Table\Toolbox {

        return $this->addFooter('out');
    }


    /**
     * Добавление дополнительных заголовков над колонками таблицы
     * @return Table\Columns
     */
    public function addHeaderColumns(): Table\Columns {

        if ($this->columns_header === null) {
            $this->columns_header = [];
        }

        $columns = new Table\Columns();

        $this->columns_header[] = $columns;
        return $columns;
    }


    /**
     * Добавление дополнительных заголовков под колонками таблицы
     * @return Table\Columns
     */
    public function addFooterColumns(): Table\Columns {

        if ($this->columns_footer === null) {
            $this->columns_footer = [];
        }

        $columns = new Table\Columns();

        $this->columns_footer[] = $columns;
        return $columns;
    }


    /**
     * Добавление колонки
     * @param array $columns
     * @return Table
     */
    public function addColumns(array $columns): self {

        foreach ($columns as $column) {
            if ($column instanceof Table\Abstract\Column) {
                $this->columns[] = $column;
            }
        }

        return $this;
    }


    /**
     * Добавление колонки
     * @param array $search
     * @return Table
     */
    public function addSearch(array $search): self {

        foreach ($search as $item) {
            if ($item instanceof Table\Abstract\Search) {
                $this->search[] = $item;
            }
        }

        return $this;
    }


    /**
     * Очистка добавленных строк над таблицей
     * @param string|null $type
     * @return self
     */
    public function clearHeaders(string $type = null): self {

        if ($type === null) {
            $this->header = null;

        } else {
            if (is_array($this->header)) {
                foreach ($this->header as $key => $item) {
                    if ($item instanceof Table\Toolbox && $item->getType() == $type) {
                        unset($this->header[$key]);
                    }
                }
            }

            if (empty($this->header)) {
                $this->header = null;
            }
        }

        return $this;
    }


    /**
     * Очистка добавленных строк под таблицей
     * @param string|null $type
     * @return self
     */
    public function clearFooters(string $type = null): self {

        if ($type === null) {
            $this->footer = null;

        } else {
            if (is_array($this->footer)) {
                foreach ($this->footer as $key => $item) {
                    if ($item instanceof Table\Toolbox && $item->getType() == $type) {
                        unset($this->footer[$key]);
                    }
                }

                if (empty($this->footer)) {
                    $this->footer = null;
                }
            }
        }
        return $this;
    }


    /**
     * Очистка поисковых полей
     * @return self
     */
    public function clearSearch(): self {

        $this->search = null;
        return $this;
    }


    /**
     * Очистка заданных колонок
     * @return self
     */
    public function clearColumns(): self {

        $this->columns = [];
        return $this;
    }


    /**
     * Удаление колонки с указанным именем
     * @param string $column_name
     * @return self
     */
    public function clearColumnByName(string $column_name): self {

        foreach ($this->columns as $key => $column) {
            if ($column instanceof Table\Abstract\Column && $column->getField() == $column_name) {
                unset($this->columns[$key]);
                break;
            }
        }

        return $this;
    }


    /**
     * Получение данных таблицы
     * @return array
     */
    public function toArray(): array {

        $header        = [];
        $footer        = [];
        $columnsHeader = [];
        $columnsFooter = [];
        $search        = [];
        $columns       = [];
        $records       = [];


        if ( ! empty($this->header)) {
            foreach ($this->header as $header_item) {
                if ($header_item instanceof Table\Toolbox) {
                    $header[] = $header_item->toArray();
                }
            }
        }

        if ( ! empty($this->footer)) {
            foreach ($this->footer as $footer_item) {
                if ($footer_item instanceof Table\Toolbox) {
                    $footer[] = $footer_item->toArray();
                }
            }
        }

        if ( ! empty($this->columns_header)) {
            foreach ($this->columns_header as $header_item) {
                if ($header_item instanceof Table\Columns) {
                    $columnsHeader[] = $header_item->toArray();
                }
            }
        }

        if ( ! empty($this->columns_footer)) {
            foreach ($this->columns_footer as $footer_item) {
                if ($footer_item instanceof Table\Columns) {
                    $columnsFooter[] = $footer_item->toArray();
                }
            }
        }

        if ( ! empty($this->search)) {
            foreach ($this->search as $search_item) {
                if ($search_item instanceof Table\Abstract\Search) {
                    $search[] = $search_item->toArray();
                }
            }
        }

        foreach ($this->columns as $column) {
            if ($column instanceof Table\Abstract\Column) {
                $columns[] = $column->toArray();
            }
        }

        foreach ($this->records as $record) {
            if ($record instanceof Table\Record) {
                $records[] = $record->toArray();
            }
        }


        $result = [
            'component' => 'coreui.table',
        ];


        if ( ! is_null($this->id)) {
            $result['id'] = $this->id;
        }
        if ( ! is_null($this->class_style)) {
            $result['class'] = $this->class_style;
        }
        if ( ! is_null($this->primary_key)) {
            $result['primaryKey'] = $this->primary_key;
        }
        if ( ! is_null($this->page)) {
            $result['page'] = $this->page;
        }
        if ( ! is_null($this->records_per_page)) {
            $result['recordsPerPage'] = $this->records_per_page;
        }
        if ( ! is_null($this->click_url)) {
            $result['onClickUrl'] = $this->click_url;
        }
        if ( ! is_null($this->on_click)) {
            $result['onClick'] = $this->on_click;
        }
        if ( ! is_null($this->lang)) {
            $result['lang'] = $this->lang;
        }
        if ( ! is_null($this->lang_list)) {
            $result['langList'] = $this->lang_list;
        }
        if ( ! is_null($this->overflow)) {
            $result['overflow'] = $this->overflow;
        }
        if ( ! is_null($this->thead_top)) {
            $result['theadTop'] = $this->thead_top;
        }
        if ( ! is_null($this->no_border)) {
            $result['noBorder'] = $this->no_border;
        }
        if ( ! is_null($this->no_wrap)) {
            $result['noWrap'] = $this->no_wrap;
        }
        if ( ! is_null($this->no_wrap_toggle)) {
            $result['noWrapToggle'] = $this->no_wrap_toggle;
        }
        if ( ! is_null($this->show_headers)) {
            $result['showHeaders'] = $this->show_headers;
        }
        if ( ! is_null($this->save_state)) {
            $result['saveState'] = $this->save_state;
        }


        if ( ! is_null($this->max_height)) {
            $result['maxHeight'] = $this->max_height;
        }
        if ( ! is_null($this->min_height)) {
            $result['minHeight'] = $this->min_height;
        }
        if ( ! is_null($this->height)) {
            $result['height'] = $this->height;
        }


        if ( ! is_null($this->max_width)) {
            $result['maxWidth'] = $this->max_width;
        }
        if ( ! is_null($this->min_width)) {
            $result['minWidth'] = $this->min_width;
        }
        if ( ! is_null($this->width)) {
            $result['width'] = $this->width;
        }


        if ( ! is_null($this->records_request)) {
            $result['recordsRequest'] = $this->records_request;
        }
        if ( ! is_null($this->group)) {
            $result['group'] = $this->group;
        }
        if ($header) {
            $result['header'] = $header;
        }
        if ($footer) {
            $result['footer'] = $footer;
        }
        if ($columnsHeader) {
            $result['columnsHeader'] = $columnsHeader;
        }
        if ($columnsFooter) {
            $result['columnsFooter'] = $columnsFooter;
        }
        if ( ! is_null($this->sort)) {
            $result['sort'] = $this->sort;
        }
        if ($search) {
            $result['search'] = $search;
        }
        if ($columns) {
            $result['columns'] = $columns;
        }
        if ($records) {
            $result['records'] = $records;
        }

        return $result;
    }


    /**
     * Добавление строки над таблицей
     * @param string $type
     * @return Table\Toolbox
     */
    private function addHeader(string $type): Table\Toolbox {

        $header = new Table\Toolbox($type);
        $this->header[] = $header;

        return $header;
    }


    /**
     * Добавление строки под таблицей
     * @param string $type
     * @return Table\Toolbox
     */
    private function addFooter(string $type): Table\Toolbox {

        $footer = new Table\Toolbox($type);
        $this->footer[] = $footer;

        return $footer;
    }
}