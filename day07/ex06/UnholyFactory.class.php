<?php

class UnholyFactory {

	private $_blueprints = [];

	public function absorb($fighter)
	{
		if ($fighter instanceof Fighter)
		{
			$type = $fighter->getType();
			if (!array_key_exists($type, $this->_blueprints))
			{
				$this->_blueprints[$type] = $fighter;
				echo sprintf("(Factory absorbed a fighter of type %s)\n", $type);
			}
			else
				echo sprintf("(Factory already absorbed a fighter of type %s)\n", $type);
		}
		else
		{
			print "(Factory can't absorb this, it's not a fighter)\n";
		}
	}

	public function fabricate($type)
	{
		if (array_key_exists($type, $this->_blueprints))
		{
			print sprintf("(Factory fabricates a fighter of type %s)\n", $type);
			return clone $this->_blueprints[$type];
		}
		else
		{
			print sprintf("(Factory hasn't absorbed any fighter of type %s)\n", $type);
			return NULL;
		}
	}

}
// (Factory absorbed a fighter of type foot soldier)
// (Factory already absorbed a fighter of type foot soldier)
// (Factory absorbed a fighter of type archer)
// (Factory absorbed a fighter of type assassin)
// (Factory can't absorb this, it's not a fighter)
// (Factory fabricates a fighter of type foot soldier)
// (Factory hasn't absorbed any fighter of type llama)
// (Factory fabricates a fighter of type foot soldier)
// (Factory fabricates a fighter of type archer)
// (Factory fabricates a fighter of type foot soldier)
// (Factory fabricates a fighter of type assassin)
// (Factory fabricates a fighter of type foot soldier)
// (Factory fabricates a fighter of type archer)
// * draws his sword and runs towards the Hound *
// * draws his sword and runs towards Tyrion *
// * draws his sword and runs towards Podrick *
// * draws his sword and runs towards the Hound *
// * draws his sword and runs towards Tyrion *
// * draws his sword and runs towards Podrick *
// * shoots arrows at the Hound *
// * shoots arrows at Tyrion *
// * shoots arrows at Podrick *
// * draws his sword and runs towards the Hound *
// * draws his sword and runs towards Tyrion *
// * draws his sword and runs towards Podrick *
// * creeps behind the Hound and stabs at it *
// * creeps behind Tyrion and stabs at it *
// * creeps behind Podrick and stabs at it *
// * draws his sword and runs towards the Hound *
// * draws his sword and runs towards Tyrion *
// * draws his sword and runs towards Podrick *
// * shoots arrows at the Hound *
// * shoots arrows at Tyrion *
// * shoots arrows at Podrick *

?>