<? 
if (isset($_POST["gizli"]))
  {
		$aranacak_kayit_no=$_POST["gizli"];
  }
else
  {
		$sql_cumlesi="select max(numara) from $tablo_ismi";
		$calistir_sql=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);	
		$aranacak_kayit_no=$calistir_sql[0]["max(numara)"];
  }		
include($uzaklik."inc_s/sayfalama.php");
$sql_cumlesi="select numara from $tablo_ismi where kategori=$kategori";
$calistir_sql=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);
$toplam_kayit_sayisi_calistir_sql=count($calistir_sql);
sayfala($toplam_kayit_sayisi_calistir_sql,$bir_sayfadaki_toplam_kayit_sayisi);
for ($sayfa_no=1; $sayfa_no<=$toplam_sayfa_sayisi;$sayfa_no++)
	{
		$limit_ilk_deger=($sayfa_no-1)*$bir_sayfadaki_toplam_kayit_sayisi;
	    $sql_cumlesi="select * from $tablo_ismi where kategori=$kategori order by siralama asc limit $limit_ilk_deger,$bir_sayfadaki_toplam_kayit_sayisi";
	    $recordset=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);
   	    $toplam_kayit_sayisi=count($recordset);
 		for ($j=0;$j<$toplam_kayit_sayisi; $j++)
			{ 
				  if ($aranacak_kayit_no==$recordset[$j]['numara'])
		  			 {
						  $donulecek_sayfa=$sayfa_no; break;
					 }
			}
	}
?>