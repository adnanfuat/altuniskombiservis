<?
	include("config.php");
	include($uzaklik."inc_s/baglanti.php");
	if  (isset($_POST['hangi_tablo'])) { $hangi_tablo=$_POST['hangi_tablo']; }
	if  (isset($_POST['hangi_kayit'])) { $hangi_kayit=$_POST['hangi_kayit']; }
	if  (isset($_POST['aktif'])) { $aktif=$_POST['aktif']; }
	if  (isset($hangi_tablo) && $hangi_tablo<>'' && isset($hangi_kayit) && $hangi_kayit<>'')
		{
			if ($aktif==1)
			   {
					$update="Update $tablo_ismi  Set  aktif=1 where numara=$hangi_kayit";
					@$baglanti->query($update)->fetchAll(PDO::FETCH_ASSOC);
				}
			else if($aktif==0)
				{
					$update="Update $tablo_ismi  Set  aktif=0 where numara=$hangi_kayit";
					@$baglanti->query($update)->fetchAll(PDO::FETCH_ASSOC);
				}	
		}
	
						
?>