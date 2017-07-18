<?php get_header(); ?>

	<div class="row marcas-row">
		<div class="col-md-2">
			<div class="clear20"></div>
			<h1><?php the_title(); ?></h1>
		</div>
		<div class="col-md-6">
			<!-- Bombas industriales -->
			<div class="col-md-3 the-cols">
                <h4>Bombas Industriales</h4>
                <?php
                $query = new WP_Query( array( 'post_type' => 'marcas','tipo' => 'bombas-industriales', 'posts_per_page' => -1));
                if ($query->have_posts() ) {
                    while ( $query->have_posts() ) { 
                        $query->the_post();
                        //por si necesito las categorias
                        // $term = $query->get_queried_object();
                        // $categoria = get_the_category($query->ID);
                        // $slug = $term->$categoria->slug;
                        // $categories = get_the_terms( $post->ID, 'tipo' );
                        ?>
                        <figure>
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('full', array('class' => 'img-responsive img-center', 'title' => get_the_title()));?>                                
                            <?php else: ?>
                                <img src="https://placeimg.com/200/153/tech" alt="<?php the_title(); ?>" class="img-responsive img-center">
                            <?php endif ?>
                            <div class="description">
                                <?php 
                                    $content = get_the_content();
                                    $content = apply_filters('the_content', $content);
                                ?>
                                <p><?php echo $content; ?></p>
                            </div>
                        </figure>
                    <?php
                    }
                    wp_reset_postdata();
                }
                ?>    
			</div>
			<!-- valvulas industriales -->
			<div class="col-md-3 the-cols">
                <h4>Válvulas Industriales</h4>
                <?php
                $query = new WP_Query( array( 'post_type' => 'marcas','tipo' => 'valvulas-industriales', 'posts_per_page' => -1));
                if ($query->have_posts() ) {
                    while ( $query->have_posts() ) { 
                        $query->the_post();
                        
                        ?>
                        <figure>
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('full', array('class' => 'img-responsive img-center', 'title' => get_the_title()));?>                                
                            <?php else: ?>
                                <img src="https://placeimg.com/200/153/tech" alt="<?php the_title(); ?>" class="img-responsive img-center">
                            <?php endif ?>
                            <div class="description">
                                <?php 
                                    $content = get_the_content();
                                    $content = apply_filters('the_content', $content);
                                ?>
                                <p><?php echo $content; ?></p>
                            </div>
                        </figure>
                    <?php
                    }
                    wp_reset_postdata();
                }
                ?>    
			</div>
			<!-- estanques de presion -->
			<div class="col-md-3 the-cols">
                <h4>Estanques de Presión</h4>
                <?php
                $query = new WP_Query( array( 'post_type' => 'marcas','tipo' => 'estanques-de-presion', 'posts_per_page' => -1));
                if ($query->have_posts() ) {
                    while ( $query->have_posts() ) { 
                        $query->the_post();
                        
                        ?>
                        <figure>
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('full', array('class' => 'img-responsive img-center', 'title' => get_the_title()));?>                                
                            <?php else: ?>
                                <img src="https://placeimg.com/200/153/tech" alt="<?php the_title(); ?>" class="img-responsive img-center">
                            <?php endif ?>
                            <div class="description">
                                <?php 
                                    $content = get_the_content();
                                    $content = apply_filters('the_content', $content);
                                ?>
                                <p><?php echo $content; ?></p>
                            </div>
                        </figure>
                    <?php
                    }
                    wp_reset_postdata();
                }
                ?>    
			</div>
			<!-- soluciones ply&play -->
			<div class="col-md-3 the-cols">
                <h4>Soluciones Plug&Play</h4>
                <?php
                $query = new WP_Query( array( 'post_type' => 'marcas','tipo' => 'soluciones-plugplay', 'posts_per_page' => -1));
                if ($query->have_posts() ) {
                    while ( $query->have_posts() ) { 
                        $query->the_post();
                        
                        ?>
                        <figure>
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('full', array('class' => 'img-responsive img-center', 'title' => get_the_title()));?>                                
                            <?php else: ?>
                                <img src="https://placeimg.com/200/153/tech" alt="<?php the_title(); ?>" class="img-responsive img-center">
                            <?php endif ?>
                            <div class="description">
                                <?php 
                                    $content = get_the_content();
                                    $content = apply_filters('the_content', $content);
                                ?>
                                <p><?php echo $content; ?></p>
                            </div>
                        </figure>   
                    <?php
                    }
                    wp_reset_postdata();
                }
                ?>    
			</div>
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