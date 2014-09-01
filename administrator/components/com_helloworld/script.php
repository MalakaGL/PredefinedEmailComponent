<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
/**
 * Script file of HelloWorld component
 *
 * @category User
 * @package  Predefined_Email
 * @author   MalakaGL <glmalaka@gmail.com>
 * @license  http://www.opensource.com FOSS
 * @link     malaka
 */
class com_helloWorldInstallerScript
{
    /**
     * method to install the component
     *
     * @param string $parent parent object
     *
     * @return void
     */
    function install($parent)
    {
        // $parent is the class calling this method
        $parent->getParent()->setRedirectURL('index.php?option=com_helloworld');
    }

    /**
     * method to uninstall the component
     *
     * @param object $parent object
     *
     * @return void
     */
    function uninstall($parent)
    {
        // $parent is the class calling this method
        echo '<p>' . JText::_('COM_HELLOWORLD_UNINSTALL_TEXT') . '</p>';
    }

    /**
     * method to update the component
     *
     * @param Object $parent parent
     *
     * @return void
     */
    function update($parent)
    {
        // $parent is the class calling this method
        echo '<p>' . JText::_('COM_HELLOWORLD_UPDATE_TEXT') . '</p>';
    }

    /**
     * method to run before an install/update/uninstall method
     *
     * @param string $type   type
     * @param Object $parent parent
     *
     * @return void
     */
    function preflight($type, $parent)
    {
        // $parent is the class calling this method
        // $type is the type of change (install, update or discover_install)
        echo '<p>' . JText::_('COM_HELLOWORLD_PREFLIGHT_' . $type . '_TEXT') . '</p>';
    }

    /**
     * method to run after an install/update/uninstall method
     *
     * @param string $type   String
     * @param Object $parent String
     *
     * @return void
     */
    function postflight($type, $parent)
    {
        // $parent is the class calling this method
        // $type is the type of change (install, update or discover_install)
        echo '<p>' . JText::_('COM_HELLOWORLD_POSTFLIGHT_' . $type . '_TEXT') . '</p>';
    }
}