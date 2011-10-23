<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Song', 'doctrine');

/**
 * BaseSong
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $scan_id
 * @property string $unique_id
 * @property integer $artist_id
 * @property integer $album_id
 * @property string $name
 * @property string $length
 * @property integer $accurate_length
 * @property integer $filesize
 * @property integer $bitrate
 * @property integer $yearpublished
 * @property integer $tracknumber
 * @property string $label
 * @property integer $isremix
 * @property integer $echonest_flagged
 * @property integer $mtime
 * @property integer $atime
 * @property text $filename
 * @property text $comments
 * @property Doctrine_Collection $SongGenres
 * 
 * @method integer             getId()               Returns the current record's "id" value
 * @method integer             getScanId()           Returns the current record's "scan_id" value
 * @method string              getUniqueId()         Returns the current record's "unique_id" value
 * @method integer             getArtistId()         Returns the current record's "artist_id" value
 * @method integer             getAlbumId()          Returns the current record's "album_id" value
 * @method string              getName()             Returns the current record's "name" value
 * @method string              getLength()           Returns the current record's "length" value
 * @method integer             getAccurateLength()   Returns the current record's "accurate_length" value
 * @method integer             getFilesize()         Returns the current record's "filesize" value
 * @method integer             getBitrate()          Returns the current record's "bitrate" value
 * @method integer             getYearpublished()    Returns the current record's "yearpublished" value
 * @method integer             getTracknumber()      Returns the current record's "tracknumber" value
 * @method string              getLabel()            Returns the current record's "label" value
 * @method integer             getIsremix()          Returns the current record's "isremix" value
 * @method integer             getEchonestFlagged()  Returns the current record's "echonest_flagged" value
 * @method integer             getMtime()            Returns the current record's "mtime" value
 * @method integer             getAtime()            Returns the current record's "atime" value
 * @method text                getFilename()         Returns the current record's "filename" value
 * @method text                getComments()         Returns the current record's "comments" value
 * @method Doctrine_Collection getSongGenres()       Returns the current record's "SongGenres" collection
 * @method Song                setId()               Sets the current record's "id" value
 * @method Song                setScanId()           Sets the current record's "scan_id" value
 * @method Song                setUniqueId()         Sets the current record's "unique_id" value
 * @method Song                setArtistId()         Sets the current record's "artist_id" value
 * @method Song                setAlbumId()          Sets the current record's "album_id" value
 * @method Song                setName()             Sets the current record's "name" value
 * @method Song                setLength()           Sets the current record's "length" value
 * @method Song                setAccurateLength()   Sets the current record's "accurate_length" value
 * @method Song                setFilesize()         Sets the current record's "filesize" value
 * @method Song                setBitrate()          Sets the current record's "bitrate" value
 * @method Song                setYearpublished()    Sets the current record's "yearpublished" value
 * @method Song                setTracknumber()      Sets the current record's "tracknumber" value
 * @method Song                setLabel()            Sets the current record's "label" value
 * @method Song                setIsremix()          Sets the current record's "isremix" value
 * @method Song                setEchonestFlagged()  Sets the current record's "echonest_flagged" value
 * @method Song                setMtime()            Sets the current record's "mtime" value
 * @method Song                setAtime()            Sets the current record's "atime" value
 * @method Song                setFilename()         Sets the current record's "filename" value
 * @method Song                setComments()         Sets the current record's "comments" value
 * @method Song                setSongGenres()       Sets the current record's "SongGenres" collection
 * 
 * @package    streeme
 * @subpackage model
 * @author     Richard Hoar
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSong extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('song');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('scan_id', 'integer', null, array(
             'type' => 'integer',
             'default' => '0',
             ));
        $this->hasColumn('unique_id', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('artist_id', 'integer', null, array(
             'type' => 'integer',
             'default' => 0,
             ));
        $this->hasColumn('album_id', 'integer', null, array(
             'type' => 'integer',
             'default' => 0,
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('length', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('accurate_length', 'integer', null, array(
             'type' => 'integer',
             'default' => 0,
             ));
        $this->hasColumn('filesize', 'integer', null, array(
             'type' => 'integer',
             'default' => 0,
             ));
        $this->hasColumn('bitrate', 'integer', null, array(
             'type' => 'integer',
             'default' => 0,
             ));
        $this->hasColumn('yearpublished', 'integer', null, array(
             'type' => 'integer',
             'default' => 1969,
             ));
        $this->hasColumn('tracknumber', 'integer', null, array(
             'type' => 'integer',
             'default' => 1,
             ));
        $this->hasColumn('label', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('isremix', 'integer', 1, array(
             'type' => 'integer',
             'default' => 0,
             'length' => 1,
             ));
        $this->hasColumn('echonest_flagged', 'integer', 1, array(
             'type' => 'integer',
             'default' => 0,
             'length' => 1,
             ));
        $this->hasColumn('mtime', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('atime', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('filename', 'text', null, array(
             'type' => 'text',
             ));
        $this->hasColumn('comments', 'text', null, array(
             'type' => 'text',
             ));


        $this->index('album_index', array(
             'fields' => 
             array(
              0 => 'album_id',
             ),
             ));
        $this->index('artist_index', array(
             'fields' => 
             array(
              0 => 'artist_id',
             ),
             ));
        $this->index('unique_id_index', array(
             'fields' => 
             array(
              0 => 'unique_id',
             ),
             ));
        $this->index('scan_id', array(
             'fields' => 
             array(
              0 => 'scan_id',
             ),
             ));
        $this->index('songname_index', array(
             'fields' => 
             array(
              0 => 'name',
             ),
             ));
        $this->index('isremix_index', array(
             'fields' => 
             array(
              0 => 'isremix',
             ),
             ));
        $this->index('echonest_flagged_index', array(
             'fields' => 
             array(
              0 => 'echonest_flagged',
             ),
             ));
        $this->index('songmtime_index', array(
             'fields' => 
             array(
              0 => 'mtime',
             ),
             ));
        $this->index('songyearpublished_index', array(
             'fields' => 
             array(
              0 => 'yearpublished',
             ),
             ));
        $this->index('songlength_index', array(
             'fields' => 
             array(
              0 => 'length',
             ),
             ));
        $this->index('tracknumber_index', array(
             'fields' => 
             array(
              0 => 'tracknumber',
             ),
             ));
        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('SongGenres', array(
             'local' => 'id',
             'foreign' => 'song_id'));
    }
}