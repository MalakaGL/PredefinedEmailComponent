<?php

// No direct access to this file
defined('_JEXEC') or die;

/**
 * Email component helper.
 *
 * @category User
 * @package  Predefined_Email
 * @author   MalakaGL <glmalaka@gmail.com>
 * @license  http://www.opensource.com FOSS
 * @link     malaka
 */
abstract class EmailHelper
{
    /**
     * Comment
     *
     * @param int $messageId msgID
     *
     * @return JObject
     */
    public static function getActions($messageId = 0)
    {
        $user	= JFactory::getUser();
        $result	= new JObject;

        if (empty($messageId)) {
            $assetName = 'com_email';
        } else {
            $assetName = 'com_email.message.'.(int) $messageId;
        }

        $actions = array(
            'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.delete'
        );

        foreach ($actions as $action) {
            $result->set($action,	$user->authorise($action, $assetName));
        }

        return $result;
    }
}