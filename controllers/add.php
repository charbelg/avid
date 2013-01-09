<?php

class Add extends BaseController {
	protected function Index() {
		$viewmodel = new AddModel();
		$this->ReturnView($viewmodel->index(), true);
	}
	
	protected function process() {
		$processview = new ProcessModel();
		$this->ReturnView($processview->index(), true);
	}
}

?>