<?php
class imaging
{
    private $img_input;
    private $img_output;
    private $img_src;
    private $format;
    private $quality = 80;
    private $x_input;
    private $y_input;
    private $x_output;
    private $y_output;
    private $resize;

	// Find format
    public function set_img($img)
    {
        $ext = strtoupper(pathinfo($img, PATHINFO_EXTENSION));
        if(is_file($img) && ($ext == "JPG" OR $ext == "JPEG")) {
            $this->format = $ext;
            $this->img_input = ImageCreateFromJPEG($img);
            $this->img_src = $img;
        } else if(is_file($img) && $ext == "PNG") {
            $this->format = $ext;
            $this->img_input = ImageCreateFromPNG($img);
            $this->img_src = $img;
        } else if(is_file($img) && $ext == "GIF") {
            $this->format = $ext;
            $this->img_input = ImageCreateFromGIF($img);
            $this->img_src = $img;
        }
        $this->x_input = imagesx($this->img_input);
        $this->y_input = imagesy($this->img_input);
    }

    // Set maximum image size (pixels)
    public function set_size($max_x = 100,$max_y = 100)
    {
        if($this->x_input > $max_x || $this->y_input > $max_y)
        {
            $a= $max_x / $max_y;
            $b= $this->x_input / $this->y_input;
            if ($a<$b) {
                $this->x_output = $max_x;
                $this->y_output = ($max_x / $this->x_input) * $this->y_input;
            } else {
                $this->y_output = $max_y;
                $this->x_output = ($max_y / $this->y_input) * $this->x_input;
            }
            $this->resize = TRUE;
        } else { $this->resize = FALSE; }
    }
	
    // Set image quality (JPEG only)
    public function set_quality($quality)
    {
        if(is_int($quality))
        {
            $this->quality = $quality;
        }
    }
	
    // Save image
    public function save_img($path)
    {
        if($this->resize) {
            $this->img_output = ImageCreateTrueColor($this->x_output, $this->y_output);
            ImageCopyResampled($this->img_output, $this->img_input, 0, 0, 0, 0, $this->x_output, $this->y_output, $this->x_input, $this->y_input);
        }

        if($this->format == "JPG" OR $this->format == "JPEG") {
            if($this->resize) { imageJPEG($this->img_output, $path, $this->quality); }
            else { copy($this->img_src, $path); }
        } else if($this->format == "PNG"){
        
            if($this->resize) { imagePNG($this->img_output, $path); }
            else { copy($this->img_src, $path); }
        } else if($this->format == "GIF") {
            if($this->resize) { imageGIF($this->img_output, $path); }
            else { copy($this->img_src, $path); }
        }
    }
	
  public function save_img1($path,$width,$height)
  {
		$this->x_output=$width;
		$this->y_output=$height;
        if($this->resize){
            $this->img_output = ImageCreateTrueColor(400, 400);
            ImageCopyResampled($this->img_output, $this->img_input, 0, 0, 0, 0, 0, 400, 0, 400);
        }

        if($this->format == "JPG" OR $this->format == "JPEG"){
            if($this->resize) { imageJPEG($this->img_output, $path, $this->quality); }
            else { copy($this->img_src, $path); }
        } else if($this->format == "PNG") {
            if($this->resize) { imagePNG($this->img_output, $path); }
            else { copy($this->img_src, $path); }
        } else if($this->format == "GIF") {
            if($this->resize) { imageGIF($this->img_output, $path); }
            else { copy($this->img_src, $path); }
        }
    }

    public function get_width(){
        return $this->x_input;
    }

    public function get_height(){
        return $this->y_input;
    }

    public function clear_cache(){
        @ImageDestroy($this->img_input);
        @ImageDestroy($this->img_output);
    }
}

class thumbnail extends imaging {
    private $image;
    private $width;
    private $height;
   
    function __construct($image,$width,$height) {
	
		parent::set_img($image);
		parent::set_quality(80);
		parent::set_size($width,$height);

		$value=explode(".",$image);
		$abs=explode("/",$value[1]);
		$Thumb_image=$abs[2]."_T".".".$value[2];
		$pathimg=$abs[1]."/".$abs[2]."_T";
		$pathimggif=$abs[1]."/".$Thumb_image;

		$this->thumbnail= $pathimg.".".pathinfo($pathimggif, PATHINFO_EXTENSION);

		parent::save_img($this->thumbnail);
		parent::clear_cache();
	}
	function __toString() {
		return $this->thumbnail;
	}
}

class Small extends imaging {
    private $image;
    private $width;
    private $height;
   
    function __construct($image,$width,$height) {
		parent::set_img($image);
		parent::set_quality(80);
		parent::set_size('60','70');

		$this->Small= $image.'_S.'.pathinfo($image, PATHINFO_EXTENSION);

		parent::save_img($this->Small);
		parent::clear_cache();
	}
    function __toString() {
		return $this->Small;
    }
}

/*$thumb = new thumbnail('member_image/BGTML2_krish_5598.gif',72,200); 
echo $thumb;
echo '<img src=\''.$thumb.'\' />';*/
?>