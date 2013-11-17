<?php

class addTask extends \Phalcon\CLI\Task
{

   public function mainAction() {

      $queue = new Phalcon\Queue\Beanstalk(array(
         'host' => $this->config->beanstalkd->host,
         'port' => $this->config->beanstalkd->port
      ));

      $queue->choose('beantest');
      $queue->watch('beantest');
      
      $jobId = $queue->put(date('m/d/Y h:i:s a', time()));

      echo 'Job #'.$jobId.' added to the beanstalkd queue.' . PHP_EOL;

   }

}