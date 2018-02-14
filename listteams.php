<?php/*Template Name: Teams Page*/?>

<?php while (have_posts()) : the_post(); ?>

<?php get_template_part('templates/page', 'header'); ?>

<?php get_template_part('templates/content', 'page'); ?>

<?php
$args = array(    'post_type'      => 'page',    'posts_per_page' => -1,    'post_parent'    => $post->ID,    'order'          => 'ASC',    'orderby'        => 'menu_order' );
$parent = new WP_Query( $args );
if ( $parent->have_posts() ) : ?>

<?php while ( $parent->have_posts() ) : $parent->the_post(); ?>

<div id="parent-<?php the_ID(); ?>" class="individual-team-page">

<h1 style="font-size: 16px;"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>

</div>    <?php endwhile; ?>

<?php endif; wp_reset_query(); ?>

<?php endwhile; ?>