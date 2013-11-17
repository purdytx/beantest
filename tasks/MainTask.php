<?php

class mainTask extends \Phalcon\CLI\Task
{

   public function mainAction() {

      echo 'usage: php -f beantest.php [ add | remove | worker (daemon mode) ]' . PHP_EOL;

   }

}