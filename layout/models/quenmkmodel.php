<?php
class quenmkModel {


    // public function __construct($email){
    //     $this->email =$email;
    // }

    public function checkmail ($email){
        $sql ="SELECT * FROM user WHERE email = :email";
        require "connectmodel.php";
        $con = new ConnectModel();
        return $con->selectonemail($sql,$email);
    }


}
?>