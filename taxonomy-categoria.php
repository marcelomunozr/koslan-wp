<?php get_header(); ?>
<?php
	$queried_object = get_queried_object();
	$campos = get_fields($queried_object);
	$taxonomy = "categoria";
	$terms = get_terms($taxonomy, array(
		"orderby"    => "count",
		"hide_empty" => false
	));
	$hierarchy = _get_term_hierarchy($taxonomy);

	$sub = 0;	
?>
<div class="row interior-categoria">
	<div class="col-md-3 sidebar-zone">
		<h6>Categorías de Productos</h6>
		<?php get_sidebar('productos'); ?>
	</div>
	<!-- ESTO MUESTRA LAS SUBCATEGORIAS SI -->
	<?php 	$childs = get_terms($taxonomy, array(
		"orderby"    => "count",
		"hide_empty" => false,
		"parent"	=> $queried_object->term_id
	)); ?>
	<?php if ($childs): ?>
		<div class="col-md-5 content-zone">
			<h1><?php single_term_title(); ?> </h1>
			<div class="texto">
				<p><?php echo get_field('descripcion',$queried_object); ?></p>
			</div>
			<div class="clear20"></div>
			<div class="row">
				<?php $i = 0; ?>
				<?php foreach ($childs as $child): ?>
					<?php $child = get_term($child, "categoria"); ?>
					<div class="col-md-4">
						<a href="<?php echo get_term_link( $child->slug, $taxonomy ); ?>"><img src="<?php echo get_field('imagen',$child); ?>" alt="<?php echo $child->name; ?>" class="img-responsive img-cate"></a>
						<div class="text-center">
							<h5><?php echo $child->name; ?></h5>
						</div>
						<!-- <pre><?php print_r($queried_object); ?></pre> -->
					</div>
					<?php $i++; ?>
					<?php if ($i==3): ?>
						<div class="clearfix"></div>
					<?php endif ?>
				<?php endforeach ?>
			</div>
		</div>
	<?php else: ?>
		<?php if (have_posts()): ?>
			<div class="col-md-5 content-zone">
				<h1><?php single_term_title(); ?> </h1>
				<div class="texto">
					<p><?php echo get_field('descripcion',$queried_object); ?></p>
				</div>
				<div class="clear20"></div>
				<div class="row">
					<?php $i = 0; ?>
					<?php while(have_posts()) : the_post(); ?>
						<div class="col-md-4">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full', array('class' => 'img-responsive img-center', 'title' => get_the_title()));?></a>
							<div class="text-center">
								<h5><?php the_title(); ?></h5>
							</div>
							<!-- <pre><?php print_r($queried_object); ?></pre> -->
						</div>
						<?php $i++; ?>
						<?php if ($i==3): ?>
							<div class="clearfix"></div>
						<?php endif ?>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				</div>
			</div>
		<?php else: ?>
			<div class="col-md-5 content-zone">
				<h1>No Hay Productos por el momento</h1>
				<div class="texto">
					<p><strong>Por su comprensión, muchas gracias.</strong></p>
				</div>
				
			</div>
		<?php endif?>
	<?php endif; ?>
	<!-- ESTO EN CASO DE SER LOS PRODUCTOS QUE SE VAN A MOSTRAR -->
	<?php /*if (have_posts()): ?>
		<div class="col-md-5 content-zone">
			<h1><?php single_term_title(); ?> </h1>
			<div class="texto">
				<p><?php echo get_field('descripcion',$queried_object); ?></p>
			</div>
			<div class="clear20"></div>
			<div class="row">
				<?php $i = 0; ?>
				<?php while(have_posts()) : the_post(); ?>
					<div class="col-md-4">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full', array('class' => 'img-responsive img-center', 'title' => get_the_title()));?></a>
						<div class="text-center">
							<h5><?php the_title(); ?></h5>
						</div>
						<!-- <pre><?php print_r($queried_object); ?></pre> -->
					</div>
					<?php $i++; ?>
					<?php if ($i==3): ?>
						<div class="clearfix"></div>
					<?php endif ?>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
	<?php endif */?>
	<div class="col-md-4 photos-zone">
		<?php $i = 0; ?>
		<?php while(have_posts()) : the_post(); ?>
			<?php if ($i<2): ?>
				<figure>
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full', array('class' => 'img-responsive img-center', 'title' => get_the_title()));?></a>
					<!-- <pre><?php print_r($queried_object); ?></pre> -->
				</figure>
			<?php endif ?>
			<?php $i++; ?>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		<div class="information">
			<h6><span class="icon-in-somos"></span><span class="separate"></span>MÁS INFORMACIÓN</h6>
		</div>
	</div>
</div>


<?php get_footer(); ?>