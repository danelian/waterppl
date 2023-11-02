<?php get_header(); ?>

    <!-- Готово -->
    <section class="relative z-0 pt-32 pb-16 mb-24 sm:mb-32 min-h-[680px] sm:min-h-[90vh] lg:pt-[230px]">
      <div class="mx-auto container px-3 sm:px-6 lg:px-16">
        <div class="content max-lg:flex max-lg:flex-col max-lg:items-center max-lg:justify-center">
          <h1 class="text-white uppercase font-medium max-w-6xl text-3xl leading-9 mb-7 max-lg:mb-60 max-lg:text-center md:text-6xl md:leading-[66px] lg:mb-10 2xl:text-8xl 2xl:leading-[100px]"><?php the_field('course_title'); ?></h1>
          <div class="flex items-end gap-x-16 max-lg:order-2">
            <div class="grid gap-y-5 max-lg:text-center text-lg leading-6 text-white max-w-2xl lg:text-xl lg:leading-8"><?php the_field('course_text'); ?></div>
            <?php
            $course_video = get_field('course_video');
            if( $course_video ): ?>
              <a data-fancybox href="<?php echo $course_video ?>" class="inline-flex items-center justify-center gap-x-6 p-6 text-lg leading-5 font-medium text-white rounded-full border-white border border-opacity-20 backdrop-blur-lg bg-card max-lg:order-1 lg:text-xl lg:leading-6 hover:shadow-myShadow1 max-lg:hidden"><i class="icomoon icon-youtube text-2xl leading-none font-normal"></i></a>
            <?php endif; ?>
          </div>
          <?php $booknow_link = get_field('booknow_link', 'option');
          if( $booknow_link ): 
              $booknow_link_url = $booknow_link['url'];
              $booknow_link_title = $booknow_link['title'];
              $booknow_link_target = $booknow_link['target'] ? $booknow_link['target'] : '_self';
              ?>
              <div class="flex gap-x-5 sm:gap-x-10 max-lg:order-1 max-lg:mb-7">
                <a href="<?php echo esc_url( $booknow_link_url ); ?>" target="<?php echo esc_attr( $booknow_link_target ); ?>" class="inline-flex items-center justify-center gap-x-6 py-6 px-8 text-lg leading-5 font-medium text-white rounded-full border-white border border-opacity-20 bg-card max-lg:backdrop-blur-lg lg:text-main lg:border-opacity-50 lg:bg-lightGrey lg:text-xl lg:leading-6 hover:bg-accent hover:border-accent lg:hidden"><?php echo esc_html( $booknow_link_title ); ?><i class="icomoon icon-whatsapp text-2xl leading-none font-normal"></i></a>
              </div>
          <?php endif; ?>
        </div>
      </div>
    </section>

    <!-- Почти Готово -->
    <?php if( have_rows('course_grid') ): ?>
    <section class="coursebl relative z-0 pt-0 mb-32">
      <div class="mx-auto relative container px-3 sm:px-6 lg:px-16">
        <div class="w-full pt-8 pb-12 px-6 max-lg:flex max-lg:flex-col max-lg:justify-center border-white border border-opacity-20 backdrop-blur-lg bg-card lg:p-14">
          <div class="course-infoitems flex w-full flex-wrap gap-y-12">
          <?php while( have_rows('course_grid') ): the_row(); 
            $title = get_sub_field('title');
            $content = get_sub_field('content');
            $nav = get_sub_field('course_nav');
            ?>
            <div class="w-full text-xl text-white xl:even:border-l xl:even:border-l-white xl:even:border-opacity-50 xl:odd:pr-14 xl:even:pl-14 xl:w-1/2">
              <?php if( $title ): ?>
                <h3 class="text-xl leading-8 font-medium text-white uppercase mb-5 sm:text-3xl sm:leading-[1.1] lg:mb-10 lg:text-5xl lg:leading-[1.1]"><?php echo $title; ?></h3>
              <?php endif; ?>
              <?php if($content): ?>
                <div class="grid gap-y-6 text-lg leading-6 text-white max-w-2xl lg:text-xl lg:leading-8"><?php echo $content; ?></div>
              <?php endif; ?>
              <?php if( $nav ): ?>
                <div class="flex items-center flex-wrap gap-y-6 gap-x-11 mt-10 lg:mt-14 max-lg:justify-center">
                  <div class="flex items-center w-fit flex-wrap border border-white border-opacity-50 backdrop-blur-3xl bg-card">
                    <div class="flex items-center justify-center text-xl text-white even:border-l even:border-l-white even:border-opacity-50 py-4 px-6 lg:text-3xl lg:py-6 lg:px-9"><?php the_field('course_time'); ?></div>
                    <div class="flex items-center justify-center text-xl text-white even:border-l even:border-l-white even:border-opacity-50 py-4 px-6 lg:text-3xl lg:py-6 lg:px-9"><?php the_field('course_price'); ?></div>
                  </div>
                  <?php $booknow_link = get_field('booknow_link', 'option');
                  if( $booknow_link ): 
                      $booknow_link_url = $booknow_link['url'];
                      $booknow_link_title = $booknow_link['title'];
                      $booknow_link_target = $booknow_link['target'] ? $booknow_link['target'] : '_self';
                      ?>
                      <a href="<?php echo esc_url( $booknow_link_url ); ?>" target="<?php echo esc_attr( $booknow_link_target ); ?>" class="inline-flex items-center justify-center gap-x-6 py-6 px-8 text-lg leading-5 font-medium text-white rounded-full border-white border border-opacity-20 bg-card max-lg:backdrop-blur-lg lg:text-main lg:border-opacity-50 lg:bg-lightGrey lg:text-xl lg:leading-6 hover:bg-accent hover:border-accent max-lg:hidden"><?php echo esc_html( $booknow_link_title ); ?><i class="icomoon icon-whatsapp text-2xl leading-none font-normal"></i></a>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
            </div>
          <?php endwhile; ?>
          </div>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <!-- Готово -->
    <?php if( have_rows('course_faq') ): ?>
    <section class="mb-32">
      <div class="mx-auto container px-3 sm:px-6 lg:px-16">
        <div class="grid gap-y-5 w-full">
        <?php while( have_rows('course_faq') ): the_row(); ?>
          <div  class="accordion grid w-full">
            <h3>
              <button type="button" class="flex items-center justify-between w-full p-7 text-lg font-medium text-white border-white border border-opacity-20 backdrop-blur-lg bg-card lg:p-12 lg:text-xl hover:shadow-myShadow1"><span class="text-left"><?php the_sub_field('question'); ?></span>
                <i class="icomoon icon-chevron w-5 h-5 text-lg text-white shrink-0 ml-3 lg:mr-5"></i>
              </button>
            </h3>
            <div class="accordion-content">
              <div class="p-7 w-full text-lg font-normal text-white text-opacity-80 border-white border border-t-0 border-opacity-20 backdrop-blur-lg bg-card lg:p-12 lg:text-xl"><?php the_sub_field('answer'); ?></div>
            </div>
          </div>
        <?php endwhile; ?>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <!-- Готово -->
    <?php if(have_rows('course_slider')) : ?>
    <section class="course-gallery bg-main relative z-10 pb-32">
      <div class="mx-auto container px-3 sm:px-6 lg:px-16">
        <div class="swiper-nav relative flex items-center justify-center mb-5 lg:ml-auto lg:w-fit">
          <div class="swiper-button-prev relative left-auto right-auto top-auto w-6 h-6 text-[#3B4855] mt-0 hover:text-accent lg:hidden"></div>
          <div class="swiper-pagination relative bottom-auto z-10"></div>
          <div class="swiper-button-next relative left-auto right-auto top-auto w-6 h-6 text-[#3B4855] mt-0 hover:text-accent lg:hidden"></div>
        </div>
        <!-- Swiper -->
        <div class="swiper courseGallerySwiper w-full h-[750px] z-[0]">
          <div class="swiper-wrapper">
            <?php while(have_rows('course_slider')) : the_row(); ?>
            <?php $img = get_sub_field('img'); ?>
              <div class="swiper-slide">
                <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>">
              </div>
            <?php endwhile; ?>
          </div>
          <div class="second-button-prev swiper-button-prev z-50 relative left-auto right-auto top-auto w-6 h-6 text-[#3B4855] mt-0 hover:shadow-myShadow1 lg:w-[74px] lg:h-[74px] lg:border-white lg:border lg:border-opacity-20 lg:rounded-full lg:backdrop-blur-lg lg:bg-card lg:text-white lg:absolute lg:left-7 lg:top-2/4 lg:-mt-10 max-lg:hidden"></div>
          <div class="second-button-next swiper-button-next z-50 relative left-auto right-auto top-auto w-6 h-6 text-[#3B4855] mt-0 hover:shadow-myShadow1 lg:w-[74px] lg:h-[74px] lg:border-white lg:border lg:border-opacity-20 lg:rounded-full lg:backdrop-blur-lg lg:bg-card lg:text-white lg:absolute lg:right-7 lg:top-2/4 lg:-mt-10 max-lg:hidden"></div>
        </div>
      </div>
    </section>
    <?php else : endif; ?>

    <section class="ba z-0 relative pb-24 bg-main xl:pb-36">
      <div class="mx-auto container px-3 sm:px-6 lg:px-16">
        <div class="relative flex flex-col justify-between flex-wrap gap-y-10 max-lg:items-center lg:flex-row">
          <div class="w-full xl:w-6/12">
            <h2 class="text-3xl leading-8 font-medium text-white uppercase mb-12 max-lg:text-center sm:text-5xl sm:leading-[1.1] lg:text-6xl lg:leading-[1.1]"><?php the_field('course_cta_title'); ?></h2>
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
            <?php echo do_shortcode('[contact-form-7 id="317" title="Form Course"]'); ?>
          </div>
        </div>
      </div>
    </section>

<?php get_footer(); ?>