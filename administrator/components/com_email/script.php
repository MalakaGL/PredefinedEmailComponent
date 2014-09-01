<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
/**
 * Script file of Email component
 *
 * @category User
 * @package  Predefined_Email
 * @author   MalakaGL <glmalaka@gmail.com>
 * @license  http://www.opensource.com FOSS
 * @link     malaka
 */
class com_emailInstallerScript
{
    /**
     * method to install the component
     *
     * @param Object $parent parent object
     *
     * @return void
     */
    function install($parent)
    {
        // $parent is the class calling this method
        $parent->getParent()->setRedirectURL('index.php?option=com_email');
    }
 
    /**
     * method to uninstall the component
     *
     * @param Object $parent parent object
     *
     * @return void
     */
    function uninstall($parent)
    {
        // $parent is the class calling this method
        echo '<p>' . JText::_('COM_EMAIL_UNINSTALL_TEXT') . '</p>';
    }
}