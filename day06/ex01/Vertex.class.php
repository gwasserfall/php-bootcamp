<?php

include_once("../ex00/Color.class.php");


class Vertex {

	public $x, $y, $z, $color;
	public $w = 1.0;
	public static $verbose = FALSE;

	public function __construct($array)
	{
		$this->x = (isset($array["x"])) ? $array["x"] : $this->x;
		$this->y = (isset($array["y"])) ? $array["y"] : $this->y;
		$this->z = (isset($array["z"])) ? $array["z"] : $this->z;
		$this->w = (isset($array["w"])) ? $array["w"] : $this->w;
		$this->color = (isset($array["color"])) ? $array["color"] : $this->color;

		if (!$this->color)
			$this->color = new Color(["rgb" => 0xFFFFFF]);
		if (self::$verbose)
			print sprintf("%s contructed.\n", $this->__toString());
	}

	public function __toString()
	{
		return sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f%s)", 
			$this->x, 
			$this->y, 
			$this->z, 
			$this->w,
			(self::$verbose) ? ", " . $this->color . " " : " " );
	}

	function __destruct()
    {
        if (self::$verbose)
            print sprintf("%s destructed.\n", $this->__toString());
	}
	
	public static function doc()
    {
        echo file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . "Vertex.doc.txt"), "\n";
    }

}

?>