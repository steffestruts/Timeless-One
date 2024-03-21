<a href="<?php bloginfo('url');?>"></a>
<?php $category = get_the_category( $id ); echo $category[0]->name ?>
<?php the_title(); ?>
<?php the_content(); ?>
<?php 
  $external = webpage_get_meta( 'webpage_url' );
  if (empty ($external) ) {
    echo '';
  }
  else {
    echo '<a href="' . esc_url($external) . '" target="_blank">Visa projekt</a>';
  }
?>