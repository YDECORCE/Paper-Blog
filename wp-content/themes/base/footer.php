</div>
<?php wp_footer(); ?>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script>
    document.getElementById('sidebarCollapse').addEventListener('click', function() {
    document.getElementById('sidebar').classList.toggle('active');
    document.getElementById('content').classList.toggle('active');
  })
  function lign(){
  var workcontainerwidth=document.getElementById("worksection").offsetWidth
  var workwidth=document.getElementById("work").offsetWidth
  var worklignwidth=Math.floor(workcontainerwidth-1.1*workwidth)+'px';
   document.documentElement.style.setProperty('--after-lign-work-width', worklignwidth);

   var aboutcontainerwidth=document.getElementById("aboutsection").offsetWidth
  var aboutwidth=document.getElementById("about").offsetWidth
  var aboutlignwidth=Math.floor(aboutcontainerwidth-1.1*aboutwidth)+'px';
   document.documentElement.style.setProperty('--after-lign-about-width', aboutlignwidth);

   var designcontainerwidth=document.getElementById("designsection").offsetWidth
  var designwidth=document.getElementById("design").offsetWidth
  var designlignwidth=Math.floor(designcontainerwidth-1.1*designwidth)+'px';
   document.documentElement.style.setProperty('--after-lign-design-width', designlignwidth);
  }
  window.setInterval(lign,100);
</script>  
</html>