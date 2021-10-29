<?php

/**
 * tests\debugbar.php
 */

include_once 'C:\xampp\htdocs\framework\core\initialize.php';

$debugbar = new \DebugBar\StandardDebugBar();
$debugbarRenderer = $debugbar
->getJavascriptRenderer()
->setBaseUrl('/framework/vendor/maximebf/debugbar/src/DebugBar/Resources');
var_dump(get_class_methods($debugbar));

$debugbar["messages"]->addMessage("hello world!");
?>
<!DOCTYPE html>
<html>

<head>
  <?php echo $debugbarRenderer->renderHead() ?>
</head>

<body>
  <?php echo $debugbarRenderer->render() ?>
</body>

</html>