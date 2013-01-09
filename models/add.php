<?php
class addModel extends BaseModel{

	public $textfields = array();
	public $dropdowns = array();
	public $avatarItems = array(); 
	public $avatar;
	
	public function Index() {
		$this->getAddFormData();
		return $this;
	}
	
	/* get all needed components from database to create default add user form
	*/
	protected function getAddFormData(){
		$this->avatar = new avatar();
		$this->getCharacteristicsComponents();
		$this->getAvatarComponents();
	}
	
	
	/* initializes the textfields and dropdowns arrays with components registered in the database
	*/
	protected function getCharacteristicsComponents(){
		$stmt = $this->database->prepare('SELECT DISTINCT type, control, label FROM characteristics');
		$stmt->execute();
		while ($row = $stmt->fetch()) {

			if($row['control']=='textfield'){
				$this->textfields[] = $row;
			}
			elseif($row['control']=='dropdown'){ 
				$dropDown = $this->getDropdownControl($row['type']);
				$this->dropdowns[] = $dropDown;
			}
			
		}
	}
	
	/* function that returns the values of a particular dropdown component registered in the database 
	*/
	protected function getDropdownControl($name){
		$temp = array();
		$stmt = $this->database->prepare('SELECT * FROM characteristics WHERE type=:name');
		$stmt->bindParam('name', $name);
		$stmt->execute();
		while($row = $stmt->fetch()){
			$temp[] = $row;
		}
		return $temp;
	}
	
	/* creates the avatar items array, which is an array containing arrays of avatar items for each avatar category (hair, shirt, pants .. etc )
	*/
	protected function getAvatarComponents(){
		$stmt = $this->database->prepare('SELECT DISTINCT type FROM avatar_items');
		$stmt->execute();
		while ($row = $stmt->fetch()) {
				$categoryItems = $this->getAvatarCategoryItems($row['type']);
				$this->avatarItems[] = $categoryItems;
		}
	}
	
	/* function that returns avatar items for a given category( hair, shirt.. etc)
	*/
	protected function getAvatarCategoryItems($categoryType){
		$temp = array();
		$stmt = $this->database->prepare('SELECT * FROM avatar_items WHERE type=:categoryType');
		$stmt->bindParam('categoryType', $categoryType);
		$stmt->execute();
		while($row = $stmt->fetch()){
			$temp[] = $row;
		}
		return $temp;
	}
	
	
	
}
?>