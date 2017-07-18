<?php get_header(); ?>


	<div class="productos-contain-homi">
		<div class="row">
			<?php
			$query = new WP_Query( array( 'post_type' => 'productos', 'posts_per_page' => 5));
			if ($query->have_posts() ) {
			    while ( $query->have_posts() ) { 
		            $query->the_post();?>
		            <div class="col-five">
	                	<a href="<?php the_permalink();?>">
		                	<?php the_post_thumbnail('productos', array('class' => 'img-responsive img-center', 'title' => get_the_title()));?>
		                </a>
		            </div>
			    <?php
			    }
			    wp_reset_postdata();
			}
			?>
		</div>
	</div>
</div>
<div class="industrias-contain-home">
	<div class="container indus">
		<?php
		$query = new WP_Query( array( 'post_type' => 'industrias', 'posts_per_page' => 5));
		if ($query->have_posts() ) {
		    while ( $query->have_posts() ) { 
	            $query->the_post();?>
				<div class="col-five color-<?php echo get_field('color');?>">
					<h4><?php the_title(); ?></h4>
	                <a href="<?php the_permalink();?>">
	                	<?php the_post_thumbnail('infustrias', array('class' => 'img-responsive img-center', 'title' => get_the_title()));?>
	                </a>
	            </div>
		    <?php
		    }
		    wp_reset_postdata();
		}
		?>
		<div class="col-one">
			<h4>Marcas</h4>
			<?php 
				$taxonomy = "marca";
				$terms = get_terms($taxonomy, array(
					"orderby"    => "count",
					"hide_empty" => false
				));
				$i = 0;
			?>
			<?php foreach ($terms as $term): ?>
				<?php if ($i==0): ?>
					<div class="">
						<img src="<?php echo get_field('logo',$term); ?>" alt="<?php echo $term->name; ?>" class="img-responsive img-cate img-center">
		            </div>
				<?php endif ?>
				<?php $i++; ?>
			<?php endforeach ?>
		</div>
	</div>
</div>
<div class="container">



<?php get_footer(); ?>