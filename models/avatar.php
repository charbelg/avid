<?php
class avatar extends BaseModel{

	public $skinValue;
	public $hairValue;
	public $shirtValue;
	public $pantsValue;
	
	public function __construct() {
		parent::__construct();
		$this->skinValue = 1;
		$this->hairValue = 1;
		$this->shirtValue = 1;
		$this->pantsValue = 1;
	}
	
	public function setAvatarFeatures($skinValue,$hairValue,$shirtValue,$pantsValue){
		$this->skinValue = $skinValue;
		$this->hairValue = $hairValue;
		$this->shirtValue = $shirtValue;
		$this->pantsValue = $pantsValue;
	}
	
	public function getItemImage($type,$value,$part = 'face'){
		if($type == 'skin'){
			return $part . $value . '.png';
		}
		
		$stmt = $this->database->prepare('SELECT filename FROM avatar_items WHERE type=:type AND value=:value');
		$stmt->bindParam('type', $type);
		$stmt->bindParam('value', $value);
		$stmt->execute();
		$row = $stmt->fetch();
		return $row['filename'];
	}
	
}

?>