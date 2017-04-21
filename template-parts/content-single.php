<?php
/**
 * Template part for displaying page content in single.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Karta
 */

if ( 'chat' === get_post_format() ) {
	add_filter( 'the_content', 'karta_parse_chat_content', 1, 1 );
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post__background" <?php karta_background_image_url() ?>></div>
	<div class="container container--custom">
		<div class="row">
			<div class="col-xs-12">
				<div class="post-box">
					<div class="post-box__categories">
						<?php karta_categories(); ?>
					</div>
					<div class="post-box__intro" 
					<?php if ( !has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
						echo 'style="margin-top:0px !important; "';
					}  ?> >
                    <?php

?>
						<p class="post-box__date"><?php //echo esc_html( get_the_date() ); ?></p>
						<?php if ( 'aside' !== get_post_format() ) : ?>
							<h1 class="post-box__title"><?php esc_html( the_title() ); ?></h1>
						<?php endif; ?>
						<?php if ( has_tag() ) : ?><p class="post-box__tags"><?php esc_html( the_tags() ); ?></p><?php endif; ?>
					</div>
					<?php
					if ( get_the_content() !== '' ) : ?>
					<div class="post-box__content">
						<?php
						wp_link_pages(); 
						the_content();
						the_post_navigation();
						
						

						?>
					</div>
					
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</article>

<?php
if ( 'chat' === get_post_format() ) {
	remove_filter( 'the_content', 'karta_parse_chat_content', 1 );
}
?>

<!--======== SHARE ARTICLE ========-->
<?php karta_the_share_links(); ?>

<!--======== RELATED POSTS ========-->
<?php karta_the_related_posts(); ?>

<div style="text-align:center;">
<?php 
$args = array (
    'before'            => '<div class="page-links-XXX"><span class="page-link-text">' . __( 'More pages: ', 'textdomain' ) . '</span>',
    'after'             => '</div>',
    'link_before'       => '<span class="page-link">',
    'link_after'        => '</span>',
    'next_or_number'    => 'next',
    'separator'         => ' | ',
    'nextpagelink'      => __( 'Next &raquo', 'textdomain' ),
    'previouspagelink'  => __( '&laquo Previous', 'textdomain' ),
);
 
wp_link_pages( $args );
 ?>
</div>
