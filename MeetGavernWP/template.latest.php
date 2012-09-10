<?php
/*
Template Name: Latest Posts
*/

global $tpl;

$wp_query = new WP_Query();
$wp_query->query(array('posts_per_page' => get_option('posts_per_page'), 'paged' => $paged));
$more = 0;

gk_load('header');
gk_load('before');

?>

<?php if ( have_posts() ) : ?>
	<section id="gk-mainbody">
		<?php gk_content_nav(); ?>
		
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>
		
		<?php gk_content_nav(); ?>
	</section>
<?php else : ?>
	<section id="gk-mainbody">
		<article id="post-0" class="post no-results not-found">
			<header class="entry-header">
				<h1 class="entry-title"><?php _e( 'Nothing Found', GKTPLNAME ); ?></h1>
			</header>

			<div class="entry-content">
				<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', GKTPLNAME ); ?></p>
				<?php get_search_form(); ?>
			</div>
		</article>
	</section>
<?php endif; ?>

<?php

gk_load('after');
gk_load('footer');

// EOF