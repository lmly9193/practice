<?php

echo '<h1>$_SERVER</h1>';
echo "<pre>";
var_dump($_SERVER);
echo "</pre>";

echo '<h1>$_REQUEST</h1>';
echo "<pre>";
var_dump($_REQUEST);
echo "</pre>";

echo '<h1>User Constants</h1>';
echo "<pre>";
var_dump(get_defined_constants(true)['user']);
echo "</pre>";

