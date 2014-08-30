<?php

require_once(JPATH_COMPONENT . '/controller.php');

// Get an instance of the controller prefixed by <name>
    $controller = JControllerLegacy::getInstance('lendr');

        // Perform the Request task
        $controller->execute(JFactory::getApplication()->input->getCmd('task'));

        // Redirect if set by the controller
        $controller->redirect();