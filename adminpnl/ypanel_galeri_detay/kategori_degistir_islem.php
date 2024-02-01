<?  session_start();
$link_inherit="kategori_degistir_islem.php";
include("config.php");	
if (isset($_SESSION['yonet']))
   {
		include($uzaklik."inc_s/baglanti.php");
		$altkategori_no=$_SESSION['alt_kategori'];
		if  (isset($_POST['menu_ust_kategori']))
			{
				$yeni_ust_kategori_no=$_POST['menu_ust_kategori'];
			}
		if  (isset($_POST["menu_alt_kategori"]))
			{
				$yeni_alt_kategori_no=$_POST["menu_alt_kategori"];
			}
		$sql="Select numara from  $tablo_ismi where altkategori_no=$altkategori_no";
		$recordset=@$baglanti->query($sql)->fetchAll(PDO::FETCH_ASSOC);
		$kayit_sayisi=count($recordset);
		////******************************************************************************************************************
		if  (isset($_POST["guncelle"]))
			{
				if  (isset($_SESSION['tasi_ekart']))
					{
						$ekartlar=$_SESSION['tasi_ekart'];
						for ($sayac=0; $sayac<$kayit_sayisi; $sayac++)
							{
								$ekart_no=$recordset[$sayac]["numara"];
								if   (isset($ekartlar[$ekart_no]))   
									 {
										$ekart_guncelle="Update $tablo_ismi set ustkategori_no=$yeni_ust_kategori_no, altkategori_no=$yeni_alt_kategori_no where numara=$ekart_no";
										@$baglanti->query($ekart_guncelle)->fetchAll(PDO::FETCH_ASSOC);	
								     }
							}
					}
				$ust=$_POST['menu_ust_kategori'];
				$alt=$_POST["menu_alt_kategori"]; 
		  	    if  (isset($_SESSION["menu_ust_kategori"])) 
			 		{ 
						$ust=$_SESSION['menu_ust_kategori']; 
						unset($_SESSION["menu_ust_kategori"]);
						$alt=$_POST["menu_alt_kategori"]; 
					}
				header("Location:kontrol.php?alt_kategori=$alt&ust_kategori=$ust"); print "aaa";
			}
		////******************************************************************************************************************
		if (isset($_POST["menu_ust_kategori"]))
			{
				if (isset($_SESSION["menu_ust_kategori"])) { unset($_SESSION["menu_ust_kategori"]); }
				$_SESSION["menu_ust_kategori"]=$_POST["menu_ust_kategori"];
				$menu_ust_kategori=$_POST["menu_ust_kategori"];
				$altsektor=@$baglanti->query("Select numara from  $altkategori_tablo_adi where ustkategori_no=$menu_ust_kategori")->fetchAll(PDO::FETCH_ASSOC);
				$_SESSION["menu_alt_kategori"]=$altsektor[0]["numara"];
				header("Location:kategori_degistir.php");
			}
		////******************************************************************************************************************
	}
else 
	{
		  unset($_SESSION['yonet']);
		  include("error.php");
	}  //  (f)izinsiz girisleri engellemek için  kullanilmaktadir.
?>