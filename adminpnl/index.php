<?	session_start();
	if (isset($_SESSION['yonet'])) //  (s)izinsiz girisleri engellemek iin  kullanilmaktadir.
	   {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
<!--
a
{

text-decoration:none; 
color:#FFFFFF ;
}

body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	/*background-color: #d24400;*/
}
.style2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: bold;
	color: #FFFFFF;
}
.table
	{
	background: rgba(253,95,20,1);
background: -moz-linear-gradient(top, rgba(253,95,20,1) 0%, rgba(210,68,0,1) 100%);
background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(253,95,20,1)), color-stop(100%, rgba(210,68,0,1)));
background: -webkit-linear-gradient(top, rgba(253,95,20,1) 0%, rgba(210,68,0,1) 100%);
background: -o-linear-gradient(top, rgba(253,95,20,1) 0%, rgba(210,68,0,1) 100%);
background: -ms-linear-gradient(top, rgba(253,95,20,1) 0%, rgba(210,68,0,1) 100%);
background: linear-gradient(to bottom, rgba(253,95,20,1) 0%, rgba(210,68,0,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fd5f14', endColorstr='#d24400', GradientType=0 );
	}
</style>
</head>
<body>
<table width="100%"  border="0" class="table">
  <tr>
    <td align="center" valign="middle" height="35">
        <div align="center">
        	<span class="style2"><a href="anaframe.php" target="mainFrame" style="text-decoration:none; color:#FFFFFF">Kontrol Paneli</a>  </span>
            <? /*  <span class="style2"><a href="galeri_kategori/kontrol.php" target="mainFrame" style="text-decoration:none; color:#FFFFFF">Galeri</a> | </span>
            <span class="style2"><a href="reklamlar/kontrol.php" target="mainFrame" style="text-decoration:none; color:#FFFFFF">Manşet</a> | </span>
            <span class="style2"><a href="hizmet_kategori/kontrol.php" target="mainFrame" style="text-decoration:none; color:#FFFFFF">Hizmetler</a> | </span>
            <span class="style2"><a href="haberler/kontrol.php" target="mainFrame" style="text-decoration:none; color:#FFFFFF">Haberler</a> | </span>
            
           <span class="style2"><a href="kategorisiz_video/kontrol.php" target="mainFrame" style="text-decoration:none; color:#FFFFFF">Videolar</a> | </span>
		   	<span class="style2"><a href="kampanyalar/kontrol.php" target="mainFrame" style="text-decoration:none; color:#FFFFFF">Kampanyalar</a> | </span>
            <span class="style2"><a href="hizmet_kategori/kontrol.php" target="mainFrame" style="text-decoration:none; color:#FFFFFF">Hizmetler</a> | </span>*/ ?>
		    
            <? /*<span class="style2"><a href="kategorisiz_referanslar/kontrol.php" target="mainFrame" style="text-decoration:none; color:#FFFFFF">Markalar / Referanslar</a></span>   */ ?>
        </div>
    </td>
  </tr>
</table>
</body>
</html>
<?
   }
else
   {
		unset($_SESSION['yonet']);
		header("Location:../error/err3.php");
   }
?>