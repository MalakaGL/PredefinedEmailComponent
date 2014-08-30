<?php
/**
 * Created by PhpStorm.
 * User: Malakagl
 * Date: 8/29/14
 * Time: 10:00 AM
 */
jimport('joomla.application.component.controller');

class lendrController extends JControllerLegacy
{
    function display($cachable = false, $urlparams = false)
    {
        JRequest::setVar('view', JRequest::getCmd('view', 'test'));
        parent::display($cachable);
    }
    function jump($cachable = false, $urlparams = false)
    {
        echo 'jumping';
    }
}