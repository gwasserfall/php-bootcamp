<?php 

class House {

	public function getHouseName()
	{
		return False;
	}
	
	public function getHouseMotto()
	{
		return False;
	}
	
	public function getHouseSeat()
	{
		return False;
	}

	public function introduce()
	{
		if (!$this->getHouseName() || !$this->getHouseSeat() || !$this->getHouseMotto())
			throw new Exception("Wrong show.", 1);
			
		else
			print sprintf("House %s of %s : \"%s\"\n", 
				$this->getHouseName(), 
				$this->getHouseSeat(), 
				$this->getHouseMotto()
			);
	}

}

?>