<?php
require_once './dbconnection.php';
class hematologyClass extends dbcon{
    public function addtoDatabase($value){
        $insert =  "Insert into lab_test(hematology) values ('$value')";
        $result = $this->query($insert) or die ($this->error);
        if ($result){
            return "<h2 class = 'text-sucesss'>update</h2>";
        }
        else
        {
            return "<h2 class = 'text-danger'>Not Update</h2>";   
    }
}