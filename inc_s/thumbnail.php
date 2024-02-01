<?
function ThumbNail ($source,$filename,$destination,$m_w,$m_h)
	{
		//Dimensions
		$ext=strpos($filename,".");
		$ext=substr($filename,$ext+1);
		//Do it
	   switch (strtolower($ext)) 
	   		{
 		   	   case 'jpg' : $imgSrc = imagecreatefromjpeg ($source.$filename);
    		                 break; 
		       case 'jpeg': $imgSrc  = imagecreatefromjpeg ($source.$filename);
    		                 break;
	    	   case 'gif' : $imgSrc = @imagecreatefromgif  ($source.$filename);
    	    	             break;
							 
			   case 'png' : $imgSrc = @imagecreatefrompng  ($source.$filename);
    	    	             break;
   			}
   
   	$max_width=$m_w; 
	$max_height=$m_h;
	$width=imagesx($imgSrc);
	$height=imagesy($imgSrc);

   $image_ratio = $width / $height; // Actual image's ratio
   $destination_ratio = $max_width / $max_height; // Ratio of dest. placeholder
   
   // Taller
/*   if($image_ratio < $destination_ratio)
   {
       //Too tall:
       if($height > $max_height)
       {
           $height = $max_height;
           $width = ceil($height * $image_ratio);
       }
   }
   // Wider / balanced & too wide:
   else if ($width > $max_width)
   {
       $width = $max_width;
       $height = ceil($width * $image_ratio);
   }
*/

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if (($max_height>=$height && $max_width>=$width) || ($max_height==$height && $max_width==$width)  )					  					  					  
	{
		 $n_height=$height;
		 $n_width=$width;
	 }
elseif ($max_width<$width && $max_height>$height)
	{ // 		*		*		*		*		*
        $n_height=round(($max_width*$height)/$width);
	    $n_width=$max_width;
	 }// 		*		*		*		*		*
elseif ($max_width>$width && $max_height<$height)
	{ // 		*		*		*		*		*
        $n_width=round($width*$max_height/$height);
	    $n_height=$max_height;
	 }// 		*		*		*		*		*
elseif ($max_width<=$width && $max_height<=$height)
	{ // 		*		*		*		*		*
         if (($width/$max_width)>($height/$max_height))
		      {
                  $n_height=round($max_width*$height/$width);
		          $n_width=$max_width;
			  }
	    else 
  		      {
                  $n_width=round($width*$max_height/$height);
			      $n_height=$max_height;
			  }
	}	   

$width=$n_width;
$height=$n_height;
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// yükseklik ve genislik beilrleniyor
   $imgOut = imagecreatetruecolor($width, $height);
   imagecopyresampled($imgOut, $imgSrc,0, 0, 0, 0, imagesx($imgOut), imagesy($imgOut), imagesx($imgSrc), imagesy($imgSrc));
 	   
	switch (strtolower($ext)) 
	   		{
 		   	   case 'jpg' : @imagejpeg($imgOut,"$destination$filename",100);
    		                 break; 
		       case 'jpeg': @imagejpeg($imgOut,"$destination$filename",100);
    		                 break;
	    	   case 'gif' : @imagegif($imgOut,"$destination$filename",100);
    	    	             break;
							 
			  case 'png' : @imagepng($imgOut,"$destination$filename",100);
    	    	             break;
   			}

      @imagedestroy($imgOut);
      //imagedestroy($save);
 }		
//ThumbNail("banner2.gif","yeni");
//ThumbNail("test.jpg","yeni");
?>