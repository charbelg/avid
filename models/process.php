<?php
class ProcessModel extends BaseModel{

	public $user;
	public $fname;
	public $lname;
	
	public function Index() {
		$this->fname = $_POST['fname'];
		$this->lname = $_POST['lname'];
		$this->user = new user($_POST['fname'],$_POST['lname'],$_POST['gender'],$_POST['status'],$_POST['av_face_value'],$_POST['av_hair_value'],$_POST['av_shirt_value'],$_POST['av_pants_value']);
		$this->user->saveUser($this->user);
		return $this;
	}
	
}
?>