<? session_start();


//		^ *		^ *		^ *		^ *		^ *		^ *		^ *		^ *		^ *		^ *		^ *		^ *
/*
			
				Bu sayfa ne ise yarar ?..
				Bu sayfa session degerinde tutulan firma bilgisini bosaltmaya yarar..
				yonlendirme yapar..						
			
			*/
//		^ *		^ *		^ *		^ *		^ *		^ *		^ *		^ *		^ *		^ *		^ *		^ *
session_unset();
Header("Location:../yonetici_girisi.php");															
?>