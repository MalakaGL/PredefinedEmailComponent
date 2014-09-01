<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controllerform library
jimport('joomla.application.component.controllerform');
 
/**
 * Email Controller
 *
 * @category User
 * @package  Predefined_Email
 * @author   MalakaGL <glmalaka@gmail.com>
 * @license  http://www.opensource.com FOSS
 * @link     malaka
 */
class EmailControllerEmail extends JControllerForm
{
    /**
     * Comment
     *
     * @return void
     */
    public function sendMail()
    {
        $mailer = JFactory::getMailer();
        $config = JFactory::getConfig();
        $sender = array($config->getValue('config.mailfrom'),
            $config->getValue('config.fromname'));
        $mailer->setSender($sender);
        $user = JFactory::getUser();
        $recipient = $user->email;
        $mailer->addRecipient($recipient);
        $body   = "Your body string\nin double quotes if you want
            to parse the \nnewlines etc";
        $mailer->setSubject('Your subject string');
        $mailer->setBody($body);
        $send = $mailer->Send();
        if ( $send !== true ) {
            echo 'Error sending email: ' . $send->__toString();
        } else {
            echo 'Mail sent';
        }
    }
}
