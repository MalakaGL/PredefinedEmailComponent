<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelform library
jimport('joomla.application.component.modeladmin');

/**
 * Email Model
 *
 * @category User
 * @package  Predefined_Email
 * @author   MalakaGL <glmalaka@gmail.com>
 * @license  http://www.opensource.com FOSS
 * @link     malaka
 */
class EmailModelEmail extends JModelAdmin
{
    /**
     * Method override to check if you can edit an existing record.
     *
     * @param array  $data An array of input data.
     * @param string $key  The name of the key for the primary key.
     *
     * @return	boolean
     * @since	1.6
     */
    protected function allowEdit($data = array(), $key = 'id')
    {
        // Check specific edit permission then general edit permission.
        return JFactory::getUser()->authorise(
            'core.edit',
            'com_email.message.'.((int) isset($data[$key]) ? $data[$key] : 0)
        ) or parent::allowEdit($data, $key);
    }

    /**
     * Returns a reference to the a Table object, always creating it.
     *
     * @param string $type   The table type to instantiate
     * @param string $prefix A prefix for the table class name. Optional.
     * @param array	 $config Configuration array for model. Optional.
     *
     * @return	JTable	A database object
     * @since	1.6
     */
    public function getTable(
        $type = 'Email', $prefix = 'EmailTable', $config = array()
    ) {
        return JTable::getInstance($type, $prefix, $config);
    }

    /**
     * Method to get the record form.
     *
     * @param array	  $data     Data for the form.
     * @param boolean $loadData True if the form is to load its own data
     * (default case), false if not.
     *
     * @return	mixed	A JForm object on success, false on failure
     * @since	1.6
     */
    public function getForm($data = array(), $loadData = true)
    {
        // Get the form.
        $form = $this->loadForm(
            'com_email.email',
            'email', array('control' => 'jform', 'load_data' => $loadData)
        );
        if (empty($form)) {
            return false;
        }

        return $form;
    }

    /**
     * Method to get the script that have to be included on the form
     *
     * @return string	Script files
     */
    public function getScript()
    {
        return 'administrator/components/com_email/models/forms/email.js';
    }

    /**
     * Method to get the data that should be injected in the form.
     *
     * @return	mixed	The data for the form.
     * @since	1.6
     */
    protected function loadFormData()
    {
        // Check the session for previously entered form data.
        $data = JFactory::getApplication()
            ->getUserState('com_email.edit.email.data', array());
        if (empty($data)) {
            $data = $this->getItem();
        }

        return $data;
    }

    /**
     * Comment
     *
     * @param string $recipient string
     * @param int    $id        id of the email to send
     *
     * @return void
     */
    function sendEMail($recipient,$id)
    {
        $mailer = JFactory::getMailer();
        $config = JFactory::getConfig();
        $email = $this->getEmail($id);
        $sender = array($config->
            getValue('config.mailfrom'), $config->getValue('config.fromname'));
        $body = 'Sent by<br>'.$email[4].'('.$email[5].')<br>'.$email[3];
        $mailer->isHTML(true);
        $mailer->Encoding = 'base64';
        $mailer->setBody($body);
        $mailer->setSender($sender);
        $mailer->addRecipient($recipient);
        $mailer->setSubject($email[2]);
        $send = $mailer->Send();
        if ( $send !== true ) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Get email
     *
     * @param int $id id of the email
     *
     * @return array email details
     */
    protected function getEmail($id)
    {
        $db = JFactory::getDBO();
        $query = $db->getQuery(true)
            ->select('*')
            ->from($db->quoteName('#__email_templates'))
            ->where($db->quoteName('id').' = '.(int)$id);
        $db->setQuery($query);

        // Load the row.
        $result = $db->loadRow();

        if ($result) {
            return $result;
        }
        return null;
    }
}