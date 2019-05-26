<?php

include_once 'DataModel.php';
class ContactModel extends DataModel {
    function __construct() {
        parent::__construct('contacts');
    }

    function deleteRecord($id) {
        $sql = "delete from contacts  where id=$id";
        $statement = $this->conn->query($sql);
        $success = $statement->execute();
        
    }
    
    function insertRecord($values) {
        
            $sql = "insert into contacts (
                            first_name,
                            last_name,
                            email,
                            mobile,
                            photo_filename)
                            values(?,?,?,?,?)";
            
            $first_name = $_POST["first_name"];
            $last_name = $_POST["last_name"];
            $email = $_POST["email"];
            $mobile = $_POST["mobile"];
            $filename = $_FILES['photo_filename']['tmp_name'];
           
            $destination = 'photos/' . $_FILES['photo_filename']['name'];
            
            move_uploaded_file($filename, $destination);
            
            $photo_filename = $_FILES['photo_filename']['name'];
            
            $statement = $this->conn->prepare($sql);
            $values = [$first_name, $last_name, $email, $mobile, $photo_filename];
            $success = $statement->execute($values);   
    }
    
    function readRecords() {
    
        $sql = "select * from contacts";   
        $statement = $this->conn->query($sql);
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $records = [] ;
        while ($row = $statement->fetch()) {
            $records[] = $row; 
        }
        return $records;  
    }
    
    function searchRecords($keyword) {
        $sql = "select * from contacts  where first_name like '%$keyword%'
                                            or last_name like '%$keyword%'
                                            or mobile like '%$keyword%'
                                            or email like '%$keyword%'";
        $statement = $this->conn->query($sql);
        $records = [];
        while ($row = $statement->fetch()) {
            $records[] = $row;
        }
        include_once('view/viewContacts.php');
    }
    
    function updateRecord($id) {
        
            $id = $_GET['id'];
            $sql = "update contacts set first_name = ?,
                                        last_name = ?,
                                        email = ?,
                                        mobile = ?,
                                        photo_filename = ?
                                        where id=$id";

            $first_name = $_POST["first_name"];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $mobile = $_POST['mobile'];

            if ( ($_FILES['photo_filename']['name']) == '' ) {
                $_FILES['photo_filename']['name'] = 'default.jpg';
                $_FILES['photo_filename']['tmp_name'] = 'default.jpg';
            }

            $filename = $_FILES['photo_filename']['tmp_name'];

            $destination = 'assets/img/photos/' . $_FILES['photo_filename']['name'];
            move_uploaded_file($filename, $destination);
            $photo_filename = $_FILES['photo_filename']['name'];

            $statement = $this->conn->prepare($sql);

            $values = [$first_name, $last_name, $email, $mobile, $photo_filename];

            $statement->execute($values);
        
    }

    public function readRecord($id) {
        
        $sql = "select * from contacts where id=$id";   
        $statement = $this->conn->query($sql);
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $records = [];
        while ($row = $statement->fetch()) {
            $records[] = $row; // add each row of data to array
        }
        return $records[0];
    }

}
