<?php
/*
 Template Name: 
*/
 ?>
 
 <?php get_header(); ?>

	<main class="c-main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div class="c-contact">
                <div class="c-bg">
                    <div class="c-bg c-bg--left-contact-gray js-animated-start">

                        <div class="o-wrapper o-wrapper--1280">
                            <h2 class="o-ttl o-ttl--secondary o-ttl--90 o-ttl--color-secondary o-ttl--extrabold o-ttl--center fade-in fade-in-top">Contato</h2>

                            <div class="c-contact__container">
                                <div class="c-contact__text fade-in fade-in-top fade-in-time-2">
                                    <h3 class="o-ttl o-ttl--secondary o-ttl--38 o-ttl--extrabold o-ttl--black"><?php echo get_field('title'); ?></h3>
                                    <?php echo get_field('text'); ?>
                                    <div class="c-contact__content">
                                        <div class="c-contact__ico">
                                            <svg width="21.092" height="28.259">
                                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#ico-pin" />
                                            </svg>
                                        </div>
                                        <p><?php echo get_field('address'); ?></p>
                                    </div>
                                    <div class="c-contact__content">
                                        <div class="c-contact__ico">
                                            <svg width="27.444" height="27.444">
                                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#ico-phone" />
                                            </svg>
                                        </div>

                                        <p><?php echo get_field('phone'); ?></p>
                                    </div>
                                    <div class="c-contact__content">
                                        <div class="c-contact__ico">
                                            <svg width="30.169" height="20.111">
                                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#ico-email" />
                                            </svg>
                                        </div>
                                        <p><?php echo get_field('email'); ?></p>
                                    </div>
                                </div>

                                <div class="c-form fade-in fade-in-top fade-in-time-3">
                                    <?php echo do_shortcode('[contact-form-7 id="9" title="Contato"]'); ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
			</div>

		<?php endwhile; endif; ?>

	</main>

 <?php get_footer(); ?>
