<?php

// No direct access.
defined('_JEXEC') or die;

// Include dependancy of the main controllerform class
jimport('joomla.application.component.controllerform');

/**
 * Class HelloWorldControllerUpdHelloWorld
 *
 * @category User
 * @package  Predefined_Email
 * @author   MalakaGL <glmalaka@gmail.com>
 * @license  http://www.opensource.com FOSS
 * @link     malaka
 */
class HelloWorldControllerUpdHelloWorld extends JControllerForm
{
    /**
     * Comment
     *
     * @param string $name   a
     * @param string $prefix a
     * @param array  $config a
     *
     * @return mixed
     */
    public function getModel($name = '', $prefix = '',
        $config = array('ignore_request' => true)
    ) {
        return parent::getModel($name, $prefix, array('ignore_request' => false));
    }

    /**
     * comment
     *
     * @return void
     */
    public function submit()
    {
        // Check for request forgeries.
        JRequest::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

        // Initialise variables.
        $app	= JFactory::getApplication();
        $model	= $this->getModel('updhelloworld');

        // Get the data from the form POST
        $data = JRequest::getVar('jform', array(), 'post', 'array');

        // Now update the loaded data to the database via a function in the model
        $upditem	= $model->updItem($data);

        // check if ok and display appropriate message.
        // This can also have a redirect if desired.
        if ($upditem) {
            echo "<h2>Email was successfully sent.</h2>";
        } else {
            echo "<h2>Email was failed to sent.</h2>";
        }
    }
}