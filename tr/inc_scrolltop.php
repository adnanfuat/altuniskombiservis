<style>
html {  scroll-behavior: smooth; }
#myBtn {
  display: none;
  position: fixed;
  bottom: 100px;
  right: 2%;
  z-index: 99;
  font-size: 20px;
  border: none;
  outline: none;
  /*background-color: red;*//* */
  background-color: rgba(255,255,255,0.5);
  color: #3498db;
  cursor: pointer;
  padding: 10px;
  border-radius: 50%;
  transition: all 0.5s ease;

}

#myBtn:hover {
	background-color: rgba(255,255,255,1);
	color: #3498db;
}
</style>

<div onclick="topFunction()" id="myBtn" title="Yukarı Çık">
<i class="fa fa-chevron-up" ></i>
</div>


<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>