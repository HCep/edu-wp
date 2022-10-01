<?php

?>

	</div><!-- #content -->
	</div><!-- .row -->
			</div>
	<footer id="colophon" class="site-footer" role="contentinfo">

		
				<div class="main-footer d-flex">
				<div class="container mx-auto">
					<?php get_sidebar('footer'); ?> 
					
					</div>
				</div>
				
		<!-- prawa autorskie -->
		<div class="footer-bottom-row">
		<div class="container mx-auto">
			
						<div class="site-info d-flex">

						<?php get_sidebar('footer-two'); ?> 
					
						</div>
		</div>
		</div>
		
		

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/splide.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

<script>
  new Splide( '.splide',{
	arrowPath:'M24 12.001H2.914l5.294-5.295-.707-.707L1 12.501l6.5 6.5.707-.707-5.293-5.293H24v-1z',
	breakpoints: {
		550:{
			perPage: 1,
		},
		787:{
			perPage: 2,
		},
		1200: {perPage: 3,
		
		}
		
	},
	perPage: 4,
  } ).mount();
</script>

</body>
</html>
