<?php

/**
 * tests\db_class.php
 */

include_once 'C:\xampp\htdocs\QuickStart\framework\core\initialize.php';

use Ethan\Database as Database;

new Database\base;

// $a = new Database\sqlite;
// $a->query('select * from `history`');
// print_r($a->fetchAll());
?>

<pre>
PDO Classes for db connect and manipulation
===========================================

**Below is a description on how to use the classes in the below script**

### Include script and set up db variables

````
include 'zdb.php';

//setup db variables
define("DB_HOST", "127.8.221.129");
define("DB_USER", "danferth");
define("DB_PASS", "");
define("DB_NAME", "c9");
````

### create new db object

    $database = new db();

_____________________________

### single insert

    $database->query('INSERT INTO test (name, age, description) VALUES(:name, :age, :description)');

##### bind query variables

````
$database->bind(':name', 'Melissa');
$database->bind(':age', '39');
$database->bind(':description', 'the real boss');
````

##### execute query

    $database->execute();

_______________________

### multiple INSERTS using transactions

##### begin transaction

    $database->beginTransaction();

##### the query

    $database->query('INSERT INTO test (name, age, description) VALUES (:name, :age, :description)');

##### Insert 1
````
$database->bind(':name','Sam');
$database->bind(':age','34');
$database->bind(':description','The Boss');
````

##### execute insert 1

    $database->execute();

##### insert 2
````
$database->bind(':name','Karen');
$database->bind(':age','48');
$database->bind(':description','Administration');
````

##### execute insert 2

    $database->execute();

##### end transaction

    $database->endTransaction();

_________________________

### Select Single Row

##### set up query

    $database->query("SELECT name, age, description FROM test WHERE name = :name");

##### bind data

    $database->bind(':name','dan');

##### Run single method

    $row = $database->single();

##### Print result
````
echo '<pre>';
print_r($row);
echo '</pre>';
````


### Select Multiple rows

##### set up query
````
$database->query('SELECT * FROM test');
$row = $database->resultset();
````

##### Print result
````
echo '
<pre>';
print_r($row);
echo '</pre>';
````

##### echo number of records returned

echo $database->rowCount();
</pre>