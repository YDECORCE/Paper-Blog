<?php
/**

 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
				?>
			</header><!-- .page-header -->

			<?php
			// Start the Loop.
			while (have_posts()) : the_post(); ?>
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
<?php endwhile;

			// Previous/next page navigation.
			the_posts_navigation();

			// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content/content', 'none' );

		endif;
		?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
