<?php
include_once 'config.php';
include_once 'view/header.php';
include_once 'controller/ContactsController.php';


$contactsController = new ContactsController();

if (isset($_GET['action'])) {
    
    $action = $_GET['action'];
    
    if($action == 'addcontact') {
        
        $contactsController->addContact();
        
    }
    
    else if($action == 'editcontact') {
        
        $contactsController->editContact($_GET['id']);
    }
    
    else if($action == 'deletecontact') {
        
        $contactsController->deleteContact($_GET['id']);
    }
    
    else if($action == 'searchcontacts') {
        
        $contactsController->searchContacts();
        
    }
    
    else if ($action == 'viewcontacts') {
        
        $contactsController->viewContacts();
    }
} else {
    include_once 'view/content.php';
    
    
}
include_once 'view/footer.php';
?>
