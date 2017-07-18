<?php get_header(); ?>
<?php the_post(); ?>
<?php $somos = get_field('equipo'); ?>
	<div class="row">
		<div class="col-md-3">
			<div class="clear20"></div>
			<h1>Quienes Somos</h1>
			<?php foreach ($somos as $equipo): ?>
				<img src="<?php echo $equipo['foto']; ?>" alt="" class="img-center img-responsive">
				<h4 class="text-center"><?php echo $equipo['nombre']; ?> <br><span><?php echo $equipo['cargo']; ?> <br><?php echo $equipo['koslan']; ?></span></h4>
			<?php endforeach ?>
		</div>
		<div class="col-md-5">
			<div class="clear20"></div>
			<div class="texto">
				<?php the_content(); ?>
			</div>
		</div>
		<div class="col-md-4">
			<?php if (has_post_thumbnail()): ?>
		        <?php the_post_thumbnail('full', array('class' => 'img-responsive img-center', 'title' => get_the_title()));?>
			<?php endif ?>
			<div class="information">
				<h6><span class="icon-in-somos"></span><span class="separate"></span>MÁS INFORMACIÓN</h6>
			</div>
		</div>
	</div>
<?php get_footer(); ?>