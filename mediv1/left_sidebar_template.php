<?php
/*
Template Name: Left Sidebar Template
*/
?>
<?php get_header();?>
<!-- single -->
	<div class="single">
		<div class="container">

			<div class="col-md-4">
				<div class="left_sidebar">
					<?php get_sidebar('left');?>
				</div>
			</div>

			<div class="col-md-8 single-left">
				<?php if ( have_posts() ) : ?>
								<?php while ( have_posts() ) : the_post(); ?>
								<h3><?php the_title(); ?></h3>
										<?php if ( has_post_thumbnail() ) : ?>
		        						<?php 
		        						$size= 'custom-size';
		        						$attr  = array('alt' => 'img', 'class' => 'img-responsive', 'width' => '750', 'height'=>'371' );
		        						the_post_thumbnail($size,$attr); ?>
										<?php endif; ?><br/>
								<p><?php echo the_content(); ?></p>
								<?php endwhile; ?>
								<?php
								else: ?>
								Sorry, no posts matched your criteria.</p>
								<?php endif; ?>
		
			
			</div>
			
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //single -->
<?php get_footer();?>