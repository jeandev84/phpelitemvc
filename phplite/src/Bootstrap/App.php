<?php
namespace Phplite\Bootstrap;


use Phplite\Exceptions\Whoops;

/**
 * Class App
 * @package Phplite\Bootstrap
*/
class App
{
     /**
      * App constructor
      *
      * @return void
     */
     private function __construct() {}


     /**
      * Run the application
      *
      * @return void
     */
     public static function run() {
          Whoops::handle();

          throw new \Exception('The is exception');
     }

}