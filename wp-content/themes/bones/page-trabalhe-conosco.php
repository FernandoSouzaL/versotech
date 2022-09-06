<?php
/*
 Template Name: 
*/
 ?>
 
 <?php get_header(); ?>

	<main class="c-main">

		<section class="c-banner c-banner--small js-animated-start" style="background: url('<?php echo get_field('banner'); ?>');">
			<div class="c-banner__container">
				<div class="o-wrapper o-wrapper--1280">
					<div class="c-banner__txt fade-in fade-in-top">
						<h2 class="o-ttl o-ttl--secondary o-ttl--90 o-ttl--color-secondary o-ttl--extrabold o-ttl--center"><?php the_title(); ?></h2>
					</div>
				</div>
			</div>
		</section>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div class="c-work">
                <div class="c-bg c-bg--left-medium-gray">
                    <div class="o-wrapper o-wrapper--1040 js-animated-start">
                        <?php $invitation = get_field('invitation'); ?>
                        <h2 class="o-ttl o-ttl--secondary o-ttl--38 o-ttl--extrabold o-ttl--black fade-in fade-in-top"><?php echo $invitation['title'] ?></h2>
                        <div class="fade-in fade-in-top fade-in-time-2">
                            <?php echo $invitation['text'] ?>
                        </div>
                    </div>

                    <div class="o-wrapper o-wrapper--1280 js-animated">
                        <?php $workspace = get_field('workspace'); ?>
                        <div class="c-work__title">
                            <div class="fade-in fade-in-right">
                                <h2 class="o-ttl o-ttl--secondary o-ttl--38 o-ttl--extrabold o-ttl--black"><?php echo $workspace['title'] ?></h2>
                            </div>
                            <div class="fade-in fade-in-right fade-in-time-2">
                                <?php echo $workspace['text'] ?>
                            </div>
                        </div>

                        <?php $images = $workspace['gallery'] ?>
                        <div class="c-work__gallery">
                            <?php $count = 1; foreach($images as $image): ?>

                                <img src="<?php echo esc_url($image); ?>" class="fade-in fade-in-right fade-in-time-<?php echo $count; ?>">

                            <?php $count++; endforeach; wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>

                <div class="c-work__bg c-bg c-bg--secondary c-bg--green c-bg--right-small-white js-animated">
                    <div class="o-wrapper o-wrapper-1280">
                        <div class="c-work__title c-work__title--secondary">
                            <div class="fade-in fade-in-right">
                                <h2 class="o-ttl o-ttl--secondary o-ttl--38 o-ttl--extrabold o-ttl--white">Vagas disponíveis</h2>
                            </div>

                            <p class="o-ttl--24 o-ttl--white fade-in fade-in-right fade-in-time-2"><?php echo get_field('vacancies'); ?></p>
                        </div>
                    </div>

                    <div class="o-wrapper o-wrapper-1280">
                        <?php
                            $args = array(
                                'post_type'      => 'vagas',
                                'orderby'        => 'DESC',
                                'posts_per_page' => -1
                            );

                            $query = new WP_Query( $args );
                        ?>

                        <div class="swiper-container js-slider-vacancies">
                            <div class="swiper-wrapper">
                                <?php $count = 1; while( $query->have_posts() ): $query->the_post(); ?>
                                                                    
                                    <div class="swiper-slide">
                                        <div class="c-work__item fade-in fade-in-right fade-in-time-<?php echo $count; ?>">
                                            <h3 class="o-ttl o-ttl--20 o-ttl--secondary o-ttl--extrabold o-ttl--black"><?php the_title(); ?></h3>
                                            <div>
                                                <?php 
                                                    $content = get_field('description'); 
                                                    echo substr($content, 0, 307).'...';
                                                ?>
                                            </div>
                                            <a href="#<?php echo $post->ID; ?>" class="o-btn o-btn--primary o-btn--blk js-open-modal">Ver vaga</a>
                                        </div>
                                    </div>
        
                                <?php $count++; endwhile; wp_reset_postdata(); ?>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>

                        <?php $count = 1; while( $query->have_posts() ): $query->the_post(); ?>
                        
                            <div id="<?php echo $post->ID; ?>" class="c-modal">
                                <div class="c-modal__container">
                                    <h2 class="o-ttl o-ttl--secondary o-ttl--38 o-ttl--extrabold o-ttl--black"><?php the_title(); ?></h2>
                                    <?php echo get_field('description'); ?>

                                    <?php
                                        $has_link = get_field('has_target');

                                        if($has_link):
                                    ?>
                                        <a href="<?php echo get_field('link') ?>" target="_blank" class="o-btn o-btn--primary o-btn--blk">Anexar currículo</a>
                                    <?php else: ?>
                                        
                                        <div class="c-form">
                                            <?php echo do_shortcode('[contact-form-7 id="236" title="Currículo"]'); ?>
                                        </div>

                                    <?php endif; ?>

                                    <a href="#<?php echo $post->ID; ?>" class="c-modal__close js-close-modal"></a>
                                </div>
                            </div>

                        <?php $count++; endwhile; wp_reset_postdata(); ?>
                    </div>
                </div>
			</div>

		<?php endwhile; endif; ?>

	</main>

 <?php get_footer(); ?>
