<?php get_header(); ?>

	<div class="row marcas-row">
		<div class="col-md-3">
			<div class="clear20"></div>
			<h1><?php the_title(); ?></h1>
		</div>
		<div class="col-md-5">

            <?php
            $i = 0;
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
            $query = new WP_Query( array( 'post_type' => 'proyecto', 'posts_per_page' => 2, 'paged' => $paged));
            if ($query->have_posts() ) {
                while ( $query->have_posts() ) { 
                    $query->the_post();
                    $i++;
                    $fotos = get_field('galeria');
                    ?>
        			<article class="project">
                        <h2><?php the_title(); ?></h2>
                        <div class="texto"><?php the_content(); ?></div>

                        <div class="slick-proyectos">
                            <?php if ($fotos!=""): ?>
                                <?php foreach ($fotos as $foto): ?>
                                    <div>
                                        <a href="<?php echo $foto['url']; ?>" class="fancybox" rell="gal-<?php echo $i; ?>"><img src="<?php echo $foto['url']; ?>" alt="<?php the_title(); ?>" class="img-responsive img-center"></a>
                                    </div>
                                <?php endforeach ?>
                            <?php else: ?>
                                <div><img src="https://placeimg.com/300/160/1" alt="<?php the_title(); ?>" class="img-responsive img-center"></div>
                                <div><img src="https://placeimg.com/300/160/2" alt="<?php the_title(); ?>" class="img-responsive img-center"></div>
                                <div><img src="https://placeimg.com/300/160/3" alt="<?php the_title(); ?>" class="img-responsive img-center"></div>
                                <div><img src="https://placeimg.com/300/160/4" alt="<?php the_title(); ?>" class="img-responsive img-center"></div>
                                <div><img src="https://placeimg.com/300/160/5" alt="<?php the_title(); ?>" class="img-responsive img-center"></div>
                                <div><img src="https://placeimg.com/300/160/6" alt="<?php the_title(); ?>" class="img-responsive img-center"></div>
                                <div><img src="https://placeimg.com/300/160/7" alt="<?php the_title(); ?>" class="img-responsive img-center"></div>
                            <?php endif ?>
                        </div>  
        			</article>
                <?php
                }
                wp_reset_postdata();
            }
            ?>  
			
            <?php wp_pagenavi( array( 'query' => $query ) ); ?>
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