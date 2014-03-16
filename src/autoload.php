<?php
  error_reporting(E_ALL ^ E_WARNING);
  spl_autoload_register(function ($class) {
    include $class . '.php';
  });
?>