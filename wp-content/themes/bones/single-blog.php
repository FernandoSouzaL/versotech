<?php get_header(); ?>

	<main class="c-main">

        <section class="c-banner c-banner--small" style="background: url('<?php echo get_field('banner'); ?>');">
			<div class="c-banner__container">
				<div class="o-wrapper o-wrapper--1280">
					<div class="c-banner__txt">
						<h2 class="o-ttl o-ttl--secondary o-ttl--60 o-ttl--color-secondary o-ttl--extrabold o-ttl--center"><?php the_title(); ?></h2>
					</div>
				</div>
			</div>
		</section>

		<?php if (have_posts()): ?> 
			<div class="c-single">
				<div class="c-bg c-bg--all-blog-gray">
                    <div class="o-wrapper o-wrapper--1280">

                        <?php while( have_posts() ): the_post(); ?>

                            <div class="c-single-blog__container">
                                <div class="c-single-blog__left">
                                    <div class="c-single-blog__cats">
                                        <h3 class="o-ttl o-ttl--secondary o-ttl--20 o-ttl--extrabold o-ttl--black">Categorias <br> do post:</h3>
                                        <?php 
                                            $terms = get_the_terms( $post->ID, 'categorias', array(
                                                'hide_empty' => false,
                                                'orderby'    => 'name'
                                            ) );
                                                    
                                            if(!empty($terms)):
                                                $termlist = "";
                                                foreach( $terms as $term ) { ?>
                                                    
                                                    <p class="o-ttl--14 o-ttl--semibold o-ttl--color-secondary">#<?php echo $term->name; ?></p>
                                                
                                                <?php } ?>
                                        <?php endif; ?>
                                    </div>

                                    <div class="c-single-blog__data">
                                        <h3 class="o-ttl o-ttl--secondary o-ttl--20 o-ttl--extrabold o-ttl--black">Data de <br> Publicação:</h3>
                                        <p class="o-ttl--14 o-ttl--semibold o-ttl--color-secondary"><?php echo get_the_date('d/m/Y'); ?></p>
                                    </div>

                                    <div class="c-single-blog__author">
                                        <h3 class="o-ttl o-ttl--secondary o-ttl--20 o-ttl--extrabold o-ttl--black">Por:</h3>
                                        <p class="o-ttl--14 o-ttl--semibold o-ttl--color-secondary"><?php echo get_field('author'); ?></p>
                                    </div>
                                </div>

                                <div class="c-single-blog__middle">
                                    <?php echo get_field('text'); ?>

                                    <div class="c-single-blog__footer">
                                        <div>
                                            <?php 
                                                $fonte = get_field('fonte');
                                                $title = $fonte['title'];
                                                $link = $fonte['link'];

                                                if($link):
                                            ?>
                                                <h3 class="o-ttl o-ttl--secondary o-ttl--20 o-ttl--extrabold o-ttl--black">Fonte: <a class="o-ttl--14 o-ttl--semibold o-ttl--color-secondary" href="<?php echo $link; ?>" target="_blank"><?php echo $title; ?></a></h3>
                                            <?php else: ?>
                                                <h3 class="o-ttl o-ttl--secondary o-ttl--20 o-ttl--extrabold o-ttl--black">Fonte: <span class="o-ttl--14 o-ttl--semibold o-ttl--color-secondary"><?php echo $title; ?></span></h3>
                                            <?php endif; ?>
                                        </div>

                                        <div class="c-single-blog__share">
                                            <h3 class="o-ttl o-ttl--secondary o-ttl--20 o-ttl--extrabold o-ttl--black">Compartilhar:</h3>
                                            <?php get_sidebar(); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="c-single-blog__right">
                                    <h3 class="o-ttl o-ttl--secondary o-ttl--20 o-ttl--extrabold o-ttl--black">Categorias:</h3>
                                    
                                    <ul class="c-single-blog__list">
                                        <?php 
                                            $terms = get_terms('categorias', array(
                                                'hide_empty' => false,
                                                'orderby'    => 'name'
                                            ) ); 
                                        ?>

                                        <?php $count = 1; foreach($terms as $term): ?>

                                            <li class="c-single-blog__list-item">
                                                <a href="<?php echo get_term_link($term); ?>">#<?php echo $term->name ?></a>
                                            </li>

                                        <?php $count++; endforeach; wp_reset_postdata(); ?>
                                    </ul>
                                </div>
                            </div>

                        <?php endwhile; ?>

                    </div>

                    <div class="c-bg">
                        <div class="o-wrapper o-wrapper--1280 js-animated">
                            <h2 class="o-ttl o-ttl--secondary o-ttl--38 o-ttl--extrabold o-ttl--black fade-in fade-in-top">Confira também</h2>

                            <div class="c-blog__container">
                                <?php 
                                    $args = array(
                                        'post_type' 	 => 'blog',
                                        'orderby'		 => 'DESC',
                                        'order'          => 'rand',
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
                        </div>
                    </div>
                </div>
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
