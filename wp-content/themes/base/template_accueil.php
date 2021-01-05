<?php /* Template Name: page d'accueil */ ?>

<?php get_header(); ?>


<div class="container">

  <div class="row">
  <div class="title_section" id="worksection">
      <h2 id="work">latest <span>work</span></h2>
      <div class="work_img">
        <?php $values=get_field("project");
        
        for($i=0; $i<count($values);$i++){
          echo "<div class='col-12 col-sm-3 mb-5'>";
          echo "<img src='".$values[$i]['project_picture']['url']."' alt='image' class='imgsizing'>";
          echo "</div>";
        }
        ?>
      </div>
    </div>
    <div class="title_section" id="aboutsection">
      <h2 id="about">about <span>paper</span></h2>
      <div class="aboutsect">
        <?php echo get_field("about");?>
      </div>
      <?php $slider = get_field("slider_element");
      ?>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
<?php

for ($i=1; $i < count($slider) ; $i++) { 
    echo '<li data-target="#carouselExampleIndicators" data-slide-to="'.$i.'"></li>';
    }
?>
</ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?=$slider[0]["element_picture"]["url"]?>" alt="First slide">
    </div>
    <?php

for ($i=1; $i < count($slider) ; $i++) { 
    echo '<div class="carousel-item">
    <img class="d-block w-100" src="'.$slider[$i]["element_picture"]["url"].'" alt="Second slide">
  </div>';
    }
?>
</div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    </div>
    <div class="title_section" id="designsection">
      <h2 id="design">this is an <span>awesome design</span></h2>
      <div class="designsect">
        <?php echo get_field("awesome_design");?>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>



