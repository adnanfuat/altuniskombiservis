<? 
$item_resim=$resim;
$item_dizini=$thumb_resim_dizini;
if ($item_resim<>'') 
	{
		$dosya_gecici_isim=$item_dizini.$item_resim;
		if (file_exists($dosya_gecici_isim)) 
			{
	  	       @chmod($dosya_gecici_isim,0755);  @unlink($dosya_gecici_isim);
			}
	}
?>