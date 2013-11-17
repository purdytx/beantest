<?php

class workerTask extends \Phalcon\CLI\Task
{

   public function mainAction() {

      $queue = new Phalcon\Queue\Beanstalk(array(
         'host' => $this->config->beanstalkd->host,
         'port' => $this->config->beanstalkd->port
      ));

      $queue->choose('beantest');
      $queue->watch('beantest');

      while (1) {

         $job = $queue->reserve();
         $jobId = $job->getId();
         $jobBody = $job->getBody();
         $job->delete();

         echo 'Pulling job #'.$jobId.' with body "'.$jobBody.'" from the the beanstalkd queue.' . PHP_EOL;

      }

   }

}