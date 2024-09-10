<?php
require "vendor/autoload.php";

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Level;

// create a log channel
$log = new Logger('ipt10');
$log->pushHandler(new StreamHandler('ipt10.log', Level::Debug));

// add records to the log
$log->warning('John Doe'); 
$log->error('johndoe@example.com'); 
$log->info('profile', [
    'student_number' => '123456', 
    'college' => 'Engineering', 
    'program' => 'Computer Science', 
    'university' => 'XYZ University' 
]);

class TestClass
{
    private $logger;
    
    public function __construct($logger_name)
    {
        $this->logger = new Logger($logger_name);
        // Log that the class has been created
        $this->logger->info(__FILE__ . " Greetings to {$logger_name}");
    }

    public function greet($name)
    {
        // Log the greeting message
        $this->logger->info(__METHOD__ . " Greetings to {$name}");
        return "Hello, {$name}!";
    }

    public function getAverage($data)
    {
        // Log the action
        $this->logger->info(__CLASS__ . " get the average");

        // compute the average and return it
        if (empty($data)) {
            return null;
        }
        return array_sum($data) / count($data);
    }

    public function largest($data)
    {
        // Log the action
        $this->logger->info(__CLASS__ . " Get the largest number");

        // compute the largest number and return it
        if (empty($data)) {
            return null;
        }
        return max($data);
    }

    public function smallest($data)
    {
        // Log the action
        $this->logger->info(__CLASS__ . " Get the smallest number");

        // compute the smallest number and return it
        if (empty($data)) {
            return null;
        }
        return min($data);
    }
}

$obj = new TestClass('testLogger');
$my_name = 'Alice'; // Replace 'Alice' with the name you want to use
echo $obj->greet($my_name) . PHP_EOL;

$data = [100, 345, 4563, 65, 234, 6734, -99];
$average = $obj->getAverage($data);
$largest = $obj->largest($data);
$smallest = $obj->smallest($data);

$log->info('data', $data);
$log->info('average', ['average' => $average]);
$log->info('largest', ['largest' => $largest]);
$log->info('smallest', ['smallest' => $smallest]);
$log->info('object', ['object' => $obj]);

