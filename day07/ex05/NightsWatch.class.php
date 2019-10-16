<?php

class NightsWatch {

	private $_recruits = [];

	public function recruit($individual)
	{
		array_push($this->_recruits, $individual);
	}

	public function fight()
	{
		foreach ($this->_recruits as $recruit) {
			if ($recruit instanceof IFighter)
				$recruit->fight();
		}
	}
}

?>