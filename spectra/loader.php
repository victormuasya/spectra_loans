
<div class="loader" id="loader"></div>
  <style>
    .no-js#loader{display:none;}
    .js#loader{display:block;position:absolute;left:100px;top:0;}
    .loader{
      position:fixed;
      left:0px;
      top:0px;
      width:100%;
      height:100%;
      z-index:9999;
      background:url(load.gif) center no-repeat#fff;
    }
  </style>
  <script>
    $(window).load(function() { $(".loader").fadeOut("slow");;});
  </script>

  <script>
    var preloader = document.getElementById('loader');
    function preLoaderHandler(){
        preloader.style.display = 'none';
    }


    
var loader;

function loadNow(opacity) {
    if (opacity <= 0) {
        displayContent();
    } else {
        loader.style.opacity = opacity;
        window.setTimeout(function() {
            loadNow(opacity - 0.08);
        }, 50);
    }
}

function displayContent() {
    loader.style.display = 'none';
    document.getElementById('content').style.display = 'block';
}

document.addEventListener("DOMContentLoaded", function() {
    loader = document.getElementById('loader');
    loadNow(1);
});
  </script>
 