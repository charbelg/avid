<?php

class user extends BaseModel{

	public $fname;
	public $lname;
	public $gender;
	public $status;
	public $avatar;
	
	public function __construct($fname,$lname,$gender,$status,$skinValue,$hairValue,$shirtValue,$pantsValue) {
		parent::__construct();
		$this->fname = $fname;
		$this->lname = $lname;
		$this->gender = $gender;
		$this->status = $status;
		$this->avatar = new avatar();
		$this->avatar->setAvatarFeatures($skinValue,$hairValue,$shirtValue,$pantsValue);
	}
	
	public function saveUser($user){
		$stmt = $this->database->prepare("INSERT INTO users (fname,lname,gender,status,skin,hair,shirt,pants) values (:fname, :lname, :gender, :status, :skin, :hair, :shirt, :pants)");
		$stmt->execute(array(':fname'=>$user->fname,':lname'=>$user->lname,':gender'=>$user->gender,':status'=>$user->status,':skin'=>$user->avatar->skinValue,':hair'=>$user->avatar->hairValue,':shirt'=>$user->avatar->shirtValue,':pants'=>$user->avatar->pantsValue));
	}
	

	/* returns the human readable value for any user characteristics value
	*/
	public function getReadableFormat($type,$value){
		$stmt = $this->database->prepare('SELECT * FROM characteristics WHERE type=:type AND value=:value');
		$stmt->bindParam(':type', $type);
		$stmt->bindParam(':value', $value);
		$stmt->execute();
		$row = $stmt->fetch();
		return $row['key'];
	}
	
		public function __destruct(){
		parent::__destruct();
	}
	

}

?>