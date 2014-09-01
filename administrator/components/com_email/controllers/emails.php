<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controlleradmin library
jimport('joomla.application.component.controlleradmin');

/**
 * Emails Controller
 *
 * @category User
 * @package  Predefined_Email
 * @author   MalakaGL <glmalaka@gmail.com>
 * @license  http://www.opensource.com FOSS
 * @link     malaka
 */
class EmailControllerEmails extends JControllerAdmin
{
    /**
     * Comment
     *
     * @param string $name   email
     * @param string $prefix prefix
     *
     * @return mixed
     */
    public function getModel($name = 'Email', $prefix = 'EmailModel')
    {
        $model = parent::getModel($name, $prefix, array('ignore_request' => true));
        return $model;
    }
}