<?php

class removeTask extends \Phalcon\CLI\Task
{

    public function mainAction() {

      $queue = new Phalcon\Queue\Beanstalk(array(
         'host' => '127.0.0.1',
         'port' => '11300'
      ));

      $queue->watch('sig-api');

      while (1) {

         $job = $queue->reserve();
         $jobId = $job->getId();
         $jobBody = $job->getBody();
         $job->delete();

         echo 'Pulling job #'.$jobId.' with body "'.$jobBody.'" from the the beanstalkd queue.' . PHP_EOL;

      }

    }

}