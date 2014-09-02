<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Include dependancy of the main model form
jimport('joomla.application.component.modelform');

// import Joomla modelitem library
jimport('joomla.application.component.modelitem');

// Include dependancy of the dispatcher
jimport('joomla.event.dispatcher');

// import Joomla controller library
jimport('joomla.application.component.controller');

/**
 * UpdHelloWorld Model
 *
 * @category User
 * @package  Predefined_Email
 * @author   MalakaGL <glmalaka@gmail.com>
 * @license  http://www.opensource.com FOSS
 * @link     malaka
 */
class HelloWorldModelUpdHelloWorld extends JModelForm
{
    /**
     * @var object item
     */
    protected $item;

    /**
     * Get the data for a new qualification
     *
     * @param array   $data     data
     * @param boolean $loadData boolean
     *
     * @return boolean
     */
    public function getForm($data = array(), $loadData = true)
    {
        $app = JFactory::getApplication('site');

        // Get the form.
        $form = $this->loadForm('com_helloworld.updhelloworld', 'updhelloworld', array('control' => 'jform', 'load_data' => true));
        if (empty($form)) {
            return false;
        }
        return $form;
    }

    /**
     * Get the message
     *
     * @return object The message to be displayed to the user
     */
    function &getItem()
    {
        if (!isset($this->_item)) {
            $cache = JFactory::getCache('com_helloworld', '');
            $id = $this->getState('helloworld.id');
            $this->_item =  $cache->get($id);
            if ($this->_item === false) {
                // Menu parameters
                $menuitemid = JRequest::getInt('Itemid');
                // this returns the menu id number so you can reference parameters
                $menu = JSite::getMenu();
                if ($menuitemid) {
                    $menuparams = $menu->getParams($menuitemid);
                    $headingtxtcolor = $menuparams->get('headingtxtcolor');
                    // This shows how to get an individual parameter for use
                    $headingbgcolor = $menuparams->get('headingbgcolor');
                    // This shows how to get an individual parameter for use
                }
                $this->setState('menuparams', $menuparams);  // this sets the parameter values to the state for later use
            }
        }

        return $this->_item;
    }

    /**
     * Update table
     *
     * @param Object $data date to be updated
     *
     * @return boolean
     **/
    public function updItem($data)
    {

        //first we import some help from the joomla framework
        JLoader::import('joomla.application.component.model');

        //Load com_foo's items model (notice we are linking to com_foo's model directory)
        //and declare 'items' as the first argument. Note this is case sensitive and used to construct the file path.
        JLoader::import('email', JPATH_ADMINISTRATOR . DS . 'components' . DS . 'com_email' . DS . 'models');

        //Now instantiate the model object using Joomla's camel case type naming protocol.
        $email = JModel::getInstance('email', 'EmailModel');

        if ($email->sendEMail($data['email_title'])) {
            return true;
        }

        return false;
    }
}