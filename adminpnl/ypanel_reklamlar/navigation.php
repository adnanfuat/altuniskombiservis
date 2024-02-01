<style> 
.sayfa_numara {color:#555; text-decoration:none; font-weight: normal; font-size: 11px; font-family:Tahoma; }
.sayfa_numara_secili {color:#555; text-decoration:none; font-weight: bold; font-size: 12px; font-family:Tahoma; }
.page { font: 10px Arial, Helvetica, sans-serif; padding-top: 10px; padding-bottom: 10px; margin: 1px; }
.page a{padding: 2px 6px; border: solid 0px #000000; background: #F2F0F0; color: #555; text-decoration: none;margin: 1px}
.page a:visited {padding: 2px 6px; border: solid 0px #000000; background: #F2F0F0; text-decoration: none;margin: 1px}
.page a:hover {border-color: #000000; text-decoration: none;background-color:#FFFFFF; color: #555;}
</style> 
<br />
<? 
$link=$link_inherit."?sayfa_no=";
if ($toplam_sayfa_sayisi>1) { $sayfala='<span class="page"><span class="sayfa_numara" >Toplam '. $toplam_sayfa_sayisi. ' sayfadan '.$sayfa_no.'. sayfa&nbsp;&nbsp;</span></span>';}
# Geri Linki Olucakmý?.. 
if  ($sayfa_no != 1)
    { 
	    $geri = $sayfa_no-1; 
		$geri = '<span class="page" ><a href="' . $link . $geri  . '" class="sayfa_numara" title="Önceki Sayfa"><</a></span>'."\n"; 
    }
# Ýlk Sayfa Linki Olucakmý?.. 
if  (($sayfa_no-5) >= 1) 
    { 
		 $ilksayfa = '<span class="page" ><a href="' . $link . '1' . '" class="sayfa_numara" title="ilk Sayfa">&laquo; ilk</a></span>'."\n"; 
    } 
# Onceki Sayfa1 Linki Olucakmý?.. 
if  (($sayfa_no-10)>1) 
	{ 
		$s=$sayfa_no-10;
		$oncekisayfa1 = '<span class="page" ><a href="' . $link . $s . '" class="sayfa_numara">'.$s ."</a></span>\n"; 
	}
# Onceki Sayfa2 Linki Olucakmý?.. 
if  (($sayfa_no-50)>1) 
	{ 
		$s=$sayfa_no-50;
		$oncekisayfa2 = '<span class="page" ><a href="' . $link . $s . '" class="sayfa_numara">'.$s ."</a></span>\n"; 
	}
# Onceki Sayfa3 Linki Olucakmý?.. 
if  (($sayfa_no-100)>1) 
	{ 
		$s=$sayfa_no-100;
		$oncekisayfa3 = '<span class="page" ><a href="' . $link . $s . '" class="sayfa_numara">'.$s ."</a></span>\n"; 
	}
# Sonraki Sayfa1 Linki Olucakmý?.. 
if  (($sayfa_no+10)<$toplam_sayfa_sayisi) 
	{ 
		$s=$sayfa_no+10;
		$sonrakisayfa1 = '<span class="page" ><a href="' . $link . $s . '" class="sayfa_numara">'.$s ."</a></span>\n"; 
	}
# Sonraki Sayfa2 Linki Olucakmý?.. 
if  (($sayfa_no+50)<$toplam_sayfa_sayisi) 
	{ 
		$s=$sayfa_no+50;
		$sonrakisayfa2 = '<span class="page" ><a href="' . $link . $s . '" class="sayfa_numara">'.$s ."</a></span>\n"; 
	} 
# Sonraki Sayfa3 Linki Olucakmý?.. 
if  (($sayfa_no+100)<$toplam_sayfa_sayisi) 
	{ 
		$s=$sayfa_no+100;
		$sonrakisayfa3 = '<span class="page" ><a href="' . $link . $s . '" class="sayfa_numara">'.$s ."</a></span>\n"; 
	}
# Ýleri Linki Olucakmý?.. 
if  ($toplam_sayfa_sayisi > $sayfa_no) 
	{ 
		 $ileri = $sayfa_no+1; 
		 $ileri = '<span class="page" ><a href="' . $link . $ileri . '" class="sayfa_numara" title="Sonraki Sayfa">></a></span>'."\n"; 
	} 
# En Son Linki Olucakmý?.. 
if  (($toplam_sayfa_sayisi-$sayfa_no)>= 5) 
	{ 
		 $enson = '<span class="page" ><a href="' . $link . $toplam_sayfa_sayisi . '" class="sayfa_numara" title="Son Sayfa">Son &raquo;</a></span>'."\n"; 
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
	{ //print "x";
		 $bitir = $sayfa_no+4; 
	} 
else 
	{ 
		 $bitir = $sayfa_no+($toplam_sayfa_sayisi - $sayfa_no); //print "y"; 
	} 
//print $bitir;
# Donguye Gir ve Sayfa Lýnklerýný Bas 
$sayfala .= $ilksayfa.$geri.$oncekisayfa3.$oncekisayfa2.$oncekisayfa1; 
if (isset($oncekisayfa1) && $oncekisayfa1<>'') { $sayfala=$sayfala."... "; }
for ($i = $basla; $i <= $bitir; $i++) 
	{  //print "aaa";
		 if ($sayfa_no == $i) 
			{ 	$x=$i+1; 
				$sayfala .= '<a href="#" class="sayfa_numara_secili">' . $i . '</a>'."\n"; 
			} 
		else 
			{ 	$x=$i+1; 
				$sayfala .= '<span class="page" ><a href="' . $link . $i . '" class="sayfa_numara">' . $i . '</a></span>'."\n"; 
			} 	
	}                                                       
if  (isset($sonrakisayfa1) && $sonrakisayfa1<>'') 
	{ 
		$sayfala .='<span class="sayfa_numara"> ... </span>'.$sonrakisayfa1.$sonrakisayfa2.$sonrakisayfa3.$ileri.$enson; 
	}
else
	{
		$sayfala .=  $sonrakisayfa1.$sonrakisayfa2.$sonrakisayfa3.$ileri.$enson; 
	}
# Son kontroller 
if  ($toplam_sayfa_sayisi > 1)
	{ 
		 $ileti = 'Toplam '.$toplam_sayfa_sayisi.' sayfadan '.$sayfa_no.'.sayfa'; 
	} 
else 
	{ 
		 $ileti   = 'Kayit bulunamadý...'; 
		 $sayfala = ''; 
	} 
if  ($sayfa_no > $toplam_sayfa_sayisi) {  $sayfala = '<span class="page" ><a href="' . $link . '1' . '" class="sayfa_numara">« ilksayfa</a></span>'."\n";  } 
?>
<? echo $sayfala; ?><br />&nbsp;