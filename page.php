<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sungit_Lite
 */

get_header();
while ( have_posts() ) : the_post();
$thumbnail = get_the_post_thumbnail_url();
$header_image = get_header_image();
$inner_banner = (!empty($thumbnail)?$thumbnail:(!empty($header_image)?$header_image:'')); ?>
<!-- Heading -->
<div class="inner-banner-wrap" <?php if ($inner_banner) { ?>style="background-image: url(<?php echo esc_url($inner_banner) ?>)"<?php } ?>>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="inner-banner-content col-md-8">
                <h2><?php the_title(); ?></h2>
            </div>
        </div>
    </div>
</div>
<!-- End of heading sec -->
<section class="sec-content blog-page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <main id="main" class="site-main clearfix">
					<?php
                        get_template_part( 'components/page/content', 'page' );
                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
                    ?>
                    </main>
	            </div>
	        </div>
	    </div>
	</section>
<?php
endwhile; // End of the loop.
get_footer();
