<?php

get_header();


?>

<div class="container-fluid page_sec">

   <div class="slider_img">
   	<img src="<?=get_the_post_thumbnail_url()?>">
   </div>
	
    <div class="content">
    	<h2><?=the_title()?></h2>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();       
  the_content(); // displays whatever you wrote in the wordpress editor
  endwhile; endif; //ends the loop
 ?>
    </div>
	


</div>

<?php get_footer();?>