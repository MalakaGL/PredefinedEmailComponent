<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla formrule library
jimport('joomla.form.formrule');
 
/**
 * Form Rule class for the Joomla Framework.
 *
 * @category User
 * @package  Predefined_Email
 * @author   MalakaGL <glmalaka@gmail.com>
 * @license  http://www.opensource.com FOSS
 * @link     malaka
 */
class JFormRuleGreeting extends JFormRule
{
    /**
     * The regular expression.
     *
     * @access	protected
     * @var		string
     * @since	1.6
     */
    protected $regex = '^[^0-9]+$';
}