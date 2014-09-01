<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');
 
/**
 * HTML View class for the HelloWorld Component
 *
 * @category User
 * @package  Predefined_Email
 * @author   MalakaGL <glmalaka@gmail.com>
 * @license  http://www.opensource.com FOSS
 * @link     malaka
 */
class HelloWorldViewHelloWorld extends JView
{
    /**
     * Overwriting JView display method
     *
     * @param String $tpl template
     *
     * @return void
     */
    function display($tpl = null)
    {
        // Assign data to the view
        $this->item = $this->get('Item');

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            JError::raiseError(500, implode('<br />', $errors));
            return false;
        }
        // Display the view
        parent::display($tpl);
    }
}