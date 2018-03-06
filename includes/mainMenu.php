<?php
function active($current_page){
  $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
  $url = end($url_array);
  if($current_page == $url){
      //class name in css
      echo 'active';
  }
}
?>
<header>
  <section id="title">
    <!--- titre du site ici --->
    <img src="img/logo2.png" alt="logo" />
  </section>
  <section id="topmenu">
      <!--- Menu ici --->
      <div class="scrollmenu">
          <a class="<?php active('index.php');?> fa fa-home fa-3x" href="index.php"></a>
          <a class="<?php active('CV_Menu.php');?> fa fa-book fa-3x" href="CV_Menu.php"></a>
          <a class="<?php active('Userpage.php');?> fa fa-user-circle fa-3x" href="Userpage.php"></a>
          <?php if (isset($_SESSION['prenom'])): ?>
          <a class="<?php active('Modif.php');?> fa fa-edit fa-3x" href="#"></a>
          <?php endif; ?>
      </div>
  </section>
</header>
