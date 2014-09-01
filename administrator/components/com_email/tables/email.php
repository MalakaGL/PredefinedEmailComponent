<?php

// No direct access
defined('_JEXEC') or die('Restricted access');

// import Joomla table library
jimport('joomla.database.table');
 
/**
 * Hello Table class
 *
 * @category User
 * @package  Predefined_Email
 * @author   MalakaGL <glmalaka@gmail.com>
 * @license  http://www.opensource.com FOSS
 * @link     malaka
 */
class EmailTableEmail extends JTable
{
    /**
     * Constructor
     *
     * @param object &$db Database connector object
     *
     * @return void
     */
    function __construct(&$db)
    {
        parent::__construct('#__email_templates', 'id', $db);
    }
    /**
     * Overloaded bind function
     *
     * @param  array       $array  named array
     * @return null|string $igmore null is operation was satisfactory, otherwise returns an error
     *
     * @since 1.5
     */

    /**
     * Comment
     *
     * @param $array $array  array
     * @param string $ignore ignore
     *
     * @return mixed
     */
    public function bind($array, $ignore = '')
    {
        if (isset($array['params']) && is_array($array['params'])) {
            // Convert the params field to a string.
            $parameter = new JRegistry;
            $parameter->loadArray($array['params']);
            $array['params'] = (string)$parameter;
        }
        return parent::bind($array, $ignore);
    }
 
    /**
     * Overloaded load function
     *
     * @param int     $pk    primary key
     * @param boolean $reset reset data
     *
     * @return      boolean
     * @see JTable:load
     */
    public function load($pk = null, $reset = true)
    {
        if (parent::load($pk, $reset)) {
            // Convert the params field to a registry.
            //$params = new JRegistry;
            //$params->loadJSON($this->params);
            //$this->params = $params;
            return true;
        } else {
            return false;
        }
    }

    /**
     * Method to compute the default name of the asset.
     * The default name is in the form `table_name.id`
     * where id is the value of the primary key of the table.
     *
     * @return	string
     * @since	1.6
     */
    protected function _getAssetName()
    {
        $k = $this->_tbl_key;
        return 'com_email.message.'.(int) $this->$k;
    }
 
    /**
     * Method to return the title to use for the asset table.
     *
     * @return	string
     * @since	1.6
     */
    protected function _getAssetTitle()
    {
    	return $this->emailTitle;
    }

    /**
     * Get the parent asset id for the record
     *
     * @param null $table table
     * @param null $id    id
     *
     * @return int
     * @since	1.6
     */
    protected function _getAssetParentId($table = NULL, $id = NULL)
    {
        $asset = JTable::getInstance('Asset');
        $asset->loadByName('com_email');
        return $asset->id;
    }
}