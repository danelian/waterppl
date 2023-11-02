
  </main>

  <footer>
    <div class="mx-auto container px-3 sm:px-6 lg:px-16">
      <div class="flex flex-col items-center justify-center w-full gap-y-12 border-t border-t-white pt-10 pb-8 lg:pt-12 lg:pb-14 lg:justify-between lg:flex-row lg:gap-x-14 2xl:pt-16 2xl:pb-20">
        <div class="flex items-center gap-x-14 max-lg:justify-between max-lg:w-full">
          <?php if( $logo = get_custom_logo() ){ echo $logo; } ?>
          <?php 
          $footer_contacts_link = get_field('footer_contacts_link', 'option');
          if( $footer_contacts_link ): 
              $footer_contacts_link_url = $footer_contacts_link['url'];
              $footer_contacts_link_title = $footer_contacts_link['title'];
              ?>
              <a href="<?php echo esc_url($footer_contacts_link_url) ?>" class="inline-flex items-center gap-x-5 text-lg font-normal text-white hover:text-accent lg:text-xl"><?php echo esc_html($footer_contacts_link_title); ?> <i class="icomoon icon-place text-2xl leading-none font-normal"></i></a>
          <?php endif; ?>
        </div>
        <?php
          if( have_rows('footer_socials', 'option') ): ?>
            <div class="flex items-center gap-x-7">
              <?php while( have_rows('footer_socials', 'option') ) : the_row();
              $link = get_sub_field('link', 'option');
              if( $link ): 
                  $link_url = $link['url'];
                  $link_target = $link['target'] ? $link['target'] : '_self';?>
                  <a class="inline-block text-4xl leading-none text-white hover:text-accent lg:text-2xl lg:leading-none" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                    <?php the_sub_field('icon', 'option'); ?>
                  </a>
              <?php endif;
              endwhile; ?>
            </div>
          <?php else :
          endif;
        ?>
        <?php 
        $footer_privacy_link = get_field('footer_privacy_link', 'option');
        if( $footer_privacy_link ): 
            $footer_privacy_link_url = $footer_privacy_link['url'];
            $footer_privacy_link_title = $footer_privacy_link['title'];
            $footer_privacy_link_target = $footer_privacy_link['target'] ? $footer_privacy_link['target'] : '_self';
            ?>
            <a href="<?php echo esc_url($footer_privacy_link_url) ?>" target="<?php echo esc_attr($footer_privacy_link_target); ?>" class="inline-block text-lg text-center leading-none text-white text-opacity-60 hover:text-accent lg:text-xl lg:leading-none"><?php echo esc_html($footer_privacy_link_title); ?></a>
        <?php endif; ?>
      </div>
    </div>
  </footer>

  <?php wp_footer(); ?>

  <div id="popup-success" class="modal">
    <div class="modal-content">
      <button class="popup-close-btn" id="popup-close-btn"><i class="icomoon icon-close"></i></button>
      <h2>Thank you!</h2>
      <p>Our manager will contact you soon.</p>
    </div>
  </div>
</body>
</html>