<!-- Portfolio Item -->
<span><?php $category = get_the_category( $id ); echo $category[0]->name ?></span>
<h3><?php the_title(); ?></h3>
<a href="<?php the_permalink(); ?>"></a>