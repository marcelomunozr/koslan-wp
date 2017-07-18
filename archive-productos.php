<?php get_header(); ?>
<?php 
    $taxonomy = "categoria";
    $terms = get_terms($taxonomy, array(
      "orderby"    => "count",
      "hide_empty" => false
    ));
    $hierarchy = _get_term_hierarchy($taxonomy);
?>
<div class="row cate-prod">
    <?php
    foreach($terms as $term) {
      if($term->parent) {
        continue;
      }
      ?>
      <div class="col-md-3">
      <?php 
        // echo "<pre>";
        // print_r($term);
        // echo "</pre>";
       ?>
        <h6>Productos</h6>
        <h2><?php echo $term->name; ?></h2>
        <div class="texto">
          <?php echo get_field('descripcion',$term); ?>
        </div>
        <a href="<?php echo get_term_link( $term->slug, $taxonomy ); ?>"><img src="<?php echo get_field('imagen',$term); ?>" alt="<?php echo $term->name; ?>" class="img-responsive img-cate"></a>

        <?php /*
        if($hierarchy[$term->term_id]) {
          foreach($hierarchy[$term->term_id] as $child) {
            $child = get_term($child, "categoria");
            echo '--'.$child->name;
          }
          
        }*/?>
      </div>
      <?php
    }
 ?>
 </div>
<?php get_footer(); ?>