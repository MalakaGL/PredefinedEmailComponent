<?php
    // No direct access to this file
    defined('_JEXEC') or die('Restricted access');

    // import Joomla controller library
    jimport('joomla.application.component.controller');

    /**
     * General Controller of Email component
     */
    class EmailController extends JController
    {
        /**
         * display task
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

        function email($cachable = false, $urlparams = false)
        {
            JRequest::setVar('view', JRequest::getCmd('view', 'Email'));
            parent::display($cachable);
        }
    }

    // Set the submenu
    //EmailHelper::addSubmenu('messages');