<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla controlleradmin library
jimport('joomla.application.component.controlleradmin');
 
/**
 * HelloWorlds Controller
 *
 * @category User
 * @package  Predefined_Email
 * @author   MalakaGL <glmalaka@gmail.com>
 * @license  http://www.opensource.com FOSS
 * @link     malaka
 */
class HelloWorldControllerHelloWorlds extends JControllerAdmin
{
    /**
     * Proxy for getModel.
     *
     * @param string $name   name
     * @param string $prefix prefix
     *
     * @return void
     * @since	1.6
     */
    public function getModel($name = 'HelloWorld', $prefix = 'HelloWorldModel')
    {
        $model = parent::getModel($name, $prefix, array('ignore_request' => true));
        return $model;
    }
}