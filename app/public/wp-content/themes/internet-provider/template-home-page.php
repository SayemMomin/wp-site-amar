<?php
/**
 * The Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Internet Provider
 */

get_header(); ?>

<div id="content">

  <?php
    $hidcatslide = get_theme_mod('internet_provider_hide_categorysec', '1');
    if( $hidcatslide == ''){
  ?>
    <section id="catsliderarea">
      <div class="catwrapslider">
        <div class="owl-carousel">
          <?php if( get_theme_mod('internet_provider_pageboxes',false) ) { ?>
          <?php $queryvar = new WP_Query('cat='.esc_attr(get_theme_mod('internet_provider_pageboxes',true)));
            while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>
              <div class="slidesection"> 
                <?php the_post_thumbnail( 'full' ); ?>
                <div class="slider-box">
                  <?php if ( get_theme_mod('internet_provider_pgboxes_title') != "") { ?>
                    <span><?php echo esc_html(get_theme_mod('internet_provider_pgboxes_title','')); ?></span>
                  <?php } ?>
                  <h3><?php the_title(); ?></h3>
                  <?php
                    $trimexcerpt = get_the_excerpt();
                    $shortexcerpt = wp_trim_words( $trimexcerpt, $num_words = 20 );
                    echo '<p>' . esc_html( $shortexcerpt ) . '</p>'; 
                  ?>
                  <div class="pagemore">
                    <a href="<?php the_permalink(); ?>">
                      <?php esc_html_e('Read More','internet-provider'); ?>
                    </a>
                  </div>
                </div>
              </div>
            <?php endwhile; wp_reset_postdata(); ?>
          <?php } ?>
        </div>
      </div>
      <div class="clear"></div>
    </section>
  <?php } ?>

  <?php
    $internet_provider_hidepageboxes = get_theme_mod('internet_provider_disabled_pgboxes', '1');
    if( $internet_provider_hidepageboxes == ''){
  ?>
    <div id="services_section" class="text-center">
      <div class="container">
        <div class="row">
          <?php for($p=1; $p<4; $p++) { ?>
          <?php if( get_theme_mod('internet_provider_pageboxes'.$p,false)) { ?>
            <?php $internet_provider_querymed = new WP_query('page_id='.esc_attr(get_theme_mod('internet_provider_pageboxes'.$p,true)) ); ?>
              <?php while( $internet_provider_querymed->have_posts() ) : $internet_provider_querymed->the_post(); ?>
              <div class="col-lg-4 col-md-4">
                <div class="pagecontent mb-3">
                  <?php if (has_post_thumbnail() ){ ?>
                    <div class="thumbbx"><?php the_post_thumbnail();?></div>
                  <?php } ?>
                  <div class="text-inner-box p-3">
                    <h4><?php the_title(); ?></h4>
                    <div class="serv-btn">
                      <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','internet-provider'); ?></a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endwhile; wp_reset_postdata(); ?>
          <?php } } ?>
          <div class="clear"></div>
        </div>
      </div>
    </div>
  <?php }?>

  <div class="container">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
  </div>
</div>

<?php get_footer(); ?>