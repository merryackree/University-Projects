<?php

require "../header.php";


Class Register extends NewUser {

  protected $utype;
  protected $uid;
  protected $pwd;
  protected $pwdRepeat;
  protected $fName;
  protected $lName;
  protected $number;

  public function __construct($uid, $pwd, $pwdRepeat, $fName, $lName, $number, $utype) {
  $this->uid=$uid;
  $this->pwd=$pwd;
  $this->pwdRepeat=$pwdRepeat;
  $this->fName=$fName;
  $this->lName=$lName;
  $this->number=$number;
  $this->utype=$utype;
  }

  public function checkInput() {
    if (empty($this->uid) || empty($this->pwd) || empty($this->pwdRepeat) || $this->utype == "0" || $this->utype == null || empty($this->fName) || empty($this->lName) || empty($this->number)) {
    	header("Location: ../register.php?error=emptyfields");
    	exit();
    }
    else if ($this->pwd !==$this->pwdRepeat) {
    	header("Location: ../register.php?error=passwordcheck");
    	exit();
    } else {

      $newUser = new NewUser($this->uid, $this->pwd, $this->fName, $this->lName, $this->number, $this->utype);
      $newUser->signup();
      header("Location: ../register.php?signup=success");
      exit();

    }
  }




}


$registerUser = new Register($_POST['uid'], $_POST['pwd'], $_POST['pwdRepeat'], $_POST['fName'], $_POST['lName'], $_POST['number'], $_POST['utype']);
$registerUser->checkInput();


