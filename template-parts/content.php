<?php

/**

 * Template part for displaying posts.

 *

 * @link https://codex.wordpress.org/Template_Hierarchy

 *

 * @package Karta

 */



$classes = array();

$classes[] = 'masonry-grid__item';


if ( get_post_type( get_the_ID() ) != 'page' ) {

?>



<div id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?> ">
	<?php 
	if ( has_post_thumbnail() ){
    	$class = "post__primary-category";
    }else{
    	$class = "post__primary-category_nothumbnail";
    }
	?>
	<figure class="post__figure">

		<?php karta_featured_image( 'karta-grid-2' ); ?>

			<?php 
			$post_types = get_post_types( '', 'names' ); 
		
			
			foreach ( $post_types as $post_type ) {

				
				if($post_type == 'event'){
					?>
                     <?php echo str_replace('<a','<a class="'.$class.'" ',get_the_term_list( get_the_ID(),'event-category', '', ', ', '' )); ?><?php //echo the_ID(); ?> 
				<?php 
					
				}
				if($post_type == 'post'){
					?>
                     <?php echo str_replace('<a','<a class="'.$class.'" ',get_the_term_list( get_the_ID(),'category', '', ', ', '' )); ?><?php //echo the_ID(); ?> 
				<?php 
					
					}
				}
			
			
		
			?>
		<figcaption class="post__figcaption">



			

			
	
			<a href="<?php the_permalink(); ?>" class="post__intro" rel="bookmark">
			<?php if ( 'post' === get_post_type() ) { ?>

				<!--<div class="post__date"><?php echo esc_html( get_the_date() ); ?></div>-->

			<?php } ?>



			<?php esc_html( the_title( '<h4 class="post__title">', '</h4>' ) ); ?>

			</a>

		</figcaption>

	</figure>

</div>
<?php } ?>



