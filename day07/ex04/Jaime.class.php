<?php 

require_once "Lannister.class.php";

class Jaime extends Lannister {

	public function sleepWith($person)
	{
		if ($person instanceof Cersei)
			print "With pleasure, but only in a tower in Winterfell, then.\n";
		elseif ($person instanceof Lannister)
			print "Not even if I'm drunk !\n";
		else
			print "Let's do this.\n";
	}
}

?>