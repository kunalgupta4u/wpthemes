<?php get_header();?>
<!-- single -->
	<div class="single">
		<div class="container">
			<div class="col-md-8 single-left">

			<div class="breadcrumb">
		
				<?php
					the_archive_title();
					the_archive_description();
				?>
				<span>
					<a href="<?php echo get_option('home'); ?>/">Home / </a>
				</span>
			
		</div>
						<?php if ( have_posts() ) : ?>
								<?php while ( have_posts() ) : the_post(); ?>
								<h3><a href="<?php the_permalink() ?>" class="bars"><?php the_title(); ?></a></h3>
										<?php if ( has_post_thumbnail() ) : ?>
		        						<?php 
		        						$size= 'custom-size';
		        						$attr  = array('alt' => 'img', 'class' => 'img-responsive', 'width' => '750', 'height'=>'371' );
		        						the_post_thumbnail($size,$attr); ?>
										<?php endif; ?><br/>
								<p><?php //echo the_content(); ?><?php echo get_the_excerpt(); ?></p>
								<?php endwhile; ?>
								<?php
								else: ?>
								Sorry, no posts matched your criteria.</p>
								<?php endif; ?>
			</div>
			<div class="col-md-4 single-right">
				<div class="right_sidebar">
					<?php get_sidebar('right');?>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //single -->
<?php get_footer();?>