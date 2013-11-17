<?php

class addTask extends \Phalcon\CLI\Task
{

    public function mainAction() {

      $queue = new Phalcon\Queue\Beanstalk(array(
        'host' => '127.0.0.1',
        'port' => '11300'
      ));

      $queue->watch('beantest');

      $jobId = $queue->put(date('m/d/Y h:i:s a', time()));

      echo 'Job #'.$jobId.' added to the beanstalkd queue.' . PHP_EOL;

    }

}