<?php
namespace Phplite\File;


/**
 * Class File
 * @package Phplite\File
*/
class File
{
     /**
      * File constructor
     */
     private function __construct() {}


     /**
      * Root path
      *
      * @return string
     */
     public static function root()
     {
         return ROOT;
     }


     /**
      * Directory separator
      *
      * @return string
     */
     public static function ds()
     {
         return DS;
     }


     /**
      * Get file full path
      *
      * @param string $path
      * @return string $path
     */
     public static function path($path)
     {
         $path = static::root() . static::ds() . trim($path, '/');
         return str_replace(['/', '\\'], static::ds(), $path);
     }


     /**
      * Check that file exists
      *
      * @var string $path
      * @return bool
     */
     public static function exist($path)
     {
          return file_exists(static::path($path));
     }


    /**
     * Require file
     *
     * @var string $path
     * @return mixed
     */
     public static function require_file($path)
     {
          if(static::exist($path)) {
              return require_once static::path($path);
          }
     }


    /**
     * Require file
     *
     * @var string $path
     * @return mixed
     */
    public static function include_file($path)
    {
        if(static::exist($path)) {
            return include static::path($path);
        }
    }


    /**
     * Require directory
     *
     * @param string $path
     * @return mixed
    */
    public static function require_directory($path)
    {
         $scanned =  scandir(static::path($path));
         $files =  array_diff($scanned, ['.', '..']);

         foreach ($files as $file) {
             $file_path = $path . static::ds() . $file;
             if(static::exist($file_path)) {
                 static::require_file($file_path);
             }
         }
    }
}