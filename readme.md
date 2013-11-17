# Beantest

This small application tests the addition and removal of jobs to 
beanstalkd from a phalconphp cli script.

Tested against:

* phalconphp 1.2.4
* php 5.5
* beanstalkd 1.4.6 (via aptitude) and 1.9
* ubuntu 12.04

## Installation

	$ cd /var/www
	/var/www $ git clone git@github.com:donovanjamesking/beantest.git
	/var/www $ cd /var/www/beantest
	/var/www/beantest $ sudo cp extras/beantest.conf /etc/init/

## Configuration

Set beanstalkd host and port in config/config.php.

## Usage

Add jobs to the queue:

	/var/www/beantest $ php -f cli.php add

An added message containing the job id will be written to the console.

Jobs can be removed either manually or by using a worker.

Remove manually:

	/var/www/beantest $ php -f cli.php remove

A removal message containing the job id and body will be written to 
the console.

To remove automatically, start the beantest worker:

	/var/www/beantest $ sudo service beantest start

Check logs/beantest.log for a removal message containing the job id 
and body.

## Additional

The application beanstalk_console 
(https://github.com/ptrofimov/beanstalk_console) is an excellent 
web-based frontend for beanstalkd administration and can be used 
for additional testing and debugging.