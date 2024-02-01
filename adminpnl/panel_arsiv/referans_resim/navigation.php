<style> 
.sayfa_numara {color:#310a6d; text-decoration:none;  font-size: 11px; font-family:Tahoma; }
.sayfa_numara_secili {color:#eb3a00; text-decoration:none;  font-size: 11px; font-family:Tahoma; }
</style> 
<br />
<? 
$link=$link_inherit."?sayfa_no=";
if ($toplam_sayfa_sayisi>1) { $sayfala='<span class="sayfa_numara" >Toplam '. $toplam_sayfa_sayisi. ' sayfadan '.$sayfa_no.'. sayfa&nbsp;&nbsp;</span>';}
# Geri Linki Olucakmý?.. 
if  ($sayfa_no != 1)
	{ 
		 $geri = $sayfa_no-1; 
		$geri = '<a href="' . $link . $geri  . '" class="sayfa_numara" title="Önceki Sayfa"><</a>'."\n"; 
	} 
# Ýlk Sayfa Linki Olucakmý?.. 
if  (($sayfa_no-5) >= 1) 
	{ 
		 $ilksayfa = '<a href="' . $link . '1' . '" class="sayfa_numara" title="Ýlk Sayfa">« Ýlk</a> '."\n"; 
	} 
# Onceki Sayfa1 Linki Olucakmý?.. 
if  (($sayfa_no-10)>1) 
	{ 
		$s=$sayfa_no-10;
	    $oncekisayfa1 = '<a href="' . $link . $s . '" class="sayfa_numara">'.$s ."</a>\n"; 
	} 
# Onceki Sayfa2 Linki Olucakmý?.. 
if  (($sayfa_no-50)>1) 
	{ 
		$s=$sayfa_no-50;
		 $oncekisayfa2 = '<a href="' . $link . $s . '" class="sayfa_numara">'.$s ."</a>\n"; 
	} 
# Onceki Sayfa3 Linki Olucakmý?.. 
if  (($sayfa_no-100)>1) 
	{ 
		$s=$sayfa_no-100;
		 $oncekisayfa3 = '<a href="' . $link . $s . '" class="sayfa_numara">'.$s ."</a>\n"; 
	} 
# Sonraki Sayfa1 Linki Olucakmý?.. 
if  (($sayfa_no+10)<$toplam_sayfa_sayisi) 
	{ 
		$s=$sayfa_no+10;
		 $sonrakisayfa1 = '<a href="' . $link . $s . '" class="sayfa_numara">'.$s ."</a>\n"; 
	} 
# Sonraki Sayfa2 Linki Olucakmý?.. 
if  (($sayfa_no+50)<$toplam_sayfa_sayisi) 
	{ 
		$s=$sayfa_no+50;
		$sonrakisayfa2 = '<a href="' . $link . $s . '" class="sayfa_numara">'.$s ."</a>\n"; 
	} 
# Sonraki Sayfa3 Linki Olucakmý?.. 
if  (($sayfa_no+100)<$toplam_sayfa_sayisi) 
	{ 
		$s=$sayfa_no+100;
		$sonrakisayfa3 = '<a href="' . $link . $s . '" class="sayfa_numara">'.$s ."</a>\n"; 
	} 
# Ýleri Linki Olucakmý?.. 
if  ($toplam_sayfa_sayisi > $sayfa_no) 
	{ 
		 $ileri = $sayfa_no+1; 
		 $ileri = '<a href="' . $link . $ileri . '" class="sayfa_numara" title="Sonraki Sayfa">></a>'."\n"; 
	} 
# En Son Linki Olucakmý?.. 
if  (($toplam_sayfa_sayisi-$sayfa_no)>= 5) 
	{ 
		 $enson = '<a href="' . $link . $toplam_sayfa_sayisi . '" class="sayfa_numara" title="Son Sayfa">Son »</a>'."\n"; 
	} 
# Dongu Kactan Baslasýn 
if  ($sayfa_no >= 5)
	{ 
		 $basla = $sayfa_no-4; 
	} 
else 
	{ 
		 $basla = 1; 
	} 
# Dongu Kacta Býtsýn 
if  (($toplam_sayfa_sayisi - $sayfa_no) >= 5)
	{
		 $bitir = $sayfa_no+4; 
	} 
else 
	{ 
	    $bitir = $sayfa_no+($toplam_sayfa_sayisi - $sayfa_no);
	} 
//print $bitir;
# Donguye Gir ve Sayfa Lýnklerýný Bas 
$sayfala .= $ilksayfa.$geri.$oncekisayfa3.$oncekisayfa2.$oncekisayfa1; 
if (isset($oncekisayfa1) && $oncekisayfa1<>'') { $sayfala=$sayfala."... "; }
for ($i = $basla; $i <= $bitir; $i++) 
	{  //print "aaa";
		 if ($sayfa_no == $i) 
			{ 	$x=$i+1; 
				$sayfala .= '<a href="#" class="sayfa_numara_secili"> [' . $i . '] </a>'."\n"; 
			} 
		else 
			{ 	$x=$i+1; 
				$sayfala .= '<a href="' . $link . $i . '" class="sayfa_numara">' . $i . '</a>'."\n"; 
			} 	
	}                                                       
if (isset($sonrakisayfa1) && $sonrakisayfa1<>'') 
	{ 
		$sayfala .='<span class="sayfa_numara"> ... </span>'.$sonrakisayfa1.$sonrakisayfa2.$sonrakisayfa3.$ileri.$enson; 
	}
else
	{
		$sayfala .=  $sonrakisayfa1.$sonrakisayfa2.$sonrakisayfa3.$ileri.$enson; 
	}
 if($toplam_sayfa_sayisi > 1)
	{ 
		 $ileti = 'Toplam '.$toplam_sayfa_sayisi.' sayfadan '.$sayfa_no.'.sayfa'; 
	} 
else 
	{ 
		 $ileti   = 'Kayýt bulunamadý...'; 
		 $sayfala = ''; 
	 } 
if($sayfa_no > $toplam_sayfa_sayisi) { $sayfala = '<a href="' . $link . '1' . '" class="sayfa_numara">« ilksayfa</a>'."\n"; } 
?>
<? echo $sayfala; ?>