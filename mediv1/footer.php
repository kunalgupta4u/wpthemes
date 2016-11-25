<!-- footer -->
	<div class="footer">
		<div class="container">
				<div class="footer-grids">
					<div class="col-md-3 footer-grid">
					<p><?php echo get_theme_mod( 'company_street' )?>
						<?php echo get_theme_mod( 'company_pin' )?>
						<?php echo get_theme_mod( 'company_city' )?>, <?php echo get_theme_mod( 'company_country' )?>.
					<a href="mailto:<?php echo get_theme_mod( 'company_email' )?>"><?php echo get_theme_mod( 'company_email' )?></a>
					<p>Phone : <?php echo get_theme_mod( 'company_phone' )?></p>
				</div>
				<div class="col-md-3 footer-grid">
					
					<?php if ( is_active_sidebar( 'footer_menu_right' ) ) : ?>
        					<?php dynamic_sidebar( 'footer_menu_right' ); ?>
							<?php endif; ?>
				</div>
				<div class="col-md-3 footer-grid">
					<?php if ( is_active_sidebar( 'footer_menu_left' ) ) : ?>
    
        					<?php dynamic_sidebar( 'footer_menu_left' ); ?>

							<?php endif; ?>
				</div>
				<div class="col-md-3 footer-grid">
					<div class="footer-grid-left">
						<a href="single.html"><img src="<?php bloginfo('template_directory'); ?>/images/4.jpg" alt=" " class="img-responsve" /></a>
					</div>
					<div class="footer-grid-left">
						<a href="single.html"><img src="<?php bloginfo('template_directory'); ?>/images/5.jpg" alt=" " class="img-responsve" /></a>
					</div>
					<div class="footer-grid-left">
						<a href="single.html"><img src="<?php bloginfo('template_directory'); ?>/images/6.jpg" alt=" " class="img-responsve" /></a>
					</div>
					<div class="footer-grid-left">
						<a href="single.html"><img src="<?php bloginfo('template_directory'); ?>/images/7.jpg" alt=" " class="img-responsve" /></a>
					</div>
					<div class="footer-grid-left">
						<a href="single.html"><img src="<?php bloginfo('template_directory'); ?>/images/8.jpg" alt=" " class="img-responsve" /></a>
					</div>
					<div class="footer-grid-left">
						<a href="single.html"><img src="<?php bloginfo('template_directory'); ?>/images/9.jpg" alt=" " class="img-responsve" /></a>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="footer-copy">
				<p> <?php echo get_theme_mod( 'copyright_textbox' )?><a href="<?php echo get_theme_mod( 'copyright_url' ).' '?>">Kunal Gupta.</a></p>
				<ul>
					<li>
                        <a href="<?php echo get_theme_mod( 'company_twitter' )?>" class="twitter">
                            <span type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Follow Us On Twitter">
                            </span>
                        </a>
                    </li>
					<li>
                        <a href="<?php echo get_theme_mod( 'company_pintrest' )?>" class="p">
                            <span type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Follow Us On Pinterest">
                            </span>
                        </a>
                    </li>
					<li>
                        <a href="<?php echo get_theme_mod( 'company_fb' )?>" class="facebook" id="facebook">
                            <span type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Follow Us On Facebook">
                            </span>
                        </a>
                    </li>
					<li>
                        <a href="<?php echo get_theme_mod( 'company_dribbble' )?>" class="dribble">
                            <span type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Follow Us On Dribbble">
                            </span>
                        </a>
                    </li>
					<li>
                        <a href="<?php echo get_theme_mod( 'company_rss' )?>" class="rss">
                            <span type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Follow Us On RSS">
                            </span>
                        </a>
                    </li>
					<div class="clearfix"> </div>
				</ul>
			</div>
		</div>
	</div>
<!-- //footer -->

<div class="poweredby">
		<div class="row centered">
			<div class="col-md-3">
				<p class="center-block">
				<h4 class="text-center">Powered By</h4>
				<a href="http://www.medicpresents.com/"><img src="<?php bloginfo('template_directory'); ?>/images/companylogo.png" alt=" " class="img-responsve"/></a>
				</p>
			</div>
			<div class="col-md-9">
				<p>
					<h4 class="text-center">&nbsp;</h4>
				<a href="http://www.medicpresents.com/"><img src="<?php bloginfo('template_directory'); ?>/images/Premiumdesigntemplates.jpg" alt=" " class="img-responsve"/></a>
				</p>
			</div>
		</div>
	</div>
<!-- here stars scrolling icon -->

    <script type="text/javascript">
                        $(window).load(function() {
                        $("#flexiselDemo1").flexisel({
                            visibleItems: 4,
                            animationSpeed: 1000,
                            autoPlay: false,
                            autoPlaySpeed: 3000,            
                            pauseOnHover: true,
                            enableResponsiveBreakpoints: true,
                            responsiveBreakpoints: { 
                                portrait: { 
                                    changePoint:480,
                                    visibleItems: 1
                                }, 
                                landscape: { 
                                    changePoint:640,
                                    visibleItems: 2
                                },
                                tablet: { 
                                    changePoint:768,
                                    visibleItems: 3
                                }
                            }
                        });
                        
                     });
                    </script>
                    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.flexisel.js"></script>

    <script src="<?php bloginfo('template_directory'); ?>/js/jquery.wmuSlider.js"></script> 
                            <script>
                                $('.example1').wmuSlider();         
                            </script>

    <script>
                    $(function () {
                      $('[data-toggle="tooltip"]').tooltip()
                    })
                </script>

	<script type="text/javascript">
									$(document).ready(function() {
										
										var defaults = {
								  			containerID: 'toTop', // fading element id
											containerHoverID: 'toTopHover', // fading element hover id
											scrollSpeed: 1200,
											easingType: 'linear' 
								 		};
										
										
										$().UItoTop({ easingType: 'easeOutQuart' });
										
									});
	</script>
<!-- //here ends scrolling icon -->
<!-- for bootstrap working -->
	<script src="<?php bloginfo('template_directory'); ?>/js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<?php wp_footer();?>
</body>
</html>