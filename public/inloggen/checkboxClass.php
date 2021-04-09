<?php
require_once './connectionClass.php';
class checkboxClass extends connectionClass{
    public function addtoDatabase($value) {
        $insert="Insert into users_subjects (usersId) values ('$value')"; //  userid/usersId usersSubjects
        $result=$this->query($insert) or die($this->error);
        if($result) {
            return "<h2 class='text-success'>Updated</h2>";
        }
        else{
            return "<h2 class='text-success'>Not updated</h2>";
        }
    }
}