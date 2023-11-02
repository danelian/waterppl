<?php 
/*
Template Name: Home
*/
get_header(); ?>
    <!-- Готово -->
    <section class="hero relative z-0 pt-32 pb-16 mb-24 sm:mb-32 min-h-[680px] sm:min-h-[90vh] lg:pt-[230px] lg:pb-48">
      <div class="mx-auto container px-3 sm:px-6 lg:px-16">
        <div class="content max-lg:flex max-lg:flex-col max-lg:items-center max-lg:justify-center">
          <h1 class="text-white uppercase font-medium max-w-[1440px] text-3xl leading-9 mb-7 max-lg:mb-64 max-lg:text-center md:text-6xl md:leading-[66px] 2xl:text-8xl 2xl:leading-[100px]"><?php the_field('hero_title'); ?></h1>
          <div class="max-lg:text-center text-lg leading-6 text-white max-w-2xl 2xl:text-xl 2xl:leading-8 lg:mb-14"><?php the_field('hero_text'); ?></div>
        </div>
      </div>
      <div class="swiper-nav relative flex items-center justify-center max-lg:hidden lg:ml-auto lg:absolute lg:right-16 lg:bottom-12">
        <div class="swiper-pagination relative bottom-auto z-10"></div>
      </div>
      <?php
      // проверяем есть ли данные в гибком содержании
      if( have_rows('hero_choice') ):
        while ( have_rows('hero_choice') ) : the_row();
          if( get_row_layout() == 'video' ): ?>
            <video class="hero-video" src="<?php the_sub_field('hero_video') ?>" autoplay muted loop></video>
          <?php elseif( get_row_layout() == 'slider' ): ?>
            <div class="swiper heroSwiper absolute left-0 top-0 w-full h-full z-[-2] max-lg:hidden">
              <div class="swiper-wrapper">
                <?php while( have_rows('hero_slider') ) : the_row(); ?>
                  <div class="swiper-slide"><img src="<?php the_sub_field('img'); ?>" alt=""></div>
                <?php endwhile; ?>
              </div>
            </div>
          <?php endif;
        endwhile;
      else : endif; ?>
      <div class="bg-image absolute left-0 top-0 w-full h-full object-cover z-[-2] lg:hidden">
        <img src="<?php the_field('hero_mob_bg'); ?>" class="w-full h-full object-cover" alt="">
      </div>
    </section>
    <!-- Готово -->
    <section class="aboutbl mb-32 bg-no-repeat max-lg:bg-200 lg:bg-center lg:bg-contain" style="background-image: url(<?php the_field('aboutbl_bg'); ?>);">
      <div class="mx-auto container px-3 sm:px-6 lg:px-16">
        <h2 class="text-6xl text-white font-medium text-center text-opacity-5 uppercase mb-8 lg:hidden"><?php the_field('aboutbl_title'); ?></h2>
        <div class="flex items-end flex-wrap gap-y-32 -mx-3 sm:-mx-6 lg:gap-x-10 xl:gap-x-14 lg:flex-nowrap lg:-mx-0 2xl:gap-x-24">
          <div class="about-card relative w-fullMobile sm:w-fullTablet lg:basis-2/5">
            <div class="max-lg:absolute max-sm:left-3 max-sm:right-3 max-lg:p-8 max-lg:left-6 max-lg:right-6 max-lg:-bottom-10 max-lg:border-white max-lg:border max-lg:border-opacity-20 max-lg:backdrop-blur-lg max-lg:bg-card max-lg:text-center text-lg leading-6 text-white 2xl:text-xl 2xl:leading-8 lg:mb-7">
              <?php the_field('aboutbl_text_left'); ?>
            </div>
            <?php $aboutbl_img_left = get_field('aboutbl_img_left');
            if ($aboutbl_img_left) : ?>
              <img src="<?php echo esc_url($aboutbl_img_left['url']); ?>" 
                class="w-full max-sm:aspect-[39/53] sm:aspect-square object-cover lg:aspect-[66/62]"
                alt="<?php echo esc_attr($aboutbl_img_left['alt']); ?>">
            <?php endif; ?>
          </div>
          <div class="about-card relative w-fullMobile sm:w-fullTablet lg:basis-3/5">
            <h2 class="hidden text-white font-medium uppercase mb-8 lg:text-5xl lg:text-opacity-15 lg:block xl:text-7xl 2xl:text-[10rem]"><?php the_field('aboutbl_title'); ?></h2>
            <div class="max-lg:absolute max-sm:left-3 max-sm:right-3 max-lg:left-6 max-lg:right-6 max-lg:top-1/2 max-lg:-translate-y-1/2 max-lg:text-center text-lg leading-6 text-white 2xl:text-xl 2xl:leading-8 lg:mb-14 lg:max-w-4xl">
              <?php the_field('aboutbl_text_right'); ?>
            </div>
            <?php $aboutbl_img_right = get_field('aboutbl_img_right');
            if ($aboutbl_img_right) : ?>
              <img src="<?php echo esc_url($aboutbl_img_right['url']); ?>" 
                class="w-full max-sm:aspect-[39/53] sm:aspect-square object-cover lg:aspect-[103/50]" 
                alt="<?php echo esc_attr($aboutbl_img_right['alt']); ?>">
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>
    <!-- Готово -->
    <section class="z-0 about-diving relative pt-4 pb-20 mb-32 bg-no-repeat bg-center bg-cover lg:py-20 2xl:py-32" style="background-image: url('<?php the_field('about_diving_bg'); ?>');">
      <div class="z-10 relative mx-auto container px-3 sm:px-6 lg:px-16">
        <img src="<?php the_field('about_diving_decor'); ?>" class="hidden absolute w-32 h-32 lg:block md:w-42 md:h-42 max-lg:left-1/2 max-lg:-translate-x-1/2 max-lg:-top-48 lg:right-16 lg:bottom-0 xl:w-52 xl:h-52" alt="">
        <div class="py-8 px-6 border-white border border-opacity-20 backdrop-blur-lg bg-card lg:p-12 lg:w-8/12 2xl:w-5/12">
          <h2 class="text-2xl text-white font-medium max-lg:text-center mb-8 lg:mb-10"><?php the_field('about_diving_title'); ?></h2>
          <div class="grid gap-y-7 max-lg:text-center text-lg leading-6 text-white text-opacity-60 2xl:text-xl 2xl:leading-8">
            <?php the_field('about_diving_text'); ?>
          </div>
        </div>
      </div>
    </section>
    <!-- Готово -->
    <section class="standartbl mb-32">
      <div class="mx-auto container px-3 sm:px-6 lg:px-16">
        <div class="flex max-lg:flex-col max-lg:justify-center gap-y-5 items-center gap-x-7 mb-6 lg:items-end">
          <h2 class="text-6xl text-white font-medium max-lg:text-center text-opacity-5 uppercase lg:text-5xl lg:text-opacity-15 xl:text-9xl 2xl:text-[10rem] max-2xl:leading-none"><?php the_field('tripsbll_title'); ?></h2>
          <div class="text-lg leading-6 text-white max-w-3xl mb-3 max-lg:text-center 2xl:text-xl 2xl:leading-8 lg:max-w-[80%] 2xl:max-w-[40%]"><?php the_field('tripsbll_text'); ?></div>
          <div class="trips-swiper-nav swiper-nav relative flex items-center justify-center lg:ml-auto">
            <div class="swiper-button-prev relative left-auto right-auto top-auto w-6 h-6 text-[#3B4855] mt-0 hover:text-accent lg:hidden"></div>
            <div class="swiper-pagination relative bottom-auto"></div>
            <div class="swiper-button-next relative left-auto right-auto top-auto w-6 h-6 text-[#3B4855] mt-0 hover:text-accent lg:hidden"></div>
          </div>
        </div>
        <!-- Swiper -->
        <div class="swiper tripsSwiper">
          <div class="swiper-wrapper">
          <?php 
            $posty_tripov = get_field('posty_tripov', 'option');
            if( $posty_tripov ): ?>
              <?php foreach( $posty_tripov as $post): // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
                  <?php setup_postdata($post); ?>
              <div class="swiper-slide">
                <div class="card-wrapper relative">
                  <a href="<?php the_permalink(); ?>" class="z-0 card transition-all flex flex-col justify-end relative w-full py-7 px-9 min-h-[540px] lg:p-12 lg:min-h-[660px] 3xl:min-h-[740px]">
                    <div class="card-content z-10 mb-7">
                      <h3 class="max-lg:text-center text-xl text-white font-medium max-sm:text-center mb-5 lg:mb-11"><?php the_field('trip_title'); ?></h3>
                      <div class="max-lg:text-center line-clamp-4 text-lg leading-6 text-white text-opacity-80 lg:mb-9 2xl:text-xl lg:leading-7"><?php the_field('trip_descr'); ?></div>
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
              </div>
              <?php endforeach; ?>
              <?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
          <?php endif;
          ?>
          </div>
        </div>
      </div>
    </section>
    <!-- Готово -->
    <section class="standartbl mb-32">
      <div class="mx-auto container px-3 sm:px-6 lg:px-16">
        <div class="flex max-lg:flex-col max-lg:justify-center gap-y-5 items-center gap-x-7 mb-6 lg:items-end">
          <h2 class="text-6xl text-white font-medium max-lg:text-center text-opacity-5 uppercase lg:text-5xl lg:text-opacity-15 xl:text-9xl 2xl:text-[10rem] max-2xl:leading-none"><?php the_field('coursebll_title'); ?></h2>
          <div class="courses-swiper-nav swiper-nav relative flex items-center justify-center lg:ml-auto">
            <div class="swiper-button-prev relative left-auto right-auto top-auto w-6 h-6 text-[#3B4855] mt-0 hover:text-accent lg:hidden"></div>
            <div class="swiper-pagination relative bottom-auto"></div>
            <div class="swiper-button-next relative left-auto right-auto top-auto w-6 h-6 text-[#3B4855] mt-0 hover:text-accent lg:hidden"></div>
          </div>
        </div>
        <!-- Swiper -->
        <div class="swiper coursesSwiper">
          <div class="swiper-wrapper">
          <?php 
            $posty_kursov = get_field('posty_kursov', 'option');
            if( $posty_kursov ): ?>
              <?php foreach( $posty_kursov as $post): // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
                  <?php setup_postdata($post); ?>
              <div class="swiper-slide">
                <div class="card-wrapper relative">
                  <a href="<?php the_permalink(); ?>" class="z-0 card transition-all flex flex-col justify-end relative w-full py-7 px-9 min-h-[540px] lg:p-12 lg:min-h-[660px] 3xl:min-h-[740px]">
                    <div class="card-content z-10 mb-7">
                      <h3 class="max-lg:text-center text-xl text-white font-medium max-sm:text-center mb-5 lg:mb-11"><?php the_field('course_title'); ?></h3>
                      <div class="max-lg:text-center line-clamp-4 text-lg leading-6 text-white text-opacity-80 lg:mb-9 2xl:text-xl lg:leading-7"><?php the_field('course_descr'); ?></div>
                    </div>
                    <div class="card-img" style="background-image: url(<?php the_field('course_card_img'); ?>);"></div>
                  </a>
                  <div class="flex items-center justify-between w-full absolute left-12 bottom-12 max-w-[calc(100%-6rem)] max-lg:justify-center max-lg:hidden">
                    <div class="text-xl font-bold text-white"><?php the_field('course_price'); ?></div>
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
                    <div class="flex items-center justify-center w-1/2 text-xl font-bold text-white even:border-l even:border-l-white even:border-opacity-10"><?php the_field('course_price'); ?></div>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
              <?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
          <?php endif;
          ?>
          </div>
        </div>
      </div>
    </section>
    <!-- Готово -->
    <section class="team z-0 max-lg:mb-32 max-lg:bg-none bg-cover bg-center lg:relative lg:pt-48 lg:pb-80 lg:mb-16" style="background-image: url(<?php the_field('team_bg'); ?>);">
      <div class="mx-auto container px-3 sm:px-6 lg:px-16">
        <h2 class="text-6xl text-white font-medium mb-16 max-lg:text-center text-opacity-5 uppercase lg:text-5xl lg:text-opacity-15 lg:mb-4 xl:text-9xl 2xl:text-[10rem] max-2xl:leading-none"><?php the_field('team_title'); ?></h2>
        <?php
        $team_cards = get_field('team_cards');
        if( $team_cards ): ?>
            <div class="grid gap-5 md:grid-cols-2">
            <?php foreach( $team_cards as $post ): 
                setup_postdata($post); ?>
                  <div class="py-8 pl-7 pr-4 text-white border-white border border-opacity-20 backdrop-blur-lg bg-card lg:p-10">
                    <div class="flex items-center w-full mb-7 lg:mb-10 xl:mb-12">
                      <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" class="w-20 h-20 mr-7 aspect-square rounded-full lg:w-36 lg:h-36 lg:mr-11" alt="<?php the_title(); ?>">
                      <div class="flex flex-col">
                        <h3 class="text-xl leading-6 font-medium text-white mb-2 lg:mb-5"><?php the_title(); ?></h3>
                        <div class="text-base leading-4 text-white text-opacity-80 md:text-xl md:leading-7">
                          <?php if( has_excerpt() ){ the_excerpt(); } else {} ?>
                        </div>
                      </div>
                    </div>
                    <div class="grid gap-x-7 text-lg leading-6 text-white text-opacity-60 lg:max-w-3xl 2xl:text-xl lg:leading-7">
                      <?php the_content(); ?>
                    </div>
                  </div>
            <?php endforeach; ?>
            </div>
            <?php
            wp_reset_postdata(); ?>
        <?php endif; ?>
      </div>
    </section>
    <!-- Готово -->
    <section class="mb-32">
      <div class="mx-auto container px-3 sm:px-6 lg:px-16">
        <div class="relative flex flex-wrap max-lg:flex-col justify-center gap-y-5 items-center gap-x-7 lg:justify-between">
          <h2 class="text-6xl text-white font-medium max-lg:text-center text-opacity-5 uppercase lg:text-5xl lg:text-opacity-15 xl:text-9xl 2xl:text-[10rem] max-2xl:leading-none"><?php the_field('faq_title'); ?></h2>
          <?php 
          $faq_link = get_field('faq_link');
          if( $faq_link ): 
              $faq_link_url = $faq_link['url'];
              $faq_link_title = $faq_link['title'];
              ?>
              <a href="<?php echo esc_url($faq_link_url); ?>" class="inline-flex items-center justify-center py-6 px-8 text-lg leading-5 font-medium text-white rounded-full border-white border border-opacity-20 backdrop-blur-lg bg-card max-lg:order-1 max-lg:mt-3 lg:text-xl lg:leading-6 hover:shadow-myShadow1"><?php echo esc_html($faq_link_title); ?></a>
          <?php endif; ?>
          <div class="grid gap-y-5 w-full">
            <?php    
            global $post;
            $faq_query = new WP_Query( [
              'posts_per_page' => 5,
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
          <img src="<?php the_field('faq_decor'); ?>" class="absolute object-contain w-20 right-2 -top-14 aspect-[19/27] lg:w-48 lg:right-16 lg:-top-72" alt="">
        </div>
      </div>
    </section>
    <!-- Готово -->
    <section class="reviews mb-32 bg-center bg-no-repeat" style="background-image: url(<?php the_field('reviews_bg'); ?>);">
      <div class="mx-auto container px-3 sm:px-6 lg:px-16">
        <div class="relative flex flex-wrap max-lg:flex-col justify-center gap-y-5 items-center gap-x-7 lg:justify-between">
          <h2 class="text-6xl text-white font-medium max-lg:text-center text-opacity-5 uppercase lg:text-5xl lg:text-opacity-15 xl:text-9xl 2xl:text-[10rem] max-2xl:leading-none"><?php the_field('reviews_title'); ?></h2>
          <?php 
          $reviews_link = get_field('reviews_link');
          if( $reviews_link ): 
              $reviews_link_url = $reviews_link['url'];
              $reviews_link_title = $reviews_link['title'];
              ?>
              <a href="<?php echo esc_url($reviews_link_url); ?>" class="inline-flex items-center justify-center gap-x-6 py-6 px-8 text-lg leading-5 font-medium text-white rounded-full border-white border border-opacity-20 backdrop-blur-lg bg-card max-lg:order-1 max-lg:mt-3 lg:text-xl lg:leading-6 hover:shadow-myShadow1"><?php echo esc_html($reviews_link_title); ?><img src="<?php echo get_template_directory_uri() ?>/src/img/tripadvisor-logo.png" class="w-9 h-6" alt=""></a>
          <?php endif; ?>
        <?php
        $reviews_cards = get_field('reviews_cards');
        if( $reviews_cards ): ?>
            <div class="grid gap-5 w-full md:grid-cols-2 xl:grid-cols-3">
            <?php foreach( $reviews_cards as $post ): 
                setup_postdata($post); ?>
                <a href="<?php the_field('review_link'); ?>" target="_blank" class="flex flex-col py-8 pl-7 pr-4 text-white border-white border border-opacity-20 backdrop-blur-lg bg-card lg:min-h-[295px] lg:p-10 hover:shadow-myShadow1">
                  <div class="line-clamp-4 text-lg leading-6 text-white text-opacity-80 mb-10 max-sm:text-center lg:text-xl lg:leading-7 lg:mb-14"><?php the_content(); ?></div>
                  <div class="flex items-center justify-between gap-x-5 w-full mt-auto">
                    <h3 class="text-lg leading-5 font-medium text-white lg:text-xl lg:leading-6"><?php the_title(); ?></h3>
                    <div class="rating flex items-center justify-center">
                      <div class="stars relative bg-no-repeat bg-[auto_100%] w-[106px] h-4 sm:w-40 sm:h-6" style="background-image: url(<?php echo get_template_directory_uri(); ?>/src/img/star-off.svg);">
                        <div class="progress absolute top-0 left-0 bg-no-repeat bg-[auto_100%] h-4 sm:h-6" style="background-image: url(<?php echo get_template_directory_uri(); ?>/src/img/star-on.svg);">
                      </div>
                    </div>
                      <div class="rating-agregate hidden"><?php the_field('review_rating'); ?></div>
                    </div>
                  </div>
                </a>
            <?php endforeach; ?>
            </div>
            <?php
            wp_reset_postdata(); ?>
        <?php endif; ?>
        </div>
      </div>
    </section>
    <!-- Частично готово. Не сделана карта. -->    
    <section class="place mb-32">
      <div class="mx-auto container px-3 sm:px-6 lg:px-16">
        <h2 class="text-6xl text-white font-medium max-lg:text-center text-opacity-5 uppercase mb-5 lg:text-5xl lg:mb-9 xl:text-9xl 2xl:text-[10rem] max-2xl:leading-none"><?php the_field('place_title', 'option'); ?></h2>
      </div>
      <div class="flex max-lg:flex-col mx-auto px-3 sm:px-6 lg:pr-0 justify-center gap-y-10 items-center gap-x-5 lg:justify-between container--fluid">
        <div class="map relative max-lg:w-full h-[520px] lg:w-2/5 lg:h-[610px] 3xl:h-[750px]">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.0936436156962!2d98.30496306347656!3d7.8852710191477495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30503b10fc5fcd7f%3A0x5535a94044f9c5d4!2sBaankingkaew%20Sauna%20%26%20Restaurant!5e0!3m2!1sen!2suk!4v1692115860313!5m2!1sen!2suk" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <!-- Swiper -->
        <?php if(have_rows('place_slider', 'option')) : ?>
        <div class="swiper placeSwiper max-lg:w-full h-auto lg:w-3/5 lg:h-[610px] 3xl:h-[750px]">
          <div class="swiper-nav relative flex items-center justify-center max-lg:mb-5 lg:ml-auto lg:absolute lg:right-16 lg:bottom-12">
            <div class="swiper-button-prev relative left-auto right-auto top-auto w-6 h-6 text-[#3B4855] mt-0 hover:text-accent lg:hidden"></div>
            <div class="swiper-pagination relative bottom-auto"></div>
            <div class="swiper-button-next relative left-auto right-auto top-auto w-6 h-6 text-[#3B4855] mt-0 hover:text-accent lg:hidden"></div>
          </div>
          <div class="swiper-wrapper max-lg:h-[520px]">
            <?php while(have_rows('place_slider', 'option')) : the_row(); ?>
            <?php $img = get_sub_field('img', 'option'); ?>
              <div class="swiper-slide">
                <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>">
              </div>
            <?php endwhile; ?>
          </div>
        </div>
        <?php else : endif; ?>
      </div>
    </section>
    <!-- Готово -->
    <section class="ba z-0 relative bg-cover bg-center pt-28 pb-36" style="background-image: url(<?php the_field('cta_bg', 'option'); ?>);">
      <div class="mx-auto container px-3 sm:px-6 lg:px-16">
        <div class="relative flex flex-col justify-between flex-wrap gap-y-10 max-lg:items-center lg:flex-row">
          <img src="<?php the_field('cta_decor', 'option'); ?>" class="w-48 max-lg:mb-16 xl:absolute xl:w-80 xl:rotate-[30deg] xl:-right-44 xl:-top-5 xl:z-10" alt="">
          <div class="w-full xl:w-6/12">
            <h2 class="text-3xl leading-8 font-medium text-white uppercase mb-12 max-lg:text-center sm:text-5xl sm:leading-[1.1] lg:text-6xl lg:leading-[1.1]"><?php the_field('cta_title', 'option') ?></h2>
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
            <?php echo do_shortcode('[contact-form-7 id="155" title="Form Home"]'); ?>
          </div>
        </div>
      </div>
    </section>

<?php get_footer(); ?>