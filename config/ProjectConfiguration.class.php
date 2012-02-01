<?php

require_once dirname(__FILE__).'symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
   public function setup()
   {
      // for compatibility / remove and enable only the plugins you want
      $this -> enableAllPluginsExcept(array('sfDoctrinePlugin', 'sfCompat10Plugin'));
   }

   static protected $zendLoaded = false;

   static public function registerZend()
   {
      if (self::$zendLoaded)
      {
         return;
      }

      set_include_path(sfConfig::get('sf_lib_dir') . '/vendor/Zend/library/' . PATH_SEPARATOR . get_include_path());
      require_once sfConfig::get('sf_lib_dir') . '/vendor/Zend/library/Zend/Loader/Autoloader.php';
      Zend_Loader_Autoloader::getInstance();
      self::$zendLoaded = true;
   }

}
