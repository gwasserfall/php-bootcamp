<?php

require_once "../ex00/Color.class.php";

class Vertex {

	private $_x, $_y, $_z, $_color;
	private $_w = 1.0;
	public static $verbose = FALSE;

	public function __construct($array)
	{
		$this->_x = (isset($array["x"])) ? $array["x"] : $this->_x;
		$this->_y = (isset($array["y"])) ? $array["y"] : $this->_y;
		$this->_z = (isset($array["z"])) ? $array["z"] : $this->_z;
		$this->_w = (isset($array["w"])) ? $array["w"] : $this->_w;
		$this->_color = (isset($array["color"])) ? $array["color"] : $this->_color;

		if (!$this->_color)
			$this->_color = new Color(["rgb" => 0xFFFFFF]);
		if (self::$verbose)
			print sprintf("%s constructed\n", $this->__toString());
	}

	public function __toString()
	{
		return sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f%s )", 
			$this->_x, 
			$this->_y, 
			$this->_z, 
			$this->_w,
			(self::$verbose) ? ", " . $this->_color : "" );
	}

	function __destruct()
    {
        if (self::$verbose)
            print sprintf("%s destructed\n", $this->__toString());
	}
	
	public static function doc()
    {
        echo file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . "Vertex.doc.txt"), "\n";
	}
	
	public function __get($prop)
	{
		switch ($prop) {
            case "x":
                return $this->_x;
                break;
            case "y":
                return $this->_y;
                break;
            case "z":
                return $this->_z;
                break;
            case "w":
                return $this->_w;
				break;
			case "color":
                return $this->_color;
                break;
            default:
                return "";
        }
	}

	public function __set($prop, $value)
	{
		switch ($prop) {
            case "x":
                $this->_x = $value;
                break;
            case "y":
                $this->_y  = $value;
                break;
            case "z":
                $this->_z  = $value;
                break;
            case "w":
                $this->_w  = $value;
				break;
			case "color":
                $this->_color = $value;
                break;
            default:
                break;
        }
	}

}

?>