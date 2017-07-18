<?php get_header(); ?>
<?php if (have_posts()): the_post();?>
<?php 
$color = get_field('color');
?>
	<div class="row interior-industrias <?php echo $color; ?>">
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-5 sidebar-zone">
					<h6>INDUSTRIAS</h6>			
					<h1><?php the_title(); ?></h1>
				</div>
				<div class="col-md-7 content-zone">
					<div class="texto">
						<?php the_content(); ?>
					</div>
				</div>
				<div class="col-md-3">	
					<h2>Productos</h2>
				</div>
				<div class="clearfix"></div>
				<div class="col-md-10 col-md-offset-2">
					<div class="productos-contain-homi">
						<div class="row">
							<?php
							$query = new WP_Query( array( 'post_type' => 'productos', 'posts_per_page' => 4));
							if ($query->have_posts() ) {
							    while ( $query->have_posts() ) { 
						            $query->the_post();?>
						            <div class="col-md-3">
					                	<a href="<?php the_permalink();?>">
						                	<?php the_post_thumbnail('productos', array('class' => 'img-responsive img-center', 'title' => get_the_title()));?>
						                </a>
						                <div class="text-center">
						                	<p><strong><?php the_title(); ?></strong></p>
						                </div>
						            </div>
							    <?php
							    }
							    wp_reset_postdata();
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4 photos-zone" style="background: url('<?php the_post_thumbnail_url( 'full' ); ?>') no-repeat center center; background-size: cover;">
			<div class="row">
				<div class="col-md-6">
					<div class="col-xs-10 col-xs-offset-1 la-marca">
						<?php 
						$term_list = wp_get_post_terms($post->ID, 'marca', array("fields" => "all"));
						foreach($term_list as $term_single) {?>
							<img src="<?php echo get_field('logo',$term_single); ?>" alt="<?php echo $term_single->name; ?>" class="img-responsive img-cate img-center">
							<?php
						}
					 	?>
					</div>
				</div>
			</div>
			<div class="information">
				<h6><span class="icon-in-somos"></span><span class="separate"></span>MÁS INFORMACIÓN</h6>
			</div>
		</div>
	</div>
<?php endif ?>


<?php get_footer(); ?>