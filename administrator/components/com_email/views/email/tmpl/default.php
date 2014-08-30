<?php
    // No direct access
    defined('_JEXEC') or die('Restricted access');
    JHtml::_('behavior.tooltip');
    JHtml::_('behavior.formvalidation');
    $params = $this->form->getFieldsets('params');
?>
<form action="<?php echo JRoute::_('index.php?option=com_email&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="email-form" class="form-validate">

    <div class="width-60 fltlft">
        <fieldset class="adminform">
            <ul class="adminformlist">
                <?php foreach($this->form->getFieldset('details') as $field): ?>
                    <li><?php echo $field->label;echo $field->input; echo "<br><br>"?></li>
                <?php endforeach; ?>
            </ul>
    </div>
    </fieldset>

    <fieldset class="adminform">
        <div>
            <h3><?php echo JText::_("COM_EMAIL_INDICATORS_LIST"); ?></h3>
            <p class="small"><?php echo JText::_("COM_EMAIL_INDICATORS_INFO"); ?></p>
            <dl class="dl-horizontal">
                <dt>{SITE_NAME}</dt>
                <dd><?php echo JText::_("COM_EMAIL_EMAIL_SITE_NAME"); ?></dd><br>
                <dt>{SITE_URL}</dt>
                <dd><?php echo JText::_("COM_EMAIL_EMAIL_SITE_URL"); ?></dd><br>
                <dt>{ITEM_TITLE}</dt>
                <dd><?php echo JText::_("COM_EMAIL_EMAIL_ITEM_TITLE"); ?></dd><br>
                <dt>{ITEM_URL}</dt>
                <dd><?php echo JText::_("COM_EMAIL_EMAIL_ITEM_URL"); ?></dd><br>
                <dt>{SENDER_NAME}</dt>
                <dd><?php echo JText::_("COM_EMAIL_EMAIL_SENDER_NAME"); ?></dd><br>
                <dt>{SENDER_EMAIL}</dt>
                <dd><?php echo JText::_("COM_EMAIL_EMAIL_SENDER_EMAIL"); ?></dd><br>
                <dt>{RECIPIENT_NAME}</dt>
                <dd><?php echo JText::_("COM_EMAIL_EMAIL_RECIPIENT_NAME"); ?></dd><br>
                <dt>{RECIPIENT_EMAIL}</dt>
                <dd><?php echo JText::_("COM_EMAIL_EMAIL_RECIPIENT_EMAIL"); ?></dd><br>
                <dt>{AMOUNT}</dt>
                <dd><?php echo JText::_("COM_EMAIL_EMAIL_AMOUNT"); ?></dd><br>
                <dt>{TRANSACTION_ID}</dt>
                <dd><?php echo JText::_("COM_EMAIL_EMAIL_TRANSACTION_ID"); ?></dd><br>
            </dl>
        </div>
    </fieldset>
    <div>
        <input type="hidden" name="task" value="email" />
        <?php echo JHtml::_('form.token'); ?>
    </div>
</form>
