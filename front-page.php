<?php get_header(); ?>

<?php
  // Different Array and Settings
  $userID = 1;
  $single = true;
  $first_name = get_user_meta( $userID, 'first_name', $single );
  $last_name = get_user_meta( $userID, 'last_name', $single );
  $description = get_user_meta( $userID, 'description', $single );
  $dribbble_profile = get_user_meta( $userID, 'dribbble_profile', $single );
  $github_profile = get_user_meta( $userID, 'github_profile', $single );
?>
<?php
  // About Output
  echo '<span class="biography__firstName">' . esc_html($first_name) . '</span><span class="biography__lastName">' . esc_html($last_name) . '</span>';
  echo '<p>' . esc_html($description) . '</p>';
?>
<?php
  // Dribble Output
  if ( $dribbble_profile && $dribbble_profile != '' ) {
    echo '<a href="' . esc_url($dribbble_profile) . '" target="_blank">Dribbble</a>';
  }
  // Github Output
  if ( $github_profile && $github_profile != '' ) {
    echo '<a href="' . esc_url($github_profile) . '" target="_blank">Github</a>';
  }
?>
<a href="mailto:<?php echo antispambot(get_bloginfo('admin_email')); ?>"><?php echo antispambot(get_bloginfo('admin_email')); ?></a>
<?php
  // Arguments
  $args = array (
    'nopaging' => true,
    'posts_per_page' => 9,
    'post_type' => 'portfolio'
  );
  // The Query
  $portfolio = new WP_Query( $args );
  // The Loop
  if ( $portfolio->have_posts() ) : 
    while ( $portfolio->have_posts() ) : $portfolio->the_post(); 
      get_template_part( 'template-parts/content-portfolio' );
    endwhile;
  else:
    echo 'Inget att visa just nu.';
  endif;
  // Restore Original Post Data
  wp_reset_postdata();
?>

<?php get_footer(); ?>