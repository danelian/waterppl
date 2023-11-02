<?php
/*
Template Name: Faq
*/
get_header(); ?>

    <!-- Готово -->
    <section class="faq-head relative z-0 mb-7 max-sm:pt-28 max-sm:mb-32 sm:pt-[5.4rem] lg:pt-0">
      <!-- Swiper -->
      <div class="swiper faqSwiper w-full h-[740px] z-[-2] sm:hidden">
        <div class="swiper-nav relative flex items-center justify-center mb-5">
          <div class="swiper-button-prev relative left-auto right-auto top-auto w-6 h-6 text-[#3B4855] mt-0 hover:text-accent"></div>
          <div class="swiper-pagination relative bottom-auto z-10"></div>
          <div class="swiper-button-next relative left-auto right-auto top-auto w-6 h-6 text-[#3B4855] mt-0 hover:text-accent"></div>
        </div>
        <?php if( have_rows('faq_slider') ): ?>
          <div class="swiper-wrapper">
          <?php while( have_rows('faq_slider') ): the_row(); 
            $img = get_sub_field('img'); ?>
            <div class="swiper-slide">
              <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>">
            </div>
          <?php endwhile; ?>
          </div>
        <?php endif; ?>
      </div>
      <?php if( have_rows('faq_images') ): ?>
        <div class="bg-image relative w-full h-full max-h-[900px] flex z-[-2] max-sm:hidden">
        <?php while( have_rows('faq_images') ): the_row(); 
          $img = get_sub_field('img'); ?>
          <img src="<?php echo esc_url($img['url']); ?>" class="w-1/3 aspect-[64/60] object-cover max-h-fit" alt="<?php echo esc_attr($img['alt']); ?>">
        <?php endwhile; ?>
        </div>
      <?php endif; ?>
    </section>
    <!-- Готово -->
    <section class="mb-32">
      <div class="mx-auto container px-3 sm:px-6 lg:px-16">
        <div class="relative flex flex-wrap max-lg:flex-col justify-center gap-y-5 items-center gap-x-7 lg:justify-between">
          <h2 class="text-6xl text-white font-medium max-lg:text-center text-opacity-5 uppercase lg:text-5xl lg:text-opacity-15 xl:text-9xl 2xl:text-[10rem] max-2xl:leading-none"><?php the_title(); ?></h2>
          <div class="grid gap-y-5 w-full">
            <?php    
            global $post;
            $faq_query = new WP_Query( [
              'posts_per_page' => -1,
              'post_type' => 'faq',
              'order'        => 'ASC',
            ] );
            if ( $faq_query->have_posts() ) {
              while ( $faq_query->have_posts() ) {
                $faq_query->the_post();
                ?>
                  <div  class="accordion grid w-full">
                    <h3>
                      <button type="button" class="flex items-center justify-between w-full p-7 text-lg font-medium text-white border-white border border-opacity-20 backdrop-blur-lg bg-card lg:p-12 2xl:text-xl hover:shadow-myShadow1">
                        <span class="text-left"><?php the_title(); ?></span>
                        <i class="icomoon icon-chevron w-5 h-5 text-lg text-white shrink-0 ml-3 lg:mr-5"></i>
                      </button>
                    </h3>
                    <div class="accordion-content">
                      <div class="p-7 w-full text-lg font-normal text-white text-opacity-80 border-white border border-t-0 border-opacity-20 backdrop-blur-lg bg-card lg:p-12 2xl:text-xl">
                        <?php the_content(); ?>
                      </div>
                    </div>
                  </div>
                <?php 
              }
            } else {}
            wp_reset_postdata();
            ?>
          </div>
          <img src="<?php the_field('faq_decor_second'); ?>" class="absolute object-contain w-16 right-2 -top-8 aspect-[19/27] lg:-top-6 2xl:w-28 2xl:-top-6 2xl:right-4" alt="">
        </div>
      </div>
    </section>
    <!-- Готово -->
    <section class="pb-24 xl:pb-36">
      <div class="mx-auto container px-3 sm:px-6 lg:px-16">
        <div class="relative flex flex-col justify-between flex-wrap gap-y-10 max-lg:items-center lg:flex-row">
          <div class="w-full xl:w-6/12">
            <h2 class="text-3xl leading-8 font-medium text-white uppercase mb-12 max-lg:text-center sm:text-5xl sm:leading-[1.1] lg:text-6xl lg:leading-[1.1]"><?php the_field('faq_cta_title'); ?></h2>
            <div class="group flex items-center flex-col gap-y-5 text-white lg:items-start lg:gap-y-9">
              <div class="text-lg leading-5 max-lg:font-semibold lg:text-3xl"><?php the_field('cta_subtitle', 'option'); ?></div>
              <p class="max-lg:text-center text-lg leading-5 lg:text-xl lg:leading-6"><?php the_field('address', 'option'); ?></p>
              <?php $phone = get_field('phone', 'option');
              if( $phone ): 
                  $phone_url = $phone['url'];
                  $phone_title = $phone['title'];
                  $phone_target = $phone['target'] ? $phone['target'] : '_self';
                  ?>
                  <a href="<?php echo esc_url( $phone_url ); ?>" target="<?php echo esc_attr( $phone_target ); ?>" class="max-lg:text-center text-lg leading-5 hover:text-accent lg:text-xl lg:leading-6"><?php echo esc_html( $phone_title ); ?></a>
              <?php endif; ?>
              <?php $email = get_field('email', 'option');
              if( $email ): 
                  $email_url = $email['url'];
                  $email_title = $email['title'];
                  $email_target = $email['target'] ? $email['target'] : '_self';
                  ?>
                  <a href="<?php echo esc_url( $email_url ); ?>" target="<?php echo esc_attr( $email_target ); ?>" class="max-lg:text-center text-lg leading-5 hover:text-accent lg:text-xl lg:leading-6"><?php echo esc_html( $email_title ); ?></a>
              <?php endif; ?>
              <?php $whatsapp_write = get_field('whatsapp_write', 'option');
              if( $whatsapp_write ): 
                  $whatsapp_write_url = $whatsapp_write['url'];
                  $whatsapp_write_title = $whatsapp_write['title'];
                  $whatsapp_write_target = $whatsapp_write['target'] ? $whatsapp_write['target'] : '_self';
                  ?>
                  <a href="<?php echo esc_url( $whatsapp_write_url ); ?>" target="<?php echo esc_attr( $whatsapp_write_target ); ?>" class="inline-flex items-center justify-center gap-x-6 py-6 px-8 text-lg leading-5 font-medium text-white rounded-full border-white border border-opacity-20 backdrop-blur-lg bg-card max-lg:order-1 max-lg:mt-4 lg:text-xl lg:leading-6 hover:shadow-myShadow1"><?php echo esc_html( $whatsapp_write_title ); ?><i class="icomoon icon-whatsapp text-2xl leading-none font-normal"></i></a>
              <?php endif; ?>
            </div>
          </div>

          <div class="w-full p-7 text-white border-white border border-opacity-20 backdrop-blur-lg bg-card h-fit lg:p-12 xl:w-5/12">
            <?php echo do_shortcode('[contact-form-7 id="175" title="Form Faq"]'); ?>
          </div>
        </div>
      </div>
    </section>

<?php get_footer(); ?>