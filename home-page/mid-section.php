<?php
$posts_per_page = get_option('posts_per_page');
$sungit_lite_theme_options = sungit_lite_theme_options();
$tour_title = $sungit_lite_theme_options['tour_title'];
$tour_subtitle = $sungit_lite_theme_options['tour_subtitle']; ?>
<div class="sl-mid-sec section">
    <div class="container">
        <div class="row">
            <?php if( $tour_title !== '' || $tour_subtitle !== '' ): ?>
                <div class="section-title">
                    <h2><?php echo esc_html( $tour_title ); ?></h2>
                    <p><?php echo esc_html( $tour_subtitle ); ?></p>
                </div>
             <?php  endif; ?>

            <!-- Start of mid section -->
            <?php get_template_part( 'home-page/tours', 'section' );?>

        </div><!--row end-->
    </div>
</div></div>
<!-- End of mid section -->