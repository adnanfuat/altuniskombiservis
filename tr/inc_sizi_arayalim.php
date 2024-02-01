<link rel="stylesheet" href="<? echo $seo_uzaklik; ?>_css/w3.css">
<? /* 
<div id="sizi_arayalim_buton">
<a  onclick="document.getElementById('id01').style.display='block'" >
<img src="<? echo $seo_uzaklik; ?>_img/sizi_arayalim.png" alt="Sizi Arayalım" width="100%" style="max-width:114px;" />
</a>
</div>
*/ ?>
<? /* proje modal s */ ?>
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content">
      <div class="w3-container"  style="border-bottom:#cacaca solid 10px; border-top:#cacaca solid 5px;">
        <span onclick="document.getElementById('id01').style.display='none';document.getElementById('form_sonuc').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <p>
        
        		<h2 style="color:#000000"><strong>BİZE ULAŞIN</strong> </h2>
                
                <?  
				if  (!isset($_POST["ad"]) && !isset($_POST["telefon"]) && !isset($_POST["eposta"])) 
                	{
            	?>           
           			<form action="" method="post" name="iletisim_form"  id="iletisim_form">
                    <div>   </div>
                    <div>&nbsp;</div>
                    
                    <div>
                        <div ><input name="ad" type="text" id="ad" class="form-control" placeholder="Adınız *" /></div>
                        <div ><input name="soyad" type="text" id="soyad" class="form-control" placeholder="Soyadınız *" /></div>
                        <div ><input name="eposta" type="text" id="eposta" class="form-control" placeholder="E-Posta Adresiniz *" /> </div>
                        <div ><input name="telefon" type="text" id="telefon" class="form-control" placeholder="Telefon Numaranız  *"  maxlength="11"/></div>
                        <? /* 
                        <div >
                       	<? 
							 $urunler=@$baglanti->query("Select * from urun_detay where aktif=1 order by puan asc")->fetchAll(PDO::FETCH_ASSOC);
							 $urunler_sayisi=count($urunler);
							 if  ($urunler_sayisi>0) { 
						?>
                             <select name="urun" id="urun" class="form-control">
                             <?  for ($sayac=0; $sayac<$urunler_sayisi; $sayac++)
							 		{ 
									  $urun_adi=$urunler[$sayac]['ad'];
									  $numara=$urunler[$sayac]['numara'];
							 ?>
                                        <option value="<? echo $urun_adi;//$numara; ?>"><? echo $urun_adi; ?></option>
                             <?  	}	 ?>
                             </select> 
                        <? } ?>
                        </div>
						*/ ?>
                        <input name="form_kontrol"  type="text" class="form_kontrol"> <style> .form_kontrol{ display:none; } </style>
                       <!-- <div>
                            <br />
                            <input name="kisiselveriler" id="kisiselveriler" type="checkbox" value="" />
                            <a onclick="document.getElementById('id02').style.display='block'" style="text-decoration:underline; color:#333333; cursor:pointer;"> KVKK aydınlatma metnini</a> okudum, onaylıyorum.
                            <br /><br />
						</div> -->
                        <div class="genis_flex_container"><button type="button" name="button" id="button" class="btn-small" onclick="gorusme_talep()" style="background-color:#464545">Gönder</button></div>
                        <!--<div>&nbsp;</div>
                        <div style="font-size:10px"> <strong>NOT:</strong> Lüften geçerli ve aktif olarak kullandığınız bir <strong>eposta</strong> adresi tercih edin. Gönderilen epostayı gelen kutunuzda göremiyorsanız <strong>SPAM, JUNK ya da gereksiz</strong> kutunuzu da <strong>kontrol edin</strong>. </div> -->
                    </div>
            		</form>
                <?
            		}
				?>

                
                <div id="form_sonuc" style="color:#000099; text-align:center; font-family: 'Poppins', sans-serif; "></div>
                <div>&nbsp;</div>
        
        </p>
      </div>
    </div>
  </div>
  
 <script>
    function gorusme_talep()
        {
                //alert ($("#maillist_form").serialize());
                if ($('#ad').val()=='') { alert ("Lütfen adınızı  girin");  $('#ad').focus(); } 
				else if ($('#soyad').val()=='') { alert ("Lütfen soyadınızı  girin");  $('#soyad').focus(); }
				else if ($('#eposta').val()=='') { alert ("Lütfen epostanızı  girin");  $('#eposta').focus(); }
				else if ($('#telefon').val()=='') { alert ("Lütfen telefonunuzu  girin");  $('#telefon').focus(); }
                //else if($("#kisiselveriler").prop('checked') == false){  alert ("Lütfen kişisel verilerin korunması politikasını onaylayın"); }
                else
                   {
                        str=$("#iletisim_form").serialize();
                        $.ajax({
                                type:"POST",
                                url: "<? echo $seo_uzaklik; ?>inc_ajax_formu_gonder.php",
                                dataType:"html",
                                data:str,
                                beforeSend: function() {
									  $('#form_sonuc').html("İşlem yapılıyor, lütfen bekleyin...");
									},
								success: function(data)
                                  {
                                    //alert (data);
                                    //if (data==0) { msj="<br />Bu e-posta adresi sistemde kayıtlı."; }
                                   /* */
									if (data==1) { msj="<br />Talebiniz başarı ile gönderildi."; }
                                    if (data==2) { msj="<br />Geçici bir problemden dolayı talebiniz iletilemedi! <br>	Lütfen daha sonra tekrar deneyiniz."; }
                                    if (data==3) { msj="<br />Lütfen gerekli alanları doldurunuz."; }
									//if (data!='') { msj=data; }
                                    $('#form_sonuc').html(msj);
                                    $('#iletisim_form')[0].reset(); 
                                  } 
                              });
                   
                   }
        }
 </script>
<? /* proje modal f */ ?>