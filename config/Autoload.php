<?php

class Autoload
{
    /**
     * @var null
     */
    private static $_instance = null;

    /**
     * @return void
     */
    public static function charger(): void
    {
        if(null !== self::$_instance) {
            throw new RuntimeException(sprintf('%s is already started', __CLASS__));
        }

        self::$_instance = new self();


        if(!spl_autoload_register(array(self::$_instance, '_autoload'), false)) {
            throw RuntimeException(sprintf('%s : Could not start the autoload', __CLASS__));
        }
    }

    /**
     * @return void
     */
    public static function shutDown(): void
    {
        if(null !== self::$_instance) {

            if(!spl_autoload_unregister(array(self::$_instance, '_autoload'))) {
                throw new RuntimeException('Could not stop the autoload');
            }

            self::$_instance = null;
        }
    }

    /**
     * @param $class
     * @return void
     */
    private static function _autoload($class): void
    {
        global $rep;
        $filename = $class.'.php';
        $dir =array('model/','./','config/','controleur/', 'gateWay/');
        foreach ($dir as $d){
            $file=$rep.$d.$filename;
            //echo $file;
            if (file_exists($file))
            {
                include $file;
            }
        }
    }
}
?>