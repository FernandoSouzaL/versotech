<?php get_header(); ?>

	<main class="c-main">

		<?php if( have_posts() ): ?> 
			<div class="c-blog js-animated-start">
                <div class="c-bg">
                    <div class="c-bg c-bg--all-blog-gray">
                        <div class="o-wrapper o-wrapper--1280">
        
                            <h2 class="o-ttl o-ttl--secondary o-ttl--90 o-ttl--color-secondary o-ttl--extrabold o-ttl--center fade-in fade-in-top">VersoBlog</h2>
        
                            <div class="c-blog__categories">
                                <h3 class="o-ttl o-ttl--secondary o-ttl--20 o-ttl--extrabold o-ttl--black fade-in fade-in-right">Categorias:</h3>
    
                                <ul class="c-blog__list">
                                    <?php 
                                        $terms = get_terms('categorias', array(
                                            'hide_empty' => false,
                                            'orderby'    => 'name'
                                        ) ); 
                                    ?>
    
                                    <?php $count = 2; foreach($terms as $term): ?>
    
                                        <li class="c-blog__list-item fade-in fade-in-right fade-in-time-<?php echo $count; ?>">
                                            <a href="<?php echo get_term_link($term); ?>">#<?php echo $term->name ?></a>
                                        </li>
    
                                    <?php $count++; endforeach; wp_reset_postdata(); ?>
                                </ul>
                            </div>

                            <h2 class="o-ttl o-ttl--secondary o-ttl--38 o-ttl--extrabold o-ttl--black fade-in fade-in-top">Últimos posts</h2>
                            
                            <div class="c-blog__container">
                                <?php $count = 1; while( have_posts() ): the_post(); ?>
                    
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
                                                
                                <?php $count++; endwhile; ?>
                            </div>
            
                            <?php bones_page_navi(); ?>
                
                        </div>
                    </div>
                </div>
			</div>
		<?php else : ?>

			<div class="c-not-found">
				<div class="o-wrapper o-wrapper--1280">
					<h2 class="o-ttl o-ttl--30 o-ttl--center">Nenhum post encontrado.</h2>

					<div class="o-btn__center">
						<a href="<?php echo home_url(); ?>" class="o-btn o-btn--primary">Voltar para home</a>
					</div>
				</div>
			</div>							

		<?php endif; ?>

	</main>

<?php get_footer(); ?>
