<? session_start();

/**
 * Jcrop image cropping plugin for jQuery
 * Example cropping script
 * @copyright 2008-2009 Kelly Hallman
 * More info: http://deepliquid.com/content/Jcrop_Implementation_Theory.html
**/
	//include("config.php");
	$uzaklik="../../";
	include($uzaklik."inc_s/baglanti.php");
	//$syonetim=$_SESSION["siteyonetici"];
	if  (isset($_GET["kat"]) && $_GET["kat"]>1) //Eger crop sayfasina bu deger geldiyse bu deger resmin orjinal boyutunda eklenen yerlerde resmi belli bir boyutta sınırlandırmak için kullanılır.
		{
			$carpan=$_GET["kat"];
		}
	else
		{
			$carpan=1;	 //Eger deger gelmediyse de parametreler tablosundan çekilen genişlik ve yükseklik degerleri 1 ile carpilir.
		}
	$get_dir = $_GET["dir"]; // resmin bulundugu, rsmlr klasorunde yer alan resim dizinin adi
	$targ_w=$_GET["w"]; // Yeni olusturulacak resmin genisligi
	$targ_h=$_GET["h"]; // Yeni olusturulacak resmin yuksekligi
	//print_r($_GET);
	$filename=$_GET["file"]; // Boyutlandirilacak dosyanin adi
	$dir=$uzaklik."rsmlr/".$get_dir."/";
	$ratio=$targ_w/$targ_h;
	$ratio=number_format($ratio,2);
	$src = $dir.$filename;
	//echo $targ_w;
	// If not a POST request, display page below:
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Resim Boyutlandırma</title>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
  <script src="<? echo $uzaklik; ?>_js/jquery-1.10.2.min.js"></script>
  <script src="<? echo $uzaklik; ?>_js/jquery.Jcrop.js"></script>
  <link rel="stylesheet" href="main.css" type="text/css"/>
  <link rel="stylesheet" href="jquery.Jcrop.css" type="text/css"/>
  <script type="text/javascript">
  $(function(){
    $('#cropbox').Jcrop({
      aspectRatio: <? echo $ratio; ?>,
      onSelect: updateCoords,
	  bgColor: 'transparent',
	  bgOpacity: .2,
	  shadeColor:'red',
	  borderOpacity:1,
	  onDblClick: formgonder
    });
  });
  function updateCoords(c)
  {
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
  }
  function checkCoords()
  {
    if  (parseInt($('#w').val())) 
		{
			document.form1.submit();
		}
	else
		{
		    alert('Lütfen önce keseceğiniz bölümü seçiniz.');
		}
  }
function formgonder() { if (confirm('Resmi seçili bölüme küçültmek istediğinizden emin misiniz?\r\n\r\nBu işlemin geri dönüşü yoktur!!!')) { return checkCoords(); } }
</script>
</head>
<body>
<? $logo=@getimagesize($src); $yukseklik=$logo[1]; $genislik=$logo[0]; ?>
		<br>
		<!-- This is the image we're attaching Jcrop to -->
        <table  style="border-color:#d1d1d1; border-width:1px; border-style:solid;">
        <tr><td><img src="<? echo $src; ?>?img=<?php echo filemtime($src)?>" id="cropbox" width="<? echo $genislik; ?>" height="<? echo $yukseklik; ?>"/></td></tr>
        </table>
		<!-- This is the form that our event handler fills -->
		<form action="crop.php" method="post" id="form1" name="form1" >
        <input type="hidden" id="x" name="x" /> <? // Kesilecek orjinal resmin, kesme islemi icin kullanilacak olan baslangic noktasinin x koordinati ?>
        <input type="hidden" id="y" name="y" /> <? // Kesilecek orjinal resmin, kesme islemi icin kullanilacak olan baslangic noktasinin y koordinati ?>
        <input type="hidden" id="w" name="w" /> <? // Kesilecek orjinal resimde kesme için kullanilacak bolumun genislik degeri ?>
        <input type="hidden" id="h" name="h" /> <? // Kesilecek orjinal resimde kesme için kullanilacak bolumun yukseklik degeri ?>
        <input type="hidden" id="dir" name="dir"  value="<? echo $get_dir; ?>"/>  <? // Kesilecek resmin alinacagi rsmlr klasorundeki klasorun adi ?>
        <input type="hidden" id="targ_w" name="targ_w"  value="<? echo $targ_w; ?>"/>  <? // Kesilen resmin kac px genisliginde olacagini belirleyen parametreler tablosundaki alanin adi ?>
        <input type="hidden" id="targ_h" name="targ_h" value="<? echo $targ_h; ?>" />  <? // Kesilen resmin kac px yuksekliginde olacagini belirleyen parametreler tablosundaki alanin adi ?>
        <input type="hidden" id="kat" name="kat" value="<? echo $carpan; ?>" />  <? // carpan degeri ?>
        <input type="hidden" id="file" name="file" value="<? echo $filename; ?>" />  <? // Kesilecek resmin adi ?>
        <input type="button" value="Resmi Küçült" class="btn btn-large btn-inverse"  onclick="javascript:if (confirm('Resmi seçili bölüme küçültmek istediğinizden emin misiniz?\r\n\r\nBu işlemin geri dönüşü yoktur!!!')) { return checkCoords(); }" />
		</form>
        <? 	$targ_w=$targ_w*$carpan;  // Yeni olusturulacak resmin genisligi
	$targ_h=$targ_h*$carpan; // Yeni olusturulacak resmin yuksekligi
 ?>
        <br>
        <span style="font-family:verdana;font-size:11px;color:#333333;">Sistemde yüklü olan resminizin ebatları <strong style="color:#cc0000;"><? echo $genislik; ?>px*<? echo $yukseklik; ?>px</strong>'dir. Resim, ölçeklendirme işlemi (crop) sonunda seçili alandan <strong style="color:#004400;"><? echo $targ_w; ?>px*<? echo $targ_h; ?>px</strong> ebatlarında yeniden oluşturulacaktır. Bu işlemin geri dönüşü yoktur.</span>
        <br><span style="font-family:verdana;font-size:11px;color:#333333;">Resmin seçili bölümünü almak için <strong>Resmi Küçült</strong> butonuna ya da  seçili bölgenin üzerine <strong>çift tıklayın</strong>.</span>
        <br>
       <!-- <span style="font-family:verdana;font-size:11px;color:#333333;">Boyutlandırma penceresinden çıkmak için <strong>KAPAT</strong> linkine tıklayabilir veya <strong>ESC</strong> tuşuna basabilirsiniz.</span> -->
	</body>
</html>