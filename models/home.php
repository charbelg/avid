<?php
class HomeModel extends BaseModel{

	public $users = array();
	
	public function Index() {
		$this->getAllUsers();
		return $this;
	}
	
	public function getAllUsers(){
		$stmt = $this->database->prepare('SELECT * FROM users');
		$stmt->execute();
		while ($row = $stmt->fetch()) {
				$user = new user($row['fname'],$row['lname'],$row['gender'],$row['status'],$row['skin'],$row['hair'],$row['shirt'],$row['pants']);
				$this->users[] = $user;
		}
	}
}
?>