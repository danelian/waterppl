<?php
/*
Template Name: Contact us
*/
get_header(); ?>


    <section class="pt-32 pb-24 lg:pt-64 xl:pb-36 2xl:pt-80">
      <div class="mx-auto container px-3 sm:px-6 lg:px-16">
        <div class="relative flex flex-col justify-between flex-wrap gap-y-10 max-lg:items-center lg:flex-row">
          <div class="w-full xl:w-6/12">
            <h2 class="text-3xl leading-8 font-medium text-white uppercase mb-12 max-lg:text-center sm:text-5xl sm:leading-[1.1] lg:text-6xl lg:leading-[1.1]"><?php the_field('contacts_cta_title') ?></h2>
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
            <?php echo do_shortcode('[contact-form-7 id="312" title="Form ContactUs"]'); ?>
          </div>
        </div>
      </div>
    </section>


<?php get_footer(); ?>