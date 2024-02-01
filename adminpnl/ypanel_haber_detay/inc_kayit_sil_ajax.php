<?
	include("config.php");
	include($uzaklik."inc_s/baglanti.php");
	if  (isset($_POST['hangi_tablo'])) { $hangi_tablo=$_POST['hangi_tablo']; }
	if  (isset($_POST['hangi_kayit'])) { $hangi_kayit=$_POST['hangi_kayit']; }
	if  (isset($_POST['hangi_resim_klasoru'])) { $hangi_resim_klasoru=$_POST['hangi_resim_klasoru']; }
	if  (isset($hangi_tablo) && $hangi_tablo<>'' && isset($hangi_kayit) && $hangi_kayit<>'')
		{
			$kayit_ogren="select * from $hangi_tablo where numara='$hangi_kayit'";
			$kayit_ogren=@$baglanti->query($kayit_ogren)->fetchAll(PDO::FETCH_ASSOC);
			$kayit=$kayit_ogren[0]["resim_adres"];
			$kayit_gecici_isim=$hangi_resim_klasoru.$kayit;
			if (file_exists($kayit_gecici_isim))  { @chmod($kayit_gecici_isim,0755); @unlink($kayit_gecici_isim); }
			$kayit_sil="Delete from $hangi_tablo where numara='$hangi_kayit'";
			//echo $kayit_sil; 
			if (@$baglanti->query($kayit_sil)->fetchAll(PDO::FETCH_ASSOC))
				{
					echo "1";
				}
			else
				{
					echo "0";
				}
		}
	
						
?>