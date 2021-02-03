<?php

Class NewUser extends Dbh{

  private $uid;
  private $pwd;
  private $fName;
  private $lName;
  private $number;
  private $utype;

  protected function __construct($uid, $pwd, $fName, $lName, $number, $utype) {
    $this->uid=$uid;
    $this->pwd=$pwd;
    $this->fName=$fName;
    $this->lName=$lName;
    $this->number=$number;
    $this->utype=$utype;
  }

 protected function signup(){
   
   // $hashedPwd = password_hash($this->pwd, PASSWORD_DEFAULT);

   $sql = "INSERT INTO users (username, password, fName, lName, number, utype) VALUES (:username, :password, :fName, :lName, :number, :utype)";
   $stmt = $this->connect()->prepare($sql);
    
    $stmt->bindValue(':username', $this->uid);
    $stmt->bindValue(':password', $this->pwd);
    $stmt->bindValue(':fName', $this->fName);
    $stmt->bindValue(':lName', $this->lName);
    $stmt->bindValue(':number', $this->number);
    $stmt->bindValue(':utype', $this->utype);
 
    $result = $stmt->execute();
 }

}
