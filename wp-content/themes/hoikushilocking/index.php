<?php get_header() ?>

<body>
<div class="youchienkyouyu_kyuzin_wrapper">
	<div class="youchienkyouyu_kyuzin_header">
		<h1>サイトタイトル</h1>
	</div><!--header-->
	<div class="youchienkyouyu_kyuzin_mainimg">
	</div><!--mainimg-->
	<div class="youchienkyouyu_kyuzin_container">
		<div class="youchienkyouyu_kyuzin_blog">
			<h2>新着保育ブログ</h2>
			<div class="youchienkyouyu_kyuzin_blog-flex">

        <?php
        $args = [
            'posts_per_page' => 6,
        ];
        $loop = new WP_Query($args);

        if (have_posts()) : ?>
          <?php while ($loop->have_posts()) : $loop->the_post();  ?>


    			<div class="youchienkyouyu_kyuzin_blog-container">
            <a href="<?php the_permalink(); ?>">
    				<div class="youchienkyouyu_kyuzin_blog-container-img">
              <?php
                    $image = get_field('thumbnail');
                    if( !empty($image) ):
              ?>
                    <img src="<?php echo $image['url']; ?>">
              <?php endif; ?>
    				</div>
    				<h3><?php the_title(); ?></h3>
    					<p><?php the_excerpt(); ?></p>
             </a>
            </div><!--blog-container-->

          <?php endwhile; ?>
        <?php else : ?>
            <h3>There is no posts</h3>
        <?php endif; ?>

			</div>

		</div><!--brog-->
		<div class="youchienkyouyu_kyuzin_blog">
			<h2>おすすめ外部リンク</h2>
			<div class="youchienkyouyu_kyuzin_blog-flex">
        <?php if (query_posts('cat=2')) : ?>
          <?php while ($loop->have_posts()) : $loop->the_post(); ?>


    			<div class="youchienkyouyu_kyuzin_blog-container">
            <a href="<?php the_permalink() ?>">
    				<div class="youchienkyouyu_kyuzin_blog-container-img">
              <?php
                $image = get_field('thumbnail');
                if( !empty($image) ): ?>
                  <img src="<?php echo $image['url']; ?>" />
                <?php endif; ?>
    				</div>
    				<h3><?php the_title();?></h3>
    					<p><?php the_excerpt(); ?></p>
            </a>
            </div><!--blog-container-->


          <?php endwhile; ?>
        <?php else : ?>
          <h3>There is no posts</h3>
        <?php endif; wp_reset_query();?>


			</div><!--blog-flex-->
		</div><!--blog-->

		<div class="youchienkyouyu_kyuzin_blog">
			<h2>カテゴリ</h2>
			<div class="youchienkyouyu_kyuzin_blog-flex">

        <?php query_posts( array( 'post_type' =>array('post','postSecond'))); ?>
        <?php if (have_posts()) : while(have_posts()) : the_post(); ?>

          <div class="youchienkyouyu_kyuzin_blog-container">
            <a href="<?php the_permalink(); ?>">
            <div class="youchienkyouyu_kyuzin_blog-container-img">
              <?php
                    $image = get_field('thumbnail');
                    if( !empty($image) ):
              ?>
                    <img src="<?php echo $image['url']; ?>">
              <?php endif; ?>
            </div>
            <h3><?php the_title(); ?></h3>
              <p><?php the_excerpt(); ?></p>
            </a>
            </div><!--blog-container-->


        <?php endwhile; endif; wp_reset_query();  ?>




 
			</div><!--blog-flex-->
		</div><!--blog-->
	</div><!--container-->

    <?php get_footer(); ?>
