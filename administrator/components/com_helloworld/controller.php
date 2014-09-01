<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla controller library
jimport('joomla.application.component.controller');
 
/**
 * General Controller of HelloWorld component
 *
 * @category User
 * @package  Predefined_Email
 * @author   MalakaGL <glmalaka@gmail.com>
 * @license  http://www.opensource.com FOSS
 * @link     malaka
 */
class HelloWorldController extends JController
{
    /**
     * display task
     *
     * @param bool $cachable  string
     * @param bool $urlparams string
     *
     * @return void
     */
    function display($cachable = false, $urlparams = false)
    {
        // set default view if not set
        JRequest::setVar('view', JRequest::getCmd('view', 'HelloWorlds'));

        // call parent behavior
        parent::display($cachable);

        // Set the submenu
        HelloWorldHelper::addSubmenu('messages');
    }
}