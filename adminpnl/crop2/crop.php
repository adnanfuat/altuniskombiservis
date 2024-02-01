<? session_start();
/**
 * Jcrop image cropping plugin for jQuery
 * Example cropping script
 * @copyright 2008-2009 Kelly Hallman
 * More info: http://deepliquid.com/content/Jcrop_Implementation_Theory.html
 */
//include("config.php");
$uzaklik="../../";
include($uzaklik."inc_s/baglanti.php");
//$syonetim=$_SESSION["siteyonetici"];
if ($_SERVER['REQUEST_METHOD'] == 'POST')
   {
		$src_x = $_POST["x"];
		$src_y = $_POST["y"];
		$src_w = $_POST["w"];
		$src_h = $_POST["h"];
	
		$post_dir = $_POST["dir"];
		if  (isset($_POST["kat"]))
			{
				$carpan=$_POST["kat"];
			}
		else
			{
				$carpan=1;	
			}
		$targ_w = $_POST["targ_w"];
		$targ_h = $_POST["targ_h"];
		$targ_w2=$targ_w*$carpan;
		$targ_h2=$targ_h*$carpan;
		$ratio=$targ_w/$targ_h;
		$ratio=number_format($ratio,1);
		$filename=$_POST["file"];
		$resim_dizini=$uzaklik."rsmlr/".$post_dir."/";
		$dir=$resim_dizini;

		$quality = 100;

		$ext=strrpos($filename,".");
		$ext=substr($filename,$ext+1);
		switch (strtolower($ext)) 
			{
			   case 'jpg' : $img_r = @imagecreatefromjpeg ($dir.$filename); break; 
			   case 'jpeg': $img_r  = @imagecreatefromjpeg ($dir.$filename); break;
			   case 'gif' : $img_r = @imagecreatefromgif  ($dir.$filename); break;
			   case 'png' : $img_r = @imagecreatefrompng  ($dir.$filename); break;
			}
	
		$dst_r = imagecreatetruecolor($targ_w2, $targ_h2);

		/////// Bu bolumdeki kodlar png ve gif formatinda transparan olarak da eklenen resim formatlarinin transparanlik ozelligini korumasi icin kullaniliyor ///////////// (s)
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if  (strtolower($ext)=="png" || strtolower($ext)=="gif")
			{
				imagecolortransparent($dst_r, imagecolorallocatealpha($dst_r, 0, 0, 0, 127));
				imagealphablending($dst_r, false);
				imagesavealpha($dst_r, true);				    
			}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		/////// Bu bolumdeki kodlar png ve gif formatinda transparan olarak da eklenen resim formatlarinin transparanlik ozelligini korumasi icin kullaniliyor ///////////// (f)
	
		imagecopyresampled($dst_r,$img_r,0,0,$src_x,$src_y, $targ_w2,$targ_h2,$src_w,$src_h);

		//header('Content-type: image/jpeg'); // Resmi browserde görebilmek için bu iki satir kullaniliyor....
		//imagejpeg($dst_r,null,$quality);

		$temp_file_name="test.".$ext;
		switch (strtolower($ext)) 
			{
			   case 'jpg' : @imagejpeg($dst_r,$dir.$temp_file_name,$quality);  break; 
			   case 'jpeg': @imagejpeg($dst_r,$dir.$temp_file_name,$quality);  break;
			   case 'gif' : @imagegif($dst_r,$dir.$temp_file_name,$quality);   break;
			   case 'png' : @imagepng($dst_r,$dir.$temp_file_name,$quality);  break;
			}
		@imagedestroy($dst_r);
		//exit;
		rename($dir.$temp_file_name,$dir.$filename);
		header( "refresh:0;url=icrop.php?w=$targ_w&h=$targ_h&file=$filename&dir=$post_dir&kat=$carpan");
	}
?>