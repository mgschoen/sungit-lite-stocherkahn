<?php

// Enqueue styles as suggested in https://codex.wordpress.org/Child_Themes
function my_theme_enqueue_styles() {

    $parent_style = array( 'sungit-lite-fonts', 'sungit-lite-style', 'sungit-lite-allstyles' );

    //wp_enqueue_style( $parent_style[2], get_template_directory_uri() . '/assets/css/sungit-lite.css' );
    wp_enqueue_style( 'sungit-lite-stocherkahn-style',
        get_stylesheet_directory_uri() . '/style.css',
        $parent_style,
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

// Extend social icons template with E-Mail
function sungit_lite_social_icons(){
    $sungit_lite_theme_options = sungit_lite_theme_options();
    $facebook = $sungit_lite_theme_options['facebook'];
    $gplus = $sungit_lite_theme_options['gplus'];
    $linkedin = $sungit_lite_theme_options['linkedin'];
    $twitter = $sungit_lite_theme_options['twitter'];
    $instagram = $sungit_lite_theme_options['instagram'];
    $tumblr = $sungit_lite_theme_options['tumblr'];
    $pinterest = $sungit_lite_theme_options['pinterest'];
    $email = $sungit_lite_theme_options['email'];
    ob_start();
            if(!empty($facebook)): ?>
                 <li><a href="<?php echo esc_url($facebook); ?>" title=<?php echo esc_attr__("Follow us on Facebook", "sungit-lite");?> class="fb-link"><span class="fa fa-facebook"></span></a></li>
            <?php endif;
            if(!empty($gplus)): ?>
                <li><a href="<?php echo esc_url($gplus); ?>" title=<?php echo esc_attr__("Follow us on Google Plus", "sungit-lite");?> class="gp-link"><span class="fa fa-google-plus"></span></a></li>
            <?php endif;
            if(!empty($linkedin)):?>
                <li><a href="<?php echo esc_url($linkedin); ?>" title=<?php echo esc_attr__("Follow us on Linkedin", "sungit-lite");?> class="ln-link"><span class="fa fa-linkedin"></span></a></li>
            <?php endif;
            if(!empty($twitter)):?>
                <li><a href="<?php echo esc_url($twitter); ?>" title=<?php echo esc_attr__("Follow us on Twitter", "sungit-lite");?> class="tw-link"><span class="fa fa-twitter"></span></a></li>
            <?php endif;
            if(!empty($instagram)):?>
                <li><a href="<?php echo esc_url($instagram); ?>" title=<?php echo esc_attr__("Follow us on Instagram", "sungit-lite");?> class="in-link"><span class="fa fa-instagram"></span></a></li>
            <?php endif;
            if(!empty($tumblr)):?>
                <li><a href="<?php echo esc_url($tumblr); ?>" title=<?php echo esc_attr__("Follow us on Tumblr", "sungit-lite");?> class="ln-link"><span class="fa fa-tumblr"></span></a></li>
            <?php endif;
            if(!empty($pinterest)):?>
                <li><a href="<?php echo esc_url($pinterest); ?>" title=<?php echo esc_attr__("Follow us on Pinterest", "sungit-lite");?> class="in-link"><span class="fa fa-pinterest"></span></a></li>
            <?php endif;
            if(!empty($email)):?>
                 <li><a href=<?php echo '"mailto:' . sanitize_email($email) . '"'; ?> title="Kontaktiere uns per Mail" class="in-link"><?php echo sanitize_email($email) ?></a></li>
             <?php endif;
    echo ob_get_clean();

}
add_action( 'sungit_lite_social_function', 'sungit_lite_social_icons' );

// Add E-Mail field to customizer social options
if ($wp_customize) {
  $wp_customize->add_setting('sungit_lite_option[email]',array(
      'type'              => 'option',
      'default'           => '',
      'sanitize_callback' => 'sanitize_email',
      'capability'        => 'edit_theme_options'
  ));
  $wp_customize->add_control('email',array(
      'label'    => __('E-Mail','sungit-lite'),
      'section'  => 'sungit_lite_social_option',
      'settings' => 'sungit_lite_option[email]',
      'type'     => 'text'
      ));
}

?>