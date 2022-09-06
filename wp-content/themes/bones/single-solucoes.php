<?php get_header(); ?>

	<main class="c-main">

		<?php if (have_posts()): ?> 

            <?php $banner = get_field('banner'); ?>
            <?php if( $banner ): ?>
                <section class="c-banner c-banner--large js-animated-start" style="background: url('<?php echo $banner['image'] ?>');">
                    <div class="c-banner__container">
                        <div class="o-wrapper o-wrapper--1280">
                            <div class="o-grid o-grid__col-2 o-grid__gap-60">
                                <div class="fade-in fade-in-top fade-in-time-1">
                                    <h2 class="o-ttl o-ttl--secondary o-ttl--90 o-ttl--color-secondary o-ttl--extrabold"><?php echo $banner['title']; ?></h2>
                                    <div class="o-ttl--white">
                                        <?php echo $banner['description_info']; ?>
                                    </div>
                                </div>
                                <div class="fade-in fade-in-top fade-in-time-2">
                                    <div 
                                        class="c-video c-video--secondary js-video-player" 
                                        data-video="https://www.youtube.com/embed/<?php echo $banner['video_id']; ?>?autoplay=1&rel=0" 
                                        style="background-image: url('https://img.youtube.com/vi/<?php echo $banner['video_id']; ?>/sddefault.jpg')"
                                    >
                                        <svg class="c-video__svg">
                                            <use xlink:href="#ico-play"/>
                                        </svg>
                                        <iframe id="yt-video" class="c-video__player js-video-play" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="c-banner__btn">
                        <a href="#content" class="o-link--goto js-goto">Saiba mais</a>
                    </div>
                </section>
            <?php endif; ?>

			<div class="c-single-solutions">
                <?php while( have_posts() ): the_post(); ?>
	
                    <div id="content" class="c-bg c-bg--left-large-gray">
                        <div class="o-wrapper o-wrapper--1180 js-animated">
                            <?php $description = get_field('description_all'); ?>
                            <div class="c-single-solutions__container">
                                <div class="c-single-solutions--p-left fade-in fade-in-right fade-in-time-1">
                                    <img src="<?php echo $description['image']; ?>" alt="<?php the_title(); ?>">
                                </div>

                                <div class="fade-in fade-in-right fade-in-time-2">
                                    <h2 class="o-ttl o-ttl--secondary o-ttl--38 o-ttl--extrabold o-ttl--black"><?php echo $description['title']; ?></h2>
                                    <?php echo $description['text']; ?>
                                    <a href="#demonstracao" class="o-btn o-btn--primary o-btn--blk js-goto">Solicite demonstração</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="c-bg c-bg--single js-animated">
                        <div class="o-wrapper o-wrapper--1040 fade-in fade-in-top js-animated-numbers">
                            <div class="c-single-solutions__numbers">
                                <?php while( have_rows('numbers') ): the_row(); ?>
                                    <?php $numbers = get_sub_field('title_numbers'); ?>
                                    
                                    <div class="c-single-solutions__item">
                                        <h3 class="o-ttl o-ttl--60 o-ttl--secondary o-ttl--semibold o-ttl--center o-ttl--color-secondary"><span class="js-number" data-value="<?php echo $numbers["number"]; ?>"></span> <?php echo $numbers["type"]; ?></h3>
                                        <p class="o-ttl--16 o-ttl--white o-ttl--medium o-ttl--upper o-ttl--center"><?php echo get_sub_field('description'); ?></p>
                                        <p class="o-ttl--14 o-ttl--white o-ttl--center"><?php echo get_sub_field('warning'); ?></p>
                                    </div>

                                <?php endwhile; wp_reset_postdata(); ?>
                            </div>

                            <div class="o-wrapper o-wrapper--410">
                                <div class="c-single-solutions__numbers-btn">
                                    <a href="#demonstracao" class="o-btn o-btn--primary o-btn--blk js-goto">Solicite demonstração</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="c-bg c-bg--all-medium-gray">
                        <div class="o-wrapper o-wrapper--1280 js-animated">
                            <?php $facilities = get_field('facilities'); ?>
                            <div class="c-single-solutions__container c-single-solutions__container--secondary">
                                <div class="c-single-solutions--p-left fade-in fade-in-right fade-in-time-1">
                                    <h2 class="o-ttl o-ttl--secondary o-ttl--38 o-ttl--extrabold o-ttl--black"><?php echo $facilities['title']; ?></h2>
                                    <?php echo $facilities['description']; ?>
                                </div>

                                <div class="fade-in fade-in-right fade-in-time-2">
                                    <div class="c-single-solutions__gallery">
                                        <?php $images = $facilities['gallery']; ?>
                                        <div class="swiper-container js-slider-gallery">
                                            <div class="swiper-wrapper">
                                                <?php foreach($images as $image): ?>

                                                    <div class="swiper-slide c-single-solutions__gallery-item">
                                                        <img src="<?php echo esc_url($image); ?>">
                                                    </div>

                                                <?php endforeach; wp_reset_postdata(); ?>
                                            </div>
                                            <div class="swiper-pagination swiper-pagination--secondary"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="o-wrapper o-wrapper--1280 js-animated">
                            <h2 class="o-ttl o-ttl--secondary o-ttl--38 o-ttl--extrabold o-ttl--center o-ttl--black">Diferenciais da Solução</h2>
                            
                            <div class="swiper-container js-slider-solution">
                                <div class="swiper-wrapper">
                                    <?php $count = 1; while( have_rows('differentials') ): the_row(); ?>
                                        
                                        <div class="swiper-slide">
                                            <div class="fade-in fade-in-right fade-in-time-<?php echo $count; ?>">
                                                <div class="c-single-solutions__block">
                                                    <div class="c-single-solutions__block-img">
                                                        <img class="c-ico" src="<?php echo get_sub_field('differentials_ico'); ?>">
                                                    </div>
                                                    <h3 class="o-ttl o-ttl--20 o-ttl--secondary o-ttl--extrabold o-ttl--black"><?php echo get_sub_field('differentials_title'); ?></h3>
                                                    <p><?php echo get_sub_field('differentials_text'); ?></p>
                                                </div>
                                            </div>
                                        </div>

                                    <?php $count++; endwhile; wp_reset_postdata(); ?>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>

                    <div id="demonstracao" class="c-bg c-bg--green c-bg--left-large-white">
                        <div class="o-wrapper o-wrapper--1180 js-animated">
                            <?php echo do_shortcode('[contact-form-7 id="235" title="Demonstração"]'); ?>
                        </div>
                    </div>
	
                <?php endwhile; ?>
			</div>
		<?php else : ?>

			<div class="c-not-found">
				<div class="o-wrapper o-wrapper--1280">
					<h2 class="o-ttl o-ttl--30 o-ttl--center">Post não encontrado.</h2>

					<div class="o-btn__center">
						<a href="<?php echo home_url(); ?>" class="o-btn o-btn--primary">Voltar para home</a>
					</div>
				</div>
			</div>

		<?php endif; ?>

	</main>

<?php get_footer(); ?>
