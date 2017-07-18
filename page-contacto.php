<?php get_header(); ?>

	<div class="row marcas-row">
		<div class="col-md-2">
			<div class="clear20"></div>
			<h1><?php the_title(); ?></h1>
		</div>
		<div class="col-md-6">
            <div class="los-contactos">
                <?php
                $contactos = get_field('contacto');
                if ($contactos!="" ) {
                        ?>
                        <?php foreach ($contactos as $contacto): ?>
                            <div class="col-md-4 the-cols">
                                <div class="contact-zone">
                                    <div class="text-center">
                                        <p><strong><?php echo $contacto['lugar']; ?></strong> <br><?php echo $contacto['zona']; ?></p>
                                    </div>
                                    <p><strong><?php echo $contacto['encargado']; ?></strong></p>
                                    <p><?php echo $contacto['cargo']; ?></p>
                                    <p><?php echo $contacto['telefono']; ?></p>
                                    <p><?php echo $contacto['email']; ?></p>
                                </div>  
                             </div>
                        <?php endforeach ?>
                    <?php
                    wp_reset_postdata();
                }
                ?> 
            </div> 
			<div class="clear20"></div>
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