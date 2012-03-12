<?php session_start();
  $width = 124;				//Ширина изображения
  $height = 65;				//Высота изображения
  $font_size = 17.5;   			//Размер шрифта
  $let_amount = 5;			//Количество символов, которые нужно набрать
  $fon_let_amount = 30;		//Количество символов на фоне
  $path_fonts = 'fonts/';	//Путь к шрифту
  $template = 'template.png';
   
  $letters = array('a','b','c','d','e','f','g','h','j','k','m','n','p','q','r','s','t','u','v','w','x','y','z','2','3','4','5','6','7','9');
  $colors = array('10','30','50','70','90','110','130');
 
  //$src = imagecreatetruecolor($width,$height);
  $src = imagecreatefrompng($template);
  $fon = imagecolorallocate($src,255,255,255);
  imagefill($src,0,0,$fon);
 
  $fonts = array();
  $dir = opendir($path_fonts);
  while($fontName = readdir($dir)) {
    if($fontName != "." && $fontName != "..") {
      $fonts[] = $fontName;
    }
  }
  closedir($dir);
 
  for($i=0 ; $i<$fon_let_amount ; $i++) {
    $color = imagecolorallocatealpha($src,rand(0,255),rand(0,255),rand(0,255),100); 
    $font = $path_fonts.$fonts[rand(0,sizeof($fonts)-1)];
    $letter = $letters[rand(0,sizeof($letters)-1)];
    $size = rand($font_size-2,$font_size+2);
    imagettftext($src,$size,rand(0,45),rand($width*0.1,$width-$width*0.1),rand($height*0.2,$height),$color,$font,$letter);
  }
 
  for($i=0 ; $i<$let_amount ; $i++) {
    $crand = rand(0,sizeof($colors)-1);
    $color = imagecolorallocatealpha($src,$colors[$crand],$colors[$crand],$colors[$crand],rand(20,40)); 
    $font = $path_fonts.$fonts[rand(0,sizeof($fonts)-1)];
    $letter = $letters[rand(0,sizeof($letters)-1)];
    $size = rand($font_size*2.1-2,$font_size*2.1+2);
    $x = ($i+1)*$font_size + rand(4,7);
    $y = (($height*2)/3) + rand(0,5);
    $cod[] = $letter;   
    imagettftext($src,$size,rand(0,15),$x,$y,$color,$font,$letter);
  }
 
  $_SESSION['captcha'] = implode('', $cod);
 
  header("Content-type: image/gif");
  header('Cache-Control: no-cache, must-revalidate');
  header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
  imagegif($src);
?>
