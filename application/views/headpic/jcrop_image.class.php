<?php
/*裁剪图片
js代码网
www.js-css.cn
*/
class jcrop_image{

	var $filepath;
	var $picname;
	var $x;
	var $y;
	var $w;
	var $h;
	var $tw;
	var $th;

	 public function __construct($filepath,$picname,$x,$y,$w,$h,$tw,$th) {
      
		$this->filepath=$filepath;//原始文件路径
		$this->picname=$picname;//原始文件名
		$this->x=$x;
		$this->y=$y;
		$this->w=$w;
		$this->h=$h;
		$this->tw=$tw;
		$this->th=$th;	
    }

	public function crop(){

		$picname=$this->picname;
		$filepath=$this->filepath;
		$x=$this->x;
		$y=$this->y;
		$w=$this->w;
		$h=$this->h;
		$tw=$this->tw;
		$th=$this->th;	
		
		$ext = end(explode(".",$picname));//获得文件后缀
                //echo '   $picname:  '.$picname.'    $filepath:'.$filepath;//
                
                $file1=$filepath.$picname;//组合完整文件路径+文件名
                //echo '      jcrop_image.calss.php  =====>   $file1   :'.$file1;
                //
		switch($ext){
			case "png":
				$image=imagecreatefrompng($file1);
				break;
			case "jpeg":
				
				$image=imagecreatefromjpeg($file1);
				break;
			case "jpg":
				
				$image=imagecreatefromjpeg($file1);
				break;
			case "gif":
				
				$image=imagecreatefromgif($file1);
				break;
		}
		$dst_r = ImageCreateTrueColor( $tw, $th );
		$this->setTransparency($image,$dst_r,$ext);
		imagecopyresampled($dst_r,$image,0,0,$x,$y,$tw,$th,$w,$h);
		imagedestroy($image);
		//在此处将路径修改为CDN路径$imgcdnpath，为了方便仍然使用变量$file
//                $file='http://image.52drivecar.com/'.'coach_imges/'.time().".".$ext;
//                 echo '    jcrop_image.calss.php  =====>   $file   :'.$file."</br>";
                //原来的绝对路径
		$file=$filepath.time().".".$ext;
                
		switch($ext){
			case "png":
				imagepng($dst_r,($file != null ? $file : ''));
				break;
			case "jpeg":
				imagejpeg($dst_r,($file ? $file : ''),90);
				break;
			case "jpg":
				imagejpeg($dst_r,($file ? $file : ''),90);
				break;
			case "gif":
				imagegif($dst_r,($file ? $file : ''));
				break;
		}
                $file2name=basename($file);
		$file2= 'http://'.$_SERVER['HTTP_HOST']."/application/views/headpic/upload/".$file2name;

		if(file_exists($file)){
			
			$returndata=array(
				"status"=>'1',
				"file"=>$file2,
				"error"=>''
			);
			
		}else{
			$returndata=array(
				"status"=>'0',
				"file"=>'',
				"error"=>'生成文件出错！'
			);		
		}

		echo json_encode($returndata);
		exit;
		
	
	}
		

	public function setTransparency($imgSrc,$imgDest,$ext){

		if($ext == "png" || $ext == "gif"){
			$trnprt_indx = imagecolortransparent($imgSrc);
			// If we have a specific transparent color
			if ($trnprt_indx >= 0) {
				// Get the original image's transparent color's RGB values
				$trnprt_color    = imagecolorsforindex($imgSrc, $trnprt_indx);
				// Allocate the same color in the new image resource
				$trnprt_indx    = imagecolorallocate($imgDest, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
				// Completely fill the background of the new image with allocated color.
				imagefill($imgDest, 0, 0, $trnprt_indx);
				// Set the background color for new image to transparent
				imagecolortransparent($imgDest, $trnprt_indx);
			}
			// Always make a transparent background color for PNGs that don't have one allocated already
			elseif ($ext == "png") {
				// Turn off transparency blending (temporarily)
				imagealphablending($imgDest, true);
				// Create a new transparent color for image
				$color = imagecolorallocatealpha($imgDest, 0, 0, 0, 127);
				// Completely fill the background of the new image with allocated color.
				imagefill($imgDest, 0, 0, $color);
				// Restore transparency blending
				imagesavealpha($imgDest, true);
			}

		}
	}


}