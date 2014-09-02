<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controller library
jimport('joomla.application.component.controller');

/**
 * General Controller of Email component
 *
 * @category User
 * @package  Predefined_Email
 * @author   MalakaGL <glmalaka@gmail.com>
 * @license  http://www.opensource.com FOSS
 * @link     malaka
 */
class EmailController extends JController
{
    /**
     * display task
     *
     * @param boolean $cachable  boolean
     * @param boolean $urlparams boolean
     *
     * @return void
     */
    function display($cachable = false, $urlparams = false)
    {
        // set default view if not set
        JRequest::setVar('view', JRequest::getCmd('view', 'Emails'));

        // call parent behavior
        parent::display($cachable);
    }

    /**
     * Comment
     *
     * @param bool $cachable  boolean
     * @param bool $urlparams boolean
     *
     * @return void
     */
    function email($cachable = false, $urlparams = false)
    {
        JRequest::setVar('view', JRequest::getCmd('view', 'Email'));
        parent::display($cachable);
    }
}