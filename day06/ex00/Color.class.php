<?php 

class Color {

    public $red, $green, $blue;
    public static $verbose = FALSE;

    function __construct($array)
    {
        if (array_key_exists("rgb", $array))
        {

            $num = $array["rgb"];
            $this->red = ($num >> 16) & 0xFF;
            $this->green = ($num >> 8) & 0xFF;
            $this->blue = $num & 0xFF;
        }
        else
        {
            $this->red = $array["red"];
            $this->green = $array["green"];
            $this->blue = $array["blue"];
        }

        if (self::$verbose)
            print sprintf("%s constructed.\n", $this->__toString());
    }

    function __destruct()
    {
        if (self::$verbose)
            print sprintf("%s destructed.\n", $this->__toString());
    }

    public static function doc()
    {
        echo file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . "Color.doc.txt"), "\n";
    }

    public function __toString()
    {
        return sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue);
    }

    public function add($Color)
    {
        $new_red = $this->red + $Color->red;
        $new_grn = $this->green + $Color->green;
        $new_blu = $this->blue + $Color->blue;

        return new Color(["red" => $new_red, "green" => $new_grn, "blue" => $new_blu]);
    }

    public function sub($Color)
    {
        $new_red = $this->red - $Color->red;
        $new_grn = $this->green - $Color->green;
        $new_blu = $this->blue - $Color->blue;

        return new Color(["red" => $new_red, "green" => $new_grn, "blue" => $new_blu]);
    }

    public function mult($multiplyer)
    {
        $new_red = $this->red * $multiplyer;
        $new_grn = $this->green * $multiplyer;
        $new_blu = $this->blue * $multiplyer;

        return new Color(["red" => $new_red, "green" => $new_grn, "blue" => $new_blu]);
    }
};

?>