<? session_start();
		unset($_SESSION['giris']);
		unset($_SESSION['yonet']);
?>
<html>
<head>
<title>...</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1254">
</head>

<body bgcolor="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="78%" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="8%">&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center">
        <p><font color="#FFFFFF" size="6" face="Trebuchet MS">Kullanıcı Modu: 
          <font color="#FF0000" size="14">+</font></font></p>
        <p><font color="#FFFFFF" size="6" face="Trebuchet MS">Yönetici Modu: <font color="#0033FF" size="14">-</font></font></p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      </div></td>
  </tr>
  <tr>
    <td height="10%">&nbsp;</td>
  </tr>
</table>
</body>
</html>


<script>

function yolla()

	{
		
		window.location="../index.php";
	
	}

	
	window.setTimeout("yolla();",2500);
		
</script>

