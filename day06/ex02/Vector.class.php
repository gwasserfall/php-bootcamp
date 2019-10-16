<?php

require_once "../ex01/Vertex.class.php";

class Vector {

    private $_magX;
    private $_magY;
    private $_magZ;
    private $_w = 0.0;

    public static $verbose = FALSE;

	public function __construct($array)
	{
        $dest = $array["dest"];

        if (isset($array["orig"]))
            $orig = $array["orig"];
        else
            $orig = new Vertex([ "x" => 0, "y" => 0, "z" => 0 ]);

        $this->_magX = $dest->x - $orig->x;
        $this->_magY = $dest->y - $orig->y;
        $this->_magZ = $dest->z - $orig->z;

		if (self::$verbose)
			print sprintf("%s constructed\n", $this->__toString());
	}
    
    public function magnitude()
    {
        return sqrt(pow($this->magX, 2) + pow($this->magY, 2) + pow($this->magZ, 2));
    }

    public function normalize()
    {
        $mag = $this->magnitude();
        return new Vector(["dest" => new Vertex([
            "x" => $this->_magX / $mag,
            "y" => $this->_magY / $mag,
            "z" => $this->_magZ / $mag
        ])]);
    }

    public function add($rhs)
    {
        return new Vector(["dest" => new Vertex([
            "x" => $this->_magX + $rhs->magX,
            "y" => $this->_magY + $rhs->magY,
            "z" => $this->_magZ + $rhs->magZ
        ])]);
    }

    public function sub($rhs)
    {
        return new Vector(["dest" => new Vertex([
            "x" => $this->_magX + ($rhs->magX * -1),
            "y" => $this->_magY + ($rhs->magY * -1),
            "z" => $this->_magZ + ($rhs->magZ * -1)
        ])]);
    }

    public function opposite()
    {
        return new Vector(["dest" => new Vertex([
            "x" => $this->_magX * -1,
            "y" => $this->_magY * -1,
            "z" => $this->_magZ * -1
        ])]);
    }
    
    public function scalarProduct($k)
    {
        return new Vector(["dest" => new Vertex([
            "x" => $this->_magX * $k,
            "y" => $this->_magY * $k,
            "z" => $this->_magZ * $k
        ])]);
    }
    
    public function dotProduct($rhs)
    {
        return ($this->_magX * $rhs->magX) + ($this->_magY * $rhs->magY) + ($this->_magZ * $rhs->magZ);
    }

    public function crossProduct($rhs)
    {
        return new Vector(["dest" => new Vertex([
            "x" => ($this->_magY * $rhs->magZ) - ($this->_magZ * $rhs->magY),
            "y" => ($this->_magZ * $rhs->magX) - ($this->_magX * $rhs->magZ),
            "z" => ($this->_magX * $rhs->magY) - ($this->_magY * $rhs->magX),
        ])]);
    }

    public function cos($rhs)
    { 
        return ($this->dotProduct($rhs)) / ($this->magnitude() * $rhs->magnitude());
    }

    function __destruct()
    {
        if (self::$verbose)
            print sprintf("%s destructed\n", $this->__toString());
    }

	public function __toString()
	{
		return sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )", $this->_magX, $this->_magY, $this->_magZ, $this->_w);
	}

	public static function doc()
    {
        echo file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . "Vector.doc.txt"), "\n";
    }

    function __get($prop)
    {
        switch ($prop) {
            case "magX":
                return $this->_magX;
                break;
            case "magY":
                return $this->_magY;
                break;
            case "magZ":
                return $this->_magZ;
                break;
            case "w":
                return $this->_w;
                break;
            default:
                return "";
        }
    }


}
?>