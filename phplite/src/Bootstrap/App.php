<?php
namespace Phplite\Bootstrap;


use Phplite\Cookie\Cookie;
use Phplite\Exceptions\Whoops;
use Phplite\Http\Request;
use Phplite\Http\Server;
use Phplite\Session\Session;

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

          // Register whoops
          Whoops::handle();


          // Start a session
          Session::start();


          // Handle the request
          Request::handle();


          echo Request::method();
     }

}