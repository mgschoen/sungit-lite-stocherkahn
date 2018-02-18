<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sungit_Lite
 */

?>
 <div class="blog-post-content <?php if (is_sticky()) {echo 'sticky';} ?>">
    <div class="blog-content-body">
        <div class="post-desc">
            <?php
    			if(is_home() || is_archive()):
    				echo wp_kses_post(sungit_lite_get_excerpt($post->ID,200));
    			else:
    				the_content( sprintf(
    					/* translators: %s: Name of current post. */
    					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'sungit-lite' ), array( 'span' => array( 'class' => array() ) ) ),
    					the_title( '<span class="screen-reader-text">"', '"</span>', false )
    				) );
    			endif;
    		?>
        </div>
        <?php if ( get_the_tag_list() != '' ) { ?>
            <span class="sungit-lite-tags"><?php wp_kses_post(the_tags( 'Tags:' , '' )); ?></span>
        <?php }
        if(is_archive() || is_home()): ?>
            <a href="<?php the_permalink(); ?>" class="btn sl-btn"><?php esc_html_e( 'Read More', 'sungit-lite' ); ?></a>
        <?php endif; ?>
    </div>
</div>