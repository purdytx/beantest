# Beantest

This small application tests the addition and removal of jobs to 
beanstalkd from a phalconphp cli script.

Tested against:

* phalconphp 1.2.4
* php 5.5
* beanstalkd 1.4.6 (via aptitude)
* ubuntu 12.04

## Installation

	$ cd /var/www
	/var/www $ git clone git@github.com:donovanjamesking/beantest.git
	/var/www $ cd /var/www/beantest
	/var/www/beantest $ sudo cp extras/beantest.conf /etc/init/

## Usage

This application assumes beanstalkd is running on 0.0.0.0:11300 and
uses the tube 'beantest'.

First, start the beantest worker to watch for new jobs and pull
them.

	/var/www/beantest $ sudo service beantest start

Add jobs to the queue using the following:

	/var/www/beantest $ php -f beantest.php add

A message will be written to the console with the job id.  Check 
logs/beantest.log for a message reporting that job pulled along with 
the id and body.

## Additional

The application beanstalk_console (https://github.com/ptrofimov/beanstalk_console)
is an excellent web-based frontend to beanstalkd administration and can
be used for additional testing and debugging.