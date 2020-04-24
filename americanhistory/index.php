<?php
/**
 * The main template file
 * Template Name: Главная
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package american-history
 */

get_header();
?>

<section class="main-weather">
    <img class="city-img" src="<?=get_template_directory_uri()?>/assets/public/img/statue-of-liberty.svg" alt="">
    <div class="main-header">
       <div class="container">
            <h2 class="main-title">Полезная </br>информация</h2>
       </div>
    </div>
    <div class="container">
		<? 
		$terms = get_terms('city');
		?>
        <div class="weather-blocks d-flex">
            <div class="weathers-menu">
                <nav>
                    <ul>
                    <?php
                    $i = 0; 
                    $term_id = 0;
                    foreach($terms as $term):
                        $i++;
                        if($i==1) $term_id = $term->term_id;?>
                        <li><a class="<?=$i==1 ? 'active' : ''?>" href="#" data-id="<?=$term->term_id?>"><?=$term->name?></a></li>
                    <?endforeach;?>
                    </ul>
                </nav>
            </div>
            <?
                $posts = get_posts( array(
                    'numberposts' => 7,
                    'post_type'   => 'info',
                    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                ) );

                foreach($posts as $post): 
                    setup_postdata($post);
                    $terms = get_the_terms($post->ID, 'city');
                    $thumbnail = get_the_post_thumbnail($post->ID);
                    $meta = get_post_meta($post->ID);
                    ?>
            <div class="weather-content <?=$terms[0]->term_id == $term_id ? 'active' : ''?>" data-id="<?=$terms[0]->term_id?>">
                <h3><?the_title();?></h3>
                <ul class="weather-params">
                    <li>
                        <div class="weather-params__left"><img src="<?=get_template_directory_uri()?>/assets/public/img/cloud.svg" alt=""> Погода сейчас</div>
                        <div class="weather-params__right"><?=$meta['Погода'][0]?></div>
                    </li>
                    <li>
                        <div class="weather-params__left"><img src="<?=get_template_directory_uri()?>/assets/public/img/time.svg" alt="">Местное время</div>
                        <div class="weather-params__right"><?=$meta['Время'][0]?></div>
                    </li>
                </ul>
                <div class="weather-text">
                    <? the_content();?>
                </div>
                <div class="btn-box">
                    <a href="" class="main-btn">Найти тур</a>
                </div>
            </div>
            <?endforeach; 
            wp_reset_postdata();?>
            
        </div>
    </div>
</section>


<section class="main-history">
    <div class="main-header">
        <div class="container">
             <h2 class="main-title">Истории о штатах</h2>
        </div>
     </div>
     <div class="container">
        <div class="history-block">
            <div class="flex-items history-items">
            <?$hposts = get_posts( array(
                    'numberposts' => 3,
                    'post_type'   => 'history',
                    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                ) );
                ?>
                <? foreach($hposts as $post):
                    setup_postdata($post);
                    $terms = get_the_terms($post->ID, 'author');?>
                <div class="flex-item history-item">
                    <div class="history-author d-flex align-items-center">
                        <div class="history-author__img ">
                            <img src="<?=$terms[0]->description;?>" alt="">
                        </div>
                        <div class="history-author__info">
                            <div class="post-date"><?the_date('j F Y')?></div>
                            <div class="author-name"><a href=""><?=$terms[0]->name?></a></div>
                        </div>
                    </div>
                    <div class="history-content">
                        <div class="history-content__img">
                            <img src="<?=get_the_post_thumbnail_url()?>" alt="">
                        </div>
                        <div class="history-content__text">
                            <?the_content()?>
                        </div>
                        <div class="btn-box">
                            <a href="<?=get_permalink();?>">Далее</a>
                        </div>
                    </div>
                </div>
                <? endforeach;
                wp_reset_postdata();?>
                
            </div>
        </div>
     </div>
</section>

<section class="main-subscribe" style="background-image: url('<?=get_template_directory_uri()?>/assets/public/img/jonathan-riley-VW8MUbHyxCU-unsplash.png');">
    <div class="container">
        <?
            $homemeta = get_post_meta($post->ID);
            echo $homemeta['почта'][0];
           // print_r($homemeta);
        ?>
        <h3> получай лучшие предложения первым, <br> подпишись на нашу рассылку</h3>
        <div class="subscribe-block">
            <form action="" method="POST">
                <input type="text" name="email" placeholder="email">
                <input class="main-btn" type="submit" value="Подписаться" data-mail="<?=$homemeta['почта'][0];?>">
            </form>
        </div>
    </div>
</section>

<?php

get_footer();
