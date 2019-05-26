<?php
include_once 'controller/Controller.php';
include_once 'model/ContactModel.php';
include_once 'view/Page.php';

class ContactsController extends Controller{
    
    var $contact = null;
    
    function __construct() {
        $this->contact = new ContactModel();
    }
    
    function index() {
        include_once 'view/content.php';
    }
    
    function addContact(){
        
        if (isset($_POST['submit'])) {
            $errors = [];
            $values = [];
            unset($_POST['submit']);
            foreach($_POST as $key => $value) {
                ${$key} = $value;
                $values[] = $value;
            }
            $id = [];
            $values[] = $id;

            if(count($errors) == 0){
                $success = $this->contact->insertRecord($values);
                
                $records = $this->contact->readRecords ();

                $data['records'] = $records;

                Page::getView("viewContacts", $data);
            }else{
                $_REQUEST['errors'] = $errors;
                Page::getView("addContactForm", $_REQUEST);
            }
            
            
        } else {
            $data = [];            
            Page::getView("addContactForm", $data);
        }            
    }
    
    function deleteContact($id){
        $success = $this->contact->deleteRecord($id);
        $records = $this->contact->readRecords ();
        $data['records'] = $records;
        Page::getView("viewContacts", $data);
        
    }
    
    function editContact($id){
        if (isset($_POST['update'])) {
            $errors = [];
            $values = [];
            unset($_POST['update']);
            foreach($_POST as $key => $value) {
                ${$key} = $value;
                $values[] = $value;
            }

            $values[] = $id;


            if(count($errors) == 0){
                $this->contact->updateRecord($values, $id);
                
                $records = $this->contact->readRecords();

                $data['records'] = $records;
                Page::getView("viewContacts", $data);
            }else{
                $_REQUEST['errors'] = $errors;
                Page::getView("editContact", $_REQUEST);
            }
            
            
        }
        else {
            $data = [];
            $a = array();
            $data = $this->contact->readRecord($id);
            Page::getView("editContact", $data);
        }
    }
    
    function searchContacts(){
        if (isset($_POST['search'])) {
            
            $errors = [];
            $values = [];
            $keyword = $_POST["keyword"];
            unset($_POST['search']);
            foreach($_POST as $key => $value) {
                ${$key} = $value;
                $values[] = $value;
            }
            $id = [];
            $values[] = $id;

            if(count($errors) == 0){
                $success = $this->contact->searchRecords($keyword);

                $records = $this->contact->readRecords();

                $data['records'] = $records;

                Page::getView("viewContacts", $data);
            } else {
                $_REQUEST['errors'] = $errors;
                Page::getView("searchForm", $_REQUEST);
            }
        } else {
            $data = [];            
            Page::getView("searchForm", $data);
        }   
    }
    
    function ViewContacts(){
        $data = [];
        
        $records = $this->contact->readRecords();
        
        $data['records'] = $records;


        Page::getView("viewContacts", $data);
    }
}
