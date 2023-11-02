<?php get_header(); ?>

  <section class="hero relative z-0 pt-32 pb-16 mb-24 sm:mb-32 lg:pt-[230px] lg:pb-48">
    <div class="mx-auto container px-3 sm:px-6 lg:px-16">
      <h1 class="text-white uppercase font-medium max-w-[1440px] text-3xl mb-7 max-lg:mb-64 md:text-6xl 2xl:text-8xl"><?php the_title(); ?></h1>
      <div class="grid gap-y-7 text-lg leading-6 text-white lg:text-xl lg:leading-8 lg:mb-14"><?php the_content(); ?></div>
    </div>
  </div>


<?php get_footer(); ?>