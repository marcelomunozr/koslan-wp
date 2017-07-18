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
?>
<?php if (have_posts()): the_post();?>
	<div class="row interior-categoria">
		<div class="col-md-3 sidebar-zone">
			<h6>Categorías de Productos</h6>
			<?php get_sidebar('productos'); ?>
		</div>
		<div class="col-md-5 content-zone">
			<h1><?php the_title(); ?> 
				<span class="marca-name">
					<?php 
					$term_list = wp_get_post_terms($post->ID, 'marca', array("fields" => "all"));
					foreach($term_list as $term_single) {
						echo $term_single->name;
					}
				 	?>
			 	</span>
		 	</h1>
			<div class="texto">
				<?php the_content(); ?>
			</div>
			<div class="line-line"></div>
			<div class="download-zone">
				<?php 
					$ficha = get_field('ficha');
					$catalogo = get_field('catalogo');
					$certificaciones = get_field('certificaciones');
				?>
				<?php if ($ficha!=""): ?>

						<a href="<?php echo $ficha; ?>" target="_blank"><span class="ico-ficha"></span>Descargar Ficha Técnica</a>

				<?php endif ?>
				<?php if ($catalogo!=""): ?>

						<a href="<?php echo $catalogo; ?>" target="_blank"><span class="ico-catalogo"></span>Descargar Catálogo</a>

				<?php endif ?>
				<?php if ($certificaciones!=""): ?>

						<a href="<?php echo $certificaciones; ?>" target="_blank"><span class="ico-certificaciones"></span>Descargar Certificaciones</a>

				<?php endif ?>
			</div>
		</div>
		<div class="col-md-4 photos-zone">
			<div class="row">
				<div class="col-md-6">
					<h3><?php the_title(); ?></h3>
				</div>
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
			<?php $i = 0; ?>
			<?php while(have_posts()) : the_post(); ?>
				<?php if ($i<6): ?>
					<div class="col-md-4">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full', array('class' => 'img-responsive img-center', 'title' => get_the_title()));?></a>
						<!-- <pre><?php print_r($queried_object); ?></pre> -->
					</div>
				<?php endif ?>
				<?php $i++; ?>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
			<div class="row la-galeria">
				<?php if (has_post_thumbnail()): ?>
					<div class="col-md-4">
			        	<?php the_post_thumbnail('full', array('class' => 'img-responsive img-center', 'title' => get_the_title()));?>
			        </div>
				<?php endif ?>
				<?php 
				$fotos = get_field('fotos');
				if( $fotos ): ?>
			        <?php foreach( $fotos as $image ): ?>
			        	<div class="col-md-4">
			                <a href="<?php echo $image['url']; ?>" class="fancybox" rel="galeria">
			                    <img src="<?php echo $image['sizes']['thumbnail']; ?>" class="img-responsive" alt="<?php echo $image['alt']; ?>" />
			                </a>
			            </div>
			        <?php endforeach; ?>
				<?php endif; ?>
			</div>
			<div class="information">
				<h6><span class="icon-in-somos"></span><span class="separate"></span>MÁS INFORMACIÓN</h6>
			</div>
		</div>
	</div>
<?php endif ?>


<?php get_footer(); ?>