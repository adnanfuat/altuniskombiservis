<?  session_start();
$link_inherit="kategori_degistir_islem.php";
include("config.php");	
if (isset($_SESSION['yonet']))
   {
		include($uzaklik."inc_s/baglanti.php");
		$kategori=$_SESSION['kategori'];
		$yeni_ust_kategori_no=$_POST["menu_kategori"];
		$sql="Select ad,numara from  $tablo_ismi where kategori=$kategori";
		$recordset=@$baglanti->query($sql)->fetchAll(PDO::FETCH_ASSOC);
		$kayit_sayisi=count($recordset);
		if  (isset($_POST["guncelle"]))
			{
				if (isset($_SESSION[$tablo_ismi.'tasi_altkategori']))
				   {
						$altkategori=$_SESSION[$tablo_ismi.'tasi_altkategori'];
						for ($sayac=0; $sayac<$kayit_sayisi; $sayac++)
							{
								$altkategori_no=$recordset[$sayac]["numara"];
								if  (isset($altkategori[$altkategori_no]))   
								    {
										$alt_kategori_guncelle="Update $tablo_ismi set kategori=$yeni_ust_kategori_no where numara=$altkategori_no";
										@$baglanti->query($alt_kategori_guncelle)->fetchAll(PDO::FETCH_ASSOC);	
										//include("icerik_guncelle.php");
								   }
							}
				  }
		    }
	     header("Location:kontrol.php");
  }
else 
  {
	  unset($_SESSION['yonet']);
	  include("error.php");
  }
?>