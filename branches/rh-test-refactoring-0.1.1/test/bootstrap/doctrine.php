<?php
include(dirname(__FILE__).'/unit.php');
$configuration = ProjectConfiguration::getApplicationConfiguration( 'client', 'test', true);
new sfDatabaseManager($configuration);
//Doctrine_Core::loadData(sfConfig::get('sf_test_dir').'/fixtures');