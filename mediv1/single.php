<?php get_header();?>
<!-- single -->
	<div class="single">
		<div class="container">
			<div class="col-md-8 single-left">
						<?php if ( have_posts() ) : ?>
								<?php while ( have_posts() ) : the_post(); ?>

								<h3><?php the_title(); ?></h3>

									<ul class="ab">
									<li><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>&nbsp;<?php the_date('d M Y') ?></i>
									<li>
									<?php if ( comments_open() && pings_open() ) { ?>
									 
									<?php } elseif ( !comments_open() && pings_open() ) { ?>
									 
									<?php } elseif ( comments_open() && !pings_open() ) { ?>
									 
									<?php } elseif ( !comments_open() && !pings_open() ) { ?>
									 
									<?php }  
									edit_post_link('Edit', '<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>&nbsp;', '', '', ''); ?>
									 </li>
									 
									 <li><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;<?php the_author(); ?> </li>
									 <li><span class="glyphicon glyphicon-th"></span><?php the_category(', ') ?></li>
									</ul>
								
										<?php if ( has_post_thumbnail() ) : ?>
		        						<?php 
		        						$size= 'custom-size';
		        						$attr  = array('alt' => 'img', 'class' => 'img-responsive', 'width' => '750', 'height'=>'371' );
		        						the_post_thumbnail($size,$attr); ?>
										<?php endif; ?>
										<?php echo the_content(); ?>

										
										
										
										
										 <?php the_tags( '<h4>Tag</h4><ul class="ab"><li>#', '</li><li>#', '</li></ul>' ); ?>
										<?php comments_template(); ?>

										<?php endwhile; ?>
										<?php else: ?>
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