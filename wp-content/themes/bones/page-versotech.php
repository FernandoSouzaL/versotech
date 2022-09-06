<?php
/*
 Template Name: 
*/
 ?>
 
 <?php get_header(); ?>

	<main class="c-main">

        <?php $banner = get_field('banner'); ?>
		<?php if( $banner ): ?>
			<section class="c-banner c-banner--large js-animated-start" style="background: url('<?php echo $banner['image'] ?>');">
				<div class="c-banner__container">
					<div class="o-wrapper o-wrapper--1280">
						<div class="o-wrapper o-wrapper--1060">
                            <div class="c-banner__txt fade-in fade-in-top">
								<h2 class="o-ttl o-ttl--secondary o-ttl--90 o-ttl--color-secondary o-ttl--extrabold o-ttl--center"><?php echo $banner['title'] ?></h2>
							</div>
						</div>
					</div>
				</div>

				<div class="c-banner__btn">
					<a href="#content" class="o-link--goto js-goto">Saiba mais</a>
				</div>
			</section>
		<?php endif; ?>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div class="c-versotech">
                <div id="content" class="c-bg c-bg--left-large-gray">
					<div class="o-wrapper o-wrapper--1060 js-animated">
                        <h2 class="o-ttl o-ttl--secondary o-ttl--38 o-ttl--extrabold o-ttl--black fade-in fade-in-top">Nossa História</h2>
						<div class="c-versotech__history fade-in fade-in-top fade-in-time-2">
                            <?php echo get_field('history'); ?>
                        </div>
					</div>

					<div class="o-wrapper o-wrapper--1180 js-animated">
						<h2 class="o-ttl--numbers o-ttl o-ttl--secondary o-ttl--30 o-ttl--extrabold o-ttl--black o-ttl--center fade-in fade-in-top fade-in-time-3"><span>Versotech</span> em Números</h2>

						<div class="c-versotech__container c-versotech__container--secondary fade-in fade-in-top fade-in-time-4 js-animated-numbers">
							<?php while( have_rows('numbers') ): the_row(); ?>
								<?php $numbers = get_sub_field('number'); ?>
								
								<div class="c-versotech__item">
									<div class="c-versotech__item-img">
										<img src="<?php echo get_sub_field('ico'); ?>" class="c-ico">
									</div>
									
									<h3 class="o-ttl--16 o-ttl--medium o-ttl--center o-ttl--black"><span class="o-ttl--secondary o-ttl--38 o-ttl--semibold js-number" data-value="<?php echo $numbers["tilte"]; ?>"></span> <?php echo $numbers["type"]; ?></h3>
									
									<p class="o-ttl--14 o-ttl--black o-ttl--center"><?php echo get_sub_field('description'); ?></p>
								</div>

							<?php endwhile; wp_reset_postdata(); ?>
						</div>
					</div>
				</div>

                <div class="c-bg c-bg--color-primary c-bg--right-small-white">
                    <div class="o-wrapper o-wrapper--1180 js-animated">
                        <h2 class="o-ttl o-ttl--secondary o-ttl--38 o-ttl--extrabold o-ttl--white o-ttl--center fade-in fade-in-top">Nossa Cultura</h2>
                        
                        <div class="c-versotech__culture">
                            <?php $count = 1; while( have_rows('culture') ): the_row(); ?>

                                <div class="c-versotech__culture-item fade-in fade-in-right fade-in-time-<?php echo $count; ?>">
                                    <div class="c-versotech__culture-ico">
                                        <img class="c-ico" src="<?php echo get_sub_field('culture_ico'); ?>" alt="<?php echo get_sub_field('culture_title'); ?>">
                                    </div>
                                    <h3 class="c-versotech__culture-ttl o-ttl o-ttl--secondary o-ttl--30 o-ttl--white o-ttl--center o-ttl--extrabold"><?php echo get_sub_field('culture_title'); ?></h3>
                                    <p class="o-ttl--white o-ttl--center"><?php echo get_sub_field('culture_description'); ?></p>
                                </div>

                            <?php $count++; endwhile; wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>

                <div class="c-bg c-bg--left-medium-gray c-bg--secondary">
                    <div class="o-wrapper o-wrapper--1280 js-animated">
                        <?php $structure = get_field('structure'); ?>

                        <div class="c-versotech__structure">
                            <div class="c-versotech__structure-text fade-in fade-in-right fade-in-time-1">
                                <h2 class="o-ttl o-ttl--secondary o-ttl--38 o-ttl--extrabold o-ttl--black"><?php echo $structure['title']; ?></h2>
                                <?php echo $structure['description']; ?>
                            </div>

                            <div class="c-versotech__structure-image fade-in fade-in-right fade-in-time-2">
                                <img src="<?php echo $structure['image']; ?>" alt="<?php echo $structure['title']; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="js-animated">
						<div class="c-video__container--secondary fade-in fade-in-top">
							<div class="o-wrapper o-wrapper--1040">
								<?php $video = get_field('structure'); ?>
								<div 
									class="c-video js-video-player" 
									data-video="https://www.youtube.com/embed/<?php echo $video['video_id']; ?>?autoplay=1&rel=0" 
									style="background-image: url('https://img.youtube.com/vi/<?php echo $video['video_id']; ?>/sddefault.jpg')"
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
			</div>

		<?php endwhile; endif; ?>

	</main>

 <?php get_footer(); ?>
