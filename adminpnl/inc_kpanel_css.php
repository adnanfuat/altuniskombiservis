    <? 
		
		$sayfa_adi=basename($_SERVER['PHP_SELF']);
		if ($sayfa_adi=="anaframe.php" || $sayfa_adi=="anaframe2.php")
		   {
		   		$panel_uzaklik="";
		   }
		 else
		   {
		   		$panel_uzaklik="../";
		   }
		
	?>
    <!-- Fontfaces CSS-->
    <link href="<? echo $panel_uzaklik; ?>yeni_panel_assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="<? echo $panel_uzaklik; ?>yeni_panel_assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<? echo $panel_uzaklik; ?>yeni_panel_assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<? echo $panel_uzaklik; ?>yeni_panel_assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<? echo $panel_uzaklik; ?>yeni_panel_assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<? echo $panel_uzaklik; ?>yeni_panel_assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<? echo $panel_uzaklik; ?>yeni_panel_assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<? echo $panel_uzaklik; ?>yeni_panel_assets/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<? echo $panel_uzaklik; ?>yeni_panel_assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<? echo $panel_uzaklik; ?>yeni_panel_assets/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<? echo $panel_uzaklik; ?>yeni_panel_assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<? echo $panel_uzaklik; ?>yeni_panel_assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="<? echo $panel_uzaklik; ?>yeni_panel_assets/vendor/vector-map/jqvmap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<? echo $panel_uzaklik; ?>yeni_panel_assets/css/theme.css" rel="stylesheet" media="all">
