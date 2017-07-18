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
		<ul class="sidebar">
			<?php foreach ($terms as $term): ?>
				<?php if ($term->parent): ?>
					<?php continue; ?>
				<?php endif ?>
				<li>
					<a href="<?php echo get_term_link( $term->slug, $taxonomy ); ?>" class="collap-sed" <?php if ($hierarchy[$term->term_id]): ?> data-toggle="collapse" data-target="#sub<?php echo $sub;?>"<?php endif; ?>><?php echo $term->name; ?></a>
					<?php if ($hierarchy[$term->term_id]): ?>
						<ul class="sub-side collapse" id="sub<?php echo $sub;?>">
							<?php foreach ($hierarchy[$term->term_id] as $child): ?>
								<?php $child = get_term($child, "categoria"); ?>
								<li><a href="<?php echo get_term_link( $child->slug, $taxonomy ); ?>"><?php echo $child->name; ?></a></li>
							<?php endforeach ?>
						</ul>
					<?php endif ?>
				</li>
				<?php $sub++; ?>
			<?php endforeach ?>
		</ul>