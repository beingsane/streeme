<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Album', 'doctrine');

/**
 * BaseAlbum
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $scan_id
 * @property string $name
 * @property integer $amazon_flagged
 * @property integer $meta_flagged
 * @property integer $folders_flagged
 * @property integer $service_flagged
 * @property integer $has_art
 * 
 * @method integer getId()              Returns the current record's "id" value
 * @method integer getScanId()          Returns the current record's "scan_id" value
 * @method string  getName()            Returns the current record's "name" value
 * @method integer getAmazonFlagged()   Returns the current record's "amazon_flagged" value
 * @method integer getMetaFlagged()     Returns the current record's "meta_flagged" value
 * @method integer getFoldersFlagged()  Returns the current record's "folders_flagged" value
 * @method integer getServiceFlagged()  Returns the current record's "service_flagged" value
 * @method integer getHasArt()          Returns the current record's "has_art" value
 * @method Album   setId()              Sets the current record's "id" value
 * @method Album   setScanId()          Sets the current record's "scan_id" value
 * @method Album   setName()            Sets the current record's "name" value
 * @method Album   setAmazonFlagged()   Sets the current record's "amazon_flagged" value
 * @method Album   setMetaFlagged()     Sets the current record's "meta_flagged" value
 * @method Album   setFoldersFlagged()  Sets the current record's "folders_flagged" value
 * @method Album   setServiceFlagged()  Sets the current record's "service_flagged" value
 * @method Album   setHasArt()          Sets the current record's "has_art" value
 * 
 * @package    streeme
 * @subpackage model
 * @author     Richard Hoar
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAlbum extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('album');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('scan_id', 'integer', null, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'unique' => 'true;',
             'length' => 255,
             ));
        $this->hasColumn('amazon_flagged', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('meta_flagged', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('folders_flagged', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('service_flagged', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('has_art', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1,
             ));

        $this->option('type', 'MyISAM');
        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}