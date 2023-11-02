<?php
/*
Template Name: Trips
*/
get_header(); ?>

    <!-- Готово -->
    <section class="category relative z-0 bg-cover bg-no-repeat bg-center pt-32 pb-16 mb-24 sm:mb-32 min-h-[680px] sm:min-h-[90vh] lg:pt-[230px] lg:pb-48" style="background-image: url(<?php the_field('trips_bg'); ?>);">
      <div class="mx-auto container px-3 sm:px-6 lg:px-16">
        <div class="content max-lg:flex max-lg:flex-col max-lg:items-center max-lg:justify-center">
          <h1 class="text-white uppercase font-medium max-w-6xl text-3xl leading-9 mb-7 max-lg:mb-60 max-lg:text-center md:text-6xl md:leading-[66px] lg:mb-10 2xl:text-8xl 2xl:leading-[100px]"><?php the_field('trips_title'); ?></h1>
          <div class="max-lg:text-center text-lg leading-6 text-white max-w-2xl max-lg:order-2 2xl:text-xl 2xl:leading-8 lg:mb-16"><?php the_field('trips_text'); ?></div>
        </div>
      </div>
    </section>
    <!-- Готово -->
    <section class="standartbl mb-32">
      <div class="mx-auto container px-3 sm:px-6 lg:px-16">
        <div class="flex max-lg:flex-col max-lg:justify-center gap-y-5 items-center gap-x-7 mb-6 lg:items-end">
          <h2 class="text-6xl text-white font-medium max-lg:text-center text-opacity-5 uppercase lg:text-5xl lg:text-opacity-15 xl:text-9xl 2xl:text-[10rem] max-2xl:leading-none"><?php the_field('tripsbl_title'); ?></h2>
          <div class="text-lg leading-6 text-white max-w-3xl mb-3 max-lg:text-center 2xl:text-xl 2xl:leading-8 lg:max-w-[80%] 2xl:max-w-[40%]"><?php the_field('tripsbl_text'); ?></div>
        </div>
        <div class="grid grid-cols-1 gap-x-5 gap-y-10 md:grid-cols-2 xl:grid-cols-3">
          <?php 
            $posty_tripov = get_field('posty_tripov', 'option');
            if( $posty_tripov ): ?>
              <?php foreach( $posty_tripov as $post): // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
                  <?php setup_postdata($post); ?>
                <div class="card-wrapper relative">
                  <a href="<?php the_permalink(); ?>" class="z-0 card transition-all flex flex-col justify-between relative w-full py-7 px-9 min-h-[540px] lg:justify-end lg:p-12 lg:min-h-[660px] 3xl:min-h-[740px]">
                    <div class="card-content z-10 mb-7">
                      <h3 class="max-lg:text-center text-xl text-white font-medium max-sm:text-center mb-5 lg:mb-11"><?php the_field('trip_title'); ?></h3>
                      <div class="max-lg:text-center text-lg leading-6 text-white text-opacity-80 lg:mb-9 2xl:text-xl lg:leading-7"><?php the_field('trip_descr'); ?></div>
                    </div>
                    <div class="card-img" style="background-image: url(<?php the_field('trip_card_img'); ?>);"></div>
                  </a>
                  <div class="flex items-center justify-between w-full absolute left-12 bottom-12 max-w-[calc(100%-6rem)] max-lg:justify-center max-lg:hidden">
                      <?php $booknow_link = get_field('booknow_link', 'option');
                      if( $booknow_link ): 
                          $booknow_link_url = $booknow_link['url'];
                          $booknow_link_title = $booknow_link['title'];
                          $booknow_link_target = $booknow_link['target'] ? $booknow_link['target'] : '_self';
                          ?>
                          <a href="<?php echo esc_url( $booknow_link_url ); ?>" target="<?php echo esc_attr( $booknow_link_target ); ?>" class="inline-flex gap-x-5 text-xl font-bold text-white hover:text-accent max-lg:hidden"><?php echo esc_html( $booknow_link_title ); ?><i class="icomoon icon-whatsapp text-2xl leading-none font-normal"></i></a>
                      <?php endif; ?>
                  </div>
                  <div class="flex justify-center w-full h-20 border border-t-0 border-white border-opacity-10 rounded-b-[1.25rem] lg:hidden">
                    <div class="flex items-center justify-center w-1/2 text-xl font-bold text-white even:border-l even:border-l-white even:border-opacity-10">
                      <a href="<?php echo esc_url( $booknow_link_url ); ?>" target="<?php echo esc_attr( $booknow_link_target ); ?>" class="inline-flex gap-x-5 text-xl font-bold text-white hover:text-accent"><?php echo esc_html( $booknow_link_title ); ?> <i class="icomoon icon-whatsapp text-2xl leading-none font-normal"></i></a>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
              <?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
          <?php endif;
          ?>
        </div>
      </div>
    </section>
    <!-- Готово -->
    <section class="ba z-0 relative pb-24 xl:pb-36">
      <div class="mx-auto container px-3 sm:px-6 lg:px-16">
        <div class="relative flex flex-col justify-between flex-wrap gap-y-10 max-lg:items-center lg:flex-row">
          <div class="w-full xl:w-6/12">
            <h2 class="text-3xl leading-8 font-medium text-white uppercase mb-12 max-lg:text-center sm:text-5xl sm:leading-[1.1] lg:text-6xl lg:leading-[1.1]"><?php the_field('trips_cta_title') ?></h2>
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
          <div class="w-full p-7 text-white border-white border border-opacity-20 backdrop-blur-lg bg-card h-fit lg:p-12 lg:pb-20 xl:w-5/12">
            <?php echo do_shortcode('[contact-form-7 id="315" title="Form Trips"]'); ?>
          </div>
        </div>
      </div>
    </section>


<?php get_footer(); ?>