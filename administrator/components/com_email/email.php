<?php
    error_reporting(E_ALL);
    ini_set('display_errors',1);

    // No direct access to this file
    defined('_JEXEC') or die('Restricted access');

    // Set some global property
    $document = JFactory::getDocument();
    $document->addStyleDeclaration('.icon-48-email {background-image: url(../media/com_email/images/com_email_icon_48.png);}');

    // Access check.
    if (!JFactory::getUser()->authorise('core.manage', 'com_email'))
    {
        return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
    }

    // require helper file
    JLoader::register('EmailHelper', dirname(__FILE__) . DS . 'helpers' . DS . 'email.php');

    // import joomla controller library
    jimport('joomla.application.component.controller');

    // Get an instance of the controller prefixed by Email
    $controller = JController::getInstance('Email');

    // Perform the Request task
    $controller->execute(JRequest::getCmd('task'));

    // Redirect if set by the controller
    $controller->redirect();