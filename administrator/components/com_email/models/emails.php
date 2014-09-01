<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import the Joomla modellist library
jimport('joomla.application.component.modellist');

/**
 * EmailList Model
 *
 * @category User
 * @package  Predefined_Email
 * @author   MalakaGL <glmalaka@gmail.com>
 * @license  http://www.opensource.com FOSS
 * @link     malaka
 */
class EmailModelEmails extends JModelList
{
    /**
     * Method to build an SQL query to load the list data.
     *
     * @return	string	An SQL query
     */
    protected function getListQuery()
    {
        // Create a new query object.
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);
        // Select some fields
        $query->select('id,email_title');
        // From the email table
        $query->from('#__email_templates');
        return $query;
    }
}