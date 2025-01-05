<?php
namespace App\Helpers\Routes;

class RouteHelper{

    public static function routeFiles(string $folder){

        // Extracts files and directories that match a pattern
        $items = glob($folder . '/*');

        foreach($items as  $item){
           
            $dir = new \RecursiveDirectoryIterator($item);
            /**
             * @var \RecursiveDirectoryIterator | \RecursiveIteratorIterator  $iterator
             */


            $iterator = new \RecursiveIteratorIterator($dir);
            while($iterator->valid()){
                if(!$iterator->isDot()
                && $iterator->isFile()
                && $iterator->isReadable()
                && $iterator->current()->getExtension() === 'php')
                {
                    require $iterator->key();
                }
                $iterator->next();
            }

        }

    }
}