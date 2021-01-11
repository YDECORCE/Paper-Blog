<?php
/* Template Name: page single CPT */
get_header();
?>
<div class="main single">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div class="post">
<h1 class="post-title"><?php the_title(); ?></h1>
<p class="post-info">
Posté le <?php the_date(); ?> dans <?php the_category(', '); ?> par <?php the_author(); ?>.
</p>
<div class="category">
	<?php
	the_terms( $post->ID, 'realisateurs', 'Réalisateurs : ' ); ?><br><?php
	the_terms( $post->ID, 'annees', 'Série TV sortie en : ' );?> <br><?php
	the_terms( $post->ID, 'categoriesseries', 'Catégorie(s) : ' ); ?><br><?php
	?>
</div>
<div class="post-content">
<?php 

the_content(); ?>
</div>
</div>
<?php endwhile; ?>
<?php endif; ?>
</div>
<?php
// if ( is_singular( 'attachment' ) ) {
// 					// Parent post navigation.
// 					the_post_navigation(
// 						array(
// 							/* translators: %s: Parent post link. */
// 							'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'twentynineteen' ), '%title' ),
// 						)
// 					);
// 				} elseif ( is_singular( 'post' ) ) {
// 					// Previous/next post navigation.
					the_post_navigation(
						array(
							'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next Post', 'base' ) . '</span> ' .
								'<span class="screen-reader-text">' . __( 'Next post:', 'base' ) . '</span> <br/>' .
								'<span class="post-title">%title</span>',
							'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous Post', 'base' ) . '</span> ' .
								'<span class="screen-reader-text">' . __( 'Previous post:', 'base' ) . '</span> <br/>' .
								'<span class="post-title">%title</span>',
						)
					);
				// }
get_footer(); ?>







