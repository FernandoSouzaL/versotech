<?php
/*
 Template Name: Home
*/
 ?>
 
 <?php get_header(); ?>

	<main class="c-main">

		<?php $banner = get_field('banner'); ?>
		<?php if( $banner ): ?>
			<section class="c-banner c-banner--large js-animated-start" style="background: url('<?php echo $banner['image'] ?>');">
				<?php if($banner['has_video']): ?>
					<video class="c-banner__video" width="1920" height="1080" muted autoplay loop playsinline>
						<source src="<?php echo $banner['video_id']; ?>" type="video/mp4">
					</video>
				<?php endif; ?>
				<div class="c-banner__container">
					<div class="o-wrapper o-wrapper--1280">
						<div class="c-banner__content">
							<svg class="c-banner__detail" width="1280" height="659">
								<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#banner-home-detail" />
							</svg>
							<div class="o-wrapper o-wrapper--1060 c-banner__controler">
								<div class="c-banner__txt fade-in fade-in-top">
									<h2 class="o-ttl o-ttl--secondary o-ttl--90 o-ttl--color-secondary o-ttl--extrabold o-ttl--center"><?php echo $banner['title'] ?></h2>
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

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div id="content" class="c-home">
				<div class="c-bg c-bg--left-large-gray c-bg--secondary">
					<div class="o-wrapper o-wrapper--1060 js-animated">
						<?php $versotech = get_field('versotech'); ?>
						<h2 class="o-ttl o-ttl--secondary o-ttl--38 o-ttl--extrabold o-ttl--black fade-in fade-in-top"><?php echo $versotech['title']; ?></h2>
						<div class="fade-in fade-in-top fade-in-time-2"><?php echo $versotech['description']; ?></div>
					</div>

					<div class="o-wrapper o-wrapper--1180 js-animated">
						<h2 class="o-ttl--numbers o-ttl o-ttl--secondary o-ttl--30 o-ttl--extrabold o-ttl--black o-ttl--center fade-in fade-in-top fade-in-time-3"><span>Versotech</span> em Números</h2>

						<div class="c-versotech__container fade-in fade-in-top fade-in-time-4 js-animated-numbers">
							<?php while( have_rows('numbers', 13) ): the_row(); ?>
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

						<div class="o-btn__center fade-in fade-in-top fade-in-time-4">
							<a href="<?php echo get_permalink(13); ?>" class="o-btn o-btn--yellow">Saiba mais</a>
						</div>
					</div>

					<div class="js-animated">
						<div class="c-video__container fade-in fade-in-top">
							<div class="o-wrapper o-wrapper--1040">
								<?php $video = get_field('structure', 13); ?>
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

				<div class="c-bg c-bg--all-large c-bg--color-primary">
					<div class="o-wrapper o-wrapper--1280 js-animated">
						<h2 class="o-ttl o-ttl--38 o-ttl--extrabold o-ttl--secondary o-ttl--white o-ttl--center fade-in fade-in-top">Soluções para o seu negócio</h2>

						<div class="c-solutions">
							<?php
								$args = array(
									'post_type' 	 => 'solucoes',
									'orderby' 		 => 'DESC',
									'posts_per_page' => -1
								);

								$query = new WP_Query( $args );
							?>

							<div class="c-solutions__container">
								<?php $count = 1; while( $query->have_posts() ): $query->the_post(); ?>

									<a href="#<?php the_title(); ?>" class="c-solutions__ico fade-in fade-in-top fade-in-time-<?php echo $count; ?> js-goto">
										<img src="<?php echo get_field('ico'); ?>" class="c-ico">
									</a>

								<?php $count++; endwhile; wp_reset_postdata(); ?>
							</div>

							<?php $count = 1; while( $query->have_posts() ): $query->the_post(); ?>

								<div id="<?php the_title(); ?>" class="c-solutions__item fade-in fade-in-time-<?php echo $count; ?>">
									<div class="c-solutions__txt fade-in fade-in-right fade-in-time-1">
										<h3 class="c-solutions__ttl o-ttl o-ttl--30 o-ttl--secondary o-ttl--extrabold o-ttl--white"><span><?php the_title(); ?></span></h3>

										<div class="o-ttl--white">
											<?php echo get_field('description'); ?>
										</div>

										<div class="c-solutions__btn">
											<a href="<?php echo get_permalink(); ?>" class="o-btn o-btn--secondary">Conheça a solução</a>
											<a href="<?php echo get_permalink(); ?>#demonstracao" class="o-btn o-btn--primary">Solicitar demonstração</a>
										</div>
									</div>

									<div class="c-solutions__img fade-in fade-in-right fade-in-time-2">
										<img src="<?php echo get_field('image'); ?>" alt="<?php the_title(); ?>">
									</div>
								</div>

							<?php $count++; endwhile; wp_reset_postdata(); ?>

						</div>
					</div>

					<div class="o-wrapper o-wrapper--1180 js-animated">
						<?php $hasErp = get_field('has_erp'); ?>
						<h2 class="o-ttl o-ttl--38 o-ttl--extrabold o-ttl--secondary o-ttl--white o-ttl--center fade-in fade-in-top"><?php echo $hasErp['title']; ?></h2>
						
						<div class="o-wrapper o-wrapper--1040 o-ttl--white fade-in fade-in-top fade-in-time-2">
							<?php echo $hasErp['description']; ?>
						</div>

						<div class="swiper-container c-home__slider js-slider-has-erp">
							<div class="swiper-wrapper">
								<?php $count = 1; while( have_rows('has_erps_slider') ): the_row(); ?>

									<div class="swiper-slide">
										<div class="c-solutions__erp fade-in fade-in-right fade-in-time-<?php echo $count; ?>">
											<img src="<?php echo get_sub_field('logo'); ?>">
										</div>
									</div>
								
								<?php $count++; endwhile; wp_reset_postdata(); ?>
							</div>
							<div class="fade-in fade-in-top fade-in-time-5">
								<div class="swiper-pagination"></div>
							</div>
						</div>
					</div>

					<div class="o-wrapper o-wrapper--1180 js-animated">
						<?php $hasErp = get_field('not_erp'); ?>
						<h2 class="o-ttl o-ttl--38 o-ttl--extrabold o-ttl--secondary o-ttl--white o-ttl--center fade-in fade-in-top"><?php echo $hasErp['title']; ?></h2>
						
						<div class="o-wrapper o-wrapper--1040 o-ttl--white fade-in fade-in-top fade-in-time-2">
							<?php echo $hasErp['description']; ?>
						</div>

						<div class="swiper-container c-home__slider c-home__slider-2 js-slider-not-erp">
							<div class="swiper-wrapper">
								<?php $count = 1; while( have_rows('not_erps_slider') ): the_row(); ?>

									<div class="swiper-slide">
										<div class="fade-in fade-in-right fade-in-time-<?php echo $count; ?>">
											<img src="<?php echo get_sub_field('logo'); ?>">
										</div>
									</div>
								
								<?php $count++; endwhile; wp_reset_postdata(); ?>
							</div>
							<div class="fade-in fade-in-top fade-in-time-5">
								<div class="swiper-pagination"></div>
							</div>
						</div>
					</div>
				</div>

				<div class="c-bg c-bg--all-medium-gray">
					<div class="o-wrapper o-wrapper--1280 js-animated">
						<div class="c-home__title">
							<h2 class="o-ttl o-ttl--38 o-ttl--extrabold o-ttl--secondary o-ttl--black fade-in fade-in-top">Nossos Clientes</h2>

							<div class="o-ttl--24 fade-in fade-in-top fade-in-time-2">
								<?php echo get_field('costomers'); ?>
							</div>
						</div>

						<?php 
							$args = array(
								'post_type' 	 => 'clientes',
								'orderby'		 => 'DESC',
								'posts_per_page' => -1
							);

							$query = new WP_Query( $args );
						?>

						<div class="swiper-container c-home__slider js-slider-clients">
							<div class="swiper-wrapper">
								<?php $count = 1; while( $query->have_posts() ): $query->the_post(); ?>

									<div class="swiper-slide">
										<a href="<?php echo get_field('link'); ?>" target="_blank" class="c-clients__item fade-in fade-in-right fade-in-time-<?php echo $count; ?>">
											<img src="<?php echo get_field('logo'); ?>">
										</a>
									</div>
								
								<?php $count++; endwhile; wp_reset_postdata(); ?>
							</div>
							<div class="fade-in fade-in-top fade-in-time-5">
								<div class="swiper-pagination"></div>
							</div>
						</div>
					</div>

					<div class="o-wrapper o-wrapper--1180 js-animated">
						<h2 class="o-ttl o-ttl--38 o-ttl--extrabold o-ttl--secondary o-ttl--black o-ttl--center fade-in fade-in-top">Nossos Clientes</h2>

						<?php 
							$args = array(
								'post_type' 	 => 'clientes',
								'orderby'		 => 'DESC',
								'posts_per_page' => -1,
								'category_name'	 => 'destaques'
							);

							$query = new WP_Query( $args );
						?>

						<div class="swiper-container js-slider-testimonial">
							<div class="swiper-wrapper">
								<?php while( $query->have_posts() ): $query->the_post(); ?>

									<?php $testimonial = get_field('testimonial'); ?>
									<div class="swiper-slide">
										<div class="c-clients__testimonial">
											<h2 class="o-ttl o-ttl--secondary o-ttl--24 o-ttl--center o-ttl--extrabold o-ttl--color-secondary fade-in fade-in-top"><?php the_title(); ?></h2>
											<h3 class="o-ttl o-ttl--secondary o-ttl--18 o-ttl--center o-ttl--bold o-ttl--black fade-in fade-in-top fade-in-time-2"><?php echo $testimonial['name'] ?></h3>
											<div class="fade-in fade-in-top fade-in-time-3">
												<?php echo $testimonial['text'] ?>
											</div>
										</div>
									</div>
								
								<?php endwhile; wp_reset_postdata(); ?>
							</div>
							<div class="fade-in fade-in-top fade-in-time-3">
								<div class="swiper-pagination"></div>
							</div>
						</div>
					</div>
				</div>

				<div class="c-bg c-bg--green c-bg--blog c-bg--left-large-white">
					<div class="o-wrapper o-wrapper--1280 js-animated">
						<div class="c-home__title">
							<h2 class="o-ttl o-ttl--38 o-ttl--extrabold o-ttl--secondary o-ttl--white fade-in fade-in-top">VersoBlog</h2>

							<div class="o-ttl--24 o-ttl--white fade-in fade-in-top fade-in-time-2">
								<?php echo get_field('blog'); ?>
							</div>
						</div>

						<div class="c-blog__container c-home__blog">
							<?php 
								$args = array(
									'post_type' 	 => 'blog',
									'orderby'		 => 'DESC',
									'posts_per_page' => 3,
								);
	
								$query = new WP_Query( $args );
	
								$count = 1;
	
								while( $query->have_posts() ): $query->the_post(); 
							?>
	
								<div class="c-blog__item fade-in fade-in-right fade-in-time-<?php echo $count; ?>">
									<a href="<?php echo get_permalink(); ?>">
										<div class="c-blog__item-img">
											<img src="<?php echo get_field('image'); ?>" alt="<?php the_title(); ?>">
										</div>
										<div class="c-blog__item-content">
											<?php 
												$terms = get_the_terms( $post->ID, 'categorias', array(
													'hide_empty' => false,
													'orderby'    => 'name'
												) );
														
												if(!empty($terms)):
													$termlist = "";
													foreach( $terms as $term ) {
														$termlist .=  '#' . $term->name . ', ';
													} 
											?>
												<h3 class="o-ttl--14 o-ttl--medium o-ttl--color-secondary"><?php echo rtrim($termlist, ', '); ?></h3>
											<?php endif; ?>
											<h2 class="o-ttl o-ttl--secondary o-ttl--20 o-ttl--black o-ttl--extrabold"><?php the_title(); ?></h2>
											<p><?php echo get_field('description'); ?></p>
											<span class="c-blog__item-btn o-ttl--semibold o-ttl--color-secondary">Leia mais</span>
										</div>
									</a>
								</div>
	
							<?php $count++; endwhile; wp_reset_postdata(); ?>
						</div>

						<div class="o-btn__center">
							<a href="<?php echo get_post_type_archive_link( 'blog' ); ?>" class="o-btn o-btn--secondary">Confira o blog completo</a>
						</div>
					</div>
				</div>
			</div>

		<?php endwhile; endif; ?>

	</main>

 <?php get_footer(); ?>
