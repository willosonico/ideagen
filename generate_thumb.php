<?
	define("DEFAULT_FONT", "fonts/noah-bold-webfont.ttf");
	define("DEFAULT_COLOR", "000000");
	define("DEFAULT_SIZE", 32);
	define("DEFAULT_ANGLE", 0);
	define("DEFAULT_PADDING", 10);
	define("DEFAULT_SPACING", 0);
	
	function do_img() {
		$text = $_GET['text'];
		
		$font = $_GET['font'] ? $_GET['font'] : DEFAULT_FONT;
		$color = (strlen($_GET['color']) == 6 && ctype_alnum($_GET['color']))  ? "0x" . $_GET['color'] : "0x" . DEFAULT_COLOR;
		$size = (is_numeric($_GET['size'])) ? $_GET['size'] : DEFAULT_SIZE;
		$angle = (is_numeric($_GET['angle'])) ? $_GET['angle'] : DEFAULT_ANGLE;
		$padding = (is_numeric($_GET['padding'])) ? $_GET['padding']*4 : DEFAULT_PADDING*4;
		$spacing = (is_numeric($_GET['spacing'])) ? $_GET['spacing'] : DEFAULT_SPACING;
		
		$text_dimensions_1 = calculateTextDimensions(str_replace('_', ' ', $_GET['word1']), $font, $size, $angle, $spacing);
		$text_dimensions_2 = calculateTextDimensions(str_replace('_', ' ', $_GET['word2']), $font, $size, $angle, $spacing);
		$text_dimensions_3 = calculateTextDimensions(str_replace('_', ' ', $_GET['word3']), $font, $size, $angle, $spacing);
		
		$image_width = max(array($text_dimensions_1["width"], $text_dimensions_2["width"], $text_dimensions_3["width"])) + $padding;
		$image_height = 160;
		header("content-type: image/png");
		$new_image = imagecreatetruecolor($image_width, $image_height);
		
		ImageFill($new_image, 0, 0, 0xfffaee);
		imagesavealpha($new_image, true);
		imagealphablending($new_image, false);
		
		imagettftextSp($new_image, $size, $angle, 
			$text_dimensions_1["left"] + ($image_width / 2) - ($text_dimensions_1["width"] / 2), 
			40, 
			$color, $font, str_replace('_', ' ', $_GET['word1']), $spacing);
			
		imagettftextSp($new_image, $size, $angle, 
			$text_dimensions_2["left"] + ($image_width / 2) - ($text_dimensions_2["width"] / 2), 
			85, 
			$color, $font, str_replace('_', ' ', $_GET['word2']), $spacing);
			
		imagettftextSp($new_image, $size, $angle, 
			$text_dimensions_3["left"] + ($image_width / 2) - ($text_dimensions_3["width"] / 2), 
			125,
			$color, $font, str_replace('_', ' ', $_GET['word3']), $spacing);
		
		imageline($new_image, 0, 5, $image_width, 5, 0x000000);
		imageline($new_image, 0, 50, $image_width, 50, 0x000000);
		imageline($new_image, 0, 95, $image_width, 95, 0x000000);
		imageline($new_image, 0, 135, $image_width, 135, 0x000000);
		
		$final_img = imagecreatetruecolor($image_width, $image_width);
		
		ImageFill($final_img, 0, 0, 0xfffaee);
		imagesavealpha($final_img, true);
		imagealphablending($final_img, false);
		
		imagecopy($final_img, $new_image, 0, ($image_width-$image_height)/2, 0, 0, $image_width, $image_height);
		
		imagepng($final_img);
		imagedestroy($final_img); 
	}
	
	function imagettftextSp($image, $size, $angle, $x, $y, $color, $font, $text, $spacing = 0)
	{
		if ($spacing == 0)
		{
			imagettftext($image, $size, $angle, $x, $y, $color, $font, $text);
		}
		else
		{
			$temp_x = $x;
			for ($i = 0; $i < strlen($text); $i++)
			{
				$bbox = imagettftext($image, $size, $angle, $temp_x, $y, $color, $font, $text[$i]);
				$temp_x += $spacing + ($bbox[2] - $bbox[0]);
			}
		}
	}
	
	function calculateTextDimensions($text, $font, $size, $angle, $spacing) {
		$rect = imagettfbbox($size, $angle, $font, $text);
		$minX = min(array($rect[0],$rect[2],$rect[4],$rect[6]));
		$maxX = max(array($rect[0],$rect[2],$rect[4],$rect[6]));
		$minY = min(array($rect[1],$rect[3],$rect[5],$rect[7]));
		$maxY = max(array($rect[1],$rect[3],$rect[5],$rect[7]));
		$spacing = ($spacing*(strlen($text)+2));
		return array(
		 "left"   => abs($minX) - 1,
		 "top"    => abs($minY) - 1,
		 "bottom"    => abs($maxY) - 1,
		 "width"  => ($maxX - $minX)+$spacing,
		 "height" => $maxY - $minY,
		 "box"    => $rect
		);
	} 
	
	do_img();
	
?>