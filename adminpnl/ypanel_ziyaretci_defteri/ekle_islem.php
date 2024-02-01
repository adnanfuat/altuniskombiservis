<? session_start();
$link_inherit="ekle_islem.php";
include("config.php");		  
if (isset($_SESSION['yonet']))
   {
   	    include($uzaklik."inc_s/baglanti.php");
		$n_ad=$_POST["ad"];
		$n_eposta=$_POST["eposta"];
		$n_telefon=$_POST["telefon"];
		$n_puan=$_POST["puan"];
		$n_dil=$_POST["dil"];
		if  (isset($_POST["mesaj"]) && strlen($_POST["mesaj"])<>0)
			{
				$n_mesaj=addslashes($_POST["mesaj"]); $n_hata[1]=0;
			}
		else
			{
				$n_mesaj=''; $n_hata[1]=1;
			}				
					
		if  ($n_hata[1]==1)
			{
				$err="eksik_veri"; 
			} 
		else 
			{ 
				include("ekle_sql.php");
			}	
		////////////////////////////////////// Geri Dönülecekse Onlari Ayarla.. (s)
		if  (isset($err))
			{
				$_SESSION[$tablo_ismi."n_ad"]=$n_ad; 
				$_SESSION[$tablo_ismi."n_eposta"]=$n_eposta;
				$_SESSION[$tablo_ismi."n_mesaj"]=$n_mesaj;
				$_SESSION[$tablo_ismi."n_telefon"]=$n_telefon;
				$_SESSION[$tablo_ismi."n_dil"]=$n_dil;
				$_SESSION[$tablo_ismi."n_puan"]=$n_puan;
				$_SESSION[$tablo_ismi."n_hata"]=$n_hata;		
				header("Location:ekle.php?err=$err"); 
			}
		else
			{
				unset($_SESSION[$tablo_ismi.'n_ad']);	
				unset($_SESSION[$tablo_ismi.'n_eposta']);
				unset($_SESSION[$tablo_ismi.'n_mesaj']);
				unset($_SESSION[$tablo_ismi.'n_telefon']);
				unset($_SESSION[$tablo_ismi.'n_puan']);
				unset($_SESSION[$tablo_ismi.'n_dil']);
				unset($_SESSION[$tablo_ismi.'n_hata']);
			} 
		////////////////////////////////////// Geri Dönülecekse Onlari Ayarla..	 (f)
?>
		<? include("yonlendir.php"); ?>
        <form name="formumuz">
        <input name="gizli" type="hidden" value="<? echo $donulecek_sayfa ?>">
        </form>
                <script>

                var sonuc=window.confirm("Yeni Bir Kayit Eklemek Istiyor musunuz?");
                if  (sonuc)
                    {
                        window.location="ekle.php";
                    }
                else
                    {
                        if  (document.all)
                            {
                                deger=document.formumuz.gizli.value;
                                window.location.href="kontrol.php?sayfa_no="+deger; 
                            }
                        else
                            {
                                window.location.href="kontrol.php";
                            }
                    }	

                </script>
<?
   } 
else 
   {
	   unset($_SESSION['yonet']);
	   include('error.php');
   }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadr.
?>
