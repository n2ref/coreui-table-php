# coreui-table

```php
    use CoreUI\Table;
    
    $table = new Table('users');
    $table->setClass('table-hover table-striped');
    $table->setPrimaryKey('id');
    $table->setMaxWidth(400);
    $table->setRecordsPerPage(25);
    $table->setClickUrl('/users//[id]');
        
    
    $table->addHeaderOut()
        ->left([
            (new Table\Control\Link("Добавить", "/users/0"))->addAttr('class', 'btn btn-success'),
            (new Table\Control\Buttun("Удаление"))->addAttr('class', 'btn btn-warning')->setOnClick('funcDelete()'),
        ])
        ->right([
            (new Table\Filter\Text('login_name', "Логин или Email", 150))->setLabel('Label'),
            (new Table\Control\FilterClear(),
        ]);
        
    $table->addHeaderIn()
        ->left([
            (new Table\Control\Search()),
            (new Table\Control\Columns()),
        ]);
        
    $table->addFooterOut()
        ->left([
            (new Table\Control\Pages(3)),
        ])
        ->right([
            (new Table\Control\PageJump()),
            (new Table\Control\PageSize([ 25, 50, 100, 1000, 0 ])),
        ]);
        
    
    $table->addSearch([
        (new Table\Search\Text('email',          "Email"))->setDescription('Описание'),
        (new Table\Search\Switch('is_active_sw', "Активность"))->setValueY(1),
        (new Table\Search\Date('date_created',   "Дата использования"))
    ]);
    
    
    $table->addColumns([
        (new Table\Column\Select());
        (new Table\Column\Text('login',          "Логин",         110)))->setDescription('Описание')->setSort(true),    
        (new Table\Column\Text('name',           "Имя"))->setSort(true),
        (new Table\Column\Text('email',          "Email",         80))->setAttr('class', 'text-left')    
        (new Table\Column\Date('date_created',   "Дата создания", 110))->setFormat('DD.MM.YYYY')->setSort(true);    
        (new Table\Column\Switch('is_active_sw', "Активность",    50))->setValueY(1)->setValueN(0);    
    ]);
    
      
    $table->setRecordsRequest('data/users.json', 'GET');
    
    // OR
    
    $table->setRecords([
        [ 'id' => 1, 'login' => 'admin', 'name' => 'Administrator', 'email' => 'admin@gmail.com', 'date_created' => date('Y-m-d'), 'is_active_sw' => 'Y' ],    
        [ 'id' => 2, 'login' => 'user1', 'name' => 'User 1',        'email' => 'user1@gmail.com', 'date_created' => date('Y-m-d'), 'is_active_sw' => 'Y' ],    
        [ 'id' => 3, 'login' => 'user2', 'name' => 'User 2',        'email' => 'user2@gmail.com', 'date_created' => date('Y-m-d'), 'is_active_sw' => 'N' ],    
    ]);
    
    $records = $table->getRecords();
    foreach ($records as $record) {
              
        $record->name = "{$record->last_name} {$record->first_name}";
        $record->cell('name')->setAttr('class', 'fw-bold');
        
        if ($record->login === 'admin') {
            $record->setAttr('class', 'table-warning');
        }
    }
    
    echo $table->toArray();
```

result

```json

```


```php
    use CoreUI\Table;
    use CoreUI\Table\Adapter\Mysql\Search;

    $table = new Table\Adapter\Mysql();
    $table->setConnection($db);
    $table->setCalcCount($table::CALC_ALL);
    $table->setPage($_GET['page'] ?? 1, $_GET['count'] ?? 25);
    
    // OR
    
    if ( ! empty($_GET['page'])) {
        $table->setPage($_GET['page']);   
    }
    
    if ( ! empty($_GET['count'])) {
        $table->setPageCount($_GET['count']);   
    }
    
    
    
    if ( ! empty($_GET['sort']) && is_array($_GET['sort'])) {
        $table->setSort($_GET['sort'], [
            'login'        => 'u.login',
            'name'         => 'u.name',
            'date_created' => 'u.date_created',
        ]);
    }

    if ( ! empty($_GET['search']) && is_array($_GET['search'])) {
        $table->setSearch($_GET['search'], [
            'email'        => (new Search\Like())->setField("u.email"),
            'date_created' => (new Search\Between())->setField("u.date_created >= :start"),
            'is_active_sw' => (new Search\Equal())->setField("u.is_active_sw"),
            'role'         => (new Search\In())->setField("u.role"),
            'login_name'   => (new Search\Custom())->setField("(u.login LIKE %?% OR CONCAT_WS(' ', u.first_name, u.last_name) LIKE %?%)");
        ]);
    }
    
    
    $table->setQuery("
        SELECT u.id,
               u.login,
               u.first_name,
               u.last_name,
               u.email,
               u.date_create,
               u.is_active_sw
        FROM users AS u
        WHERE id_deleted = ?
    ", [
        'N'
    ]);
    
    $records = $table->fetchRows();
    foreach ($records as $record) {
       
        $record->name = "{$record->last_name} {$record->first_name}";
        $record->cell('name')->setAttr('class', 'fw-bold');
        
        if ($record->login === 'admin') {
            $record->setAttr('class', 'table-warning');
        }
    }
    
    return $table->toArray();
```

```php
    use CoreUI\Table;
    use CoreUI\Table\Adapter\Data\Search;
    
    $table = new Table\Adapter\Data();
    
    $table->setPage($_GET['page'] ?? 1, $_GET['count'] ?? 25);
    
    if ( ! empty($_GET['count'])) {
        $table->setPageCount($_GET['count']);   
    }
    
    if ( ! empty($_GET['sort']) && is_array($_GET['sort'])) {
        $table->setSort($_GET['sort'], [ 'login', 'name', 'date_created' ]);
    }

    if ( ! empty($_GET['search']) && is_array($_GET['search'])) {
        $table->setSearch($_GET['search'], [
            'email'        => new Search\Text(),
            'date_created' => new Search\Date(),
            'is_active_sw' => new Search\Equal(),
            'login_name'   => new Search\In();
        ]);
    }
    
    
    $table->setData([
        [ 'id' => 1, 'login' => 'admin', 'email' => 'admin@mail.com', 'name' => 'Administrator', 'is_active_sw' => 'Y', 'date_created' => date('Y-m-01 H:i:s'), ]
        [ 'id' => 2, 'login' => 'user1', 'email' => 'user1@mail.com', 'name' => 'User 1',        'is_active_sw' => 'Y', 'date_created' => date('Y-m-01 H:i:s'), ]
        [ 'id' => 3, 'login' => 'user2', 'email' => 'user2@mail.com', 'name' => 'User 2',        'is_active_sw' => 'N', 'date_created' => date('Y-m-01 H:i:s'), ]
        [ 'id' => 4, 'login' => 'user3', 'email' => 'user3@mail.com', 'name' => 'User 3',        'is_active_sw' => 'Y', 'date_created' => date('Y-m-01 H:i:s'), ]
    ]);
    
        
    $records = $table->fetchRecords();
    foreach ($records as $record) {
              
        $record->name = "{$record->last_name} {$record->first_name}";
        $record->cell('name')->setAttr('class', 'fw-bold');
        
        if ($record->login === 'admin') {
            $record->setAttr('class', 'table-warning');
        }
    }
    
    return $table->toArray();
```