<?
function permalink_duzenle($string)
  {
	  $turkce=array("þ","Þ","ý","(",")","'","ü","Ü","ö","Ö","ç","Ç"," ","/","*","?","þ","þ","i","ð","Ð","Ý","ö","Ö","Ç","ç","þ","Þ");
	  $duzgun=array("s","S","i","","","","u","U","o","O","c","C","-","-","-","","s","S","i","g","G","I","o","O","C","c","s","S");
	  $string = mb_convert_encoding($string, "HTML-ENTITIES", "UTF-8"); 
	  $string=strtolower(str_replace($turkce,$duzgun,html_entity_decode($string)));
	  //$string = preg_replace("@[^A-Za-z0-9\-_]+@i","",$string);
	  //UTF-8'e adaptasyon için 6. satir eklendi, 7. satirda duzenleme yapildi (html_entity_decode() fonksiyonu eklendi), ve 8. satirdaki kod kapatildi. 
	  $string = trim($string); 
	  $string = preg_replace('/(\s\s+)/', ' ', trim($string)); 
	  $string = str_replace(" ","-",$string);
	  $string = str_replace("\"","",$string);
	  $string = str_replace(",","",$string);
	  $string = str_replace(":","",$string);
	  $string = str_replace("'","",$string);
	  return $string;
  }
function permalink_daralt($string,$ks)
  {
	if  (strlen($string)>$ks)
		{
			$bosluk_sayi=substr_count($string,' ');
			if  ($bosluk_sayi>0)
				{
					$b=0;
					for ($s=0; $s<$bosluk_sayi; $s++)
						{
							$yb=strpos($string," ",$b);
							if  ($yb>$ks)
								{	
									$limit=$b; break;
								}
							else
								{
									$b=$yb+1; $limit=$b;
								}
						}
				}
			$string=substr($string,0,$limit-1);
		}
	 return $string;
  }  
?>