  <?php get_header(); ?>

<body>
<div class="hoikushi_tokyo_wrapper">

  <?php get_sidebar(); ?>

	<div class="hoikushi_tokyo_mainimg">
	</div><!--mainimg-->
	<div class="hoikushi_tokyo_container">
		<div class="hoikushi_tokyo_blog">
		  <h2>東京の保育士求人記事一覧</h2>


      <?php
      if ( is_category() ) {

        $category = end(get_the_category());
        $category_id = $category->cat_ID;
        $args = [
            'posts_per_page' => 3,
            'post_type' => array( 'postsecond', 'post'),
            'cat' =>$category_id
        ];
        $loop = new WP_Query($args);

        if ($loop->have_posts()) : ?>
          <?php while ($loop->have_posts()) : $loop->the_post(); ?>
            <div class="hoikushi_tokyo_blog-container">
              <a href="<?php the_permalink(); ?>">
              <div class="hoikushi_tokyo_blog-container-img">

              <?php
                    $image = get_field('thumbnail');
                    if( !empty($image) ):
              ?>
                      <img src="<?php echo $image['url']; ?>" />
              <?php endif; ?>

              </div>
              <div class="hoikushi_tokyo_blog-container-unity">
                <h3><?php the_title(); ?></h3>
                <p><?php the_excerpt(); ?></p>
              </a>
              </div><!--blog-container-unity-->
            </div><!--blog-container-->
          <?php endwhile; ?>
        <?php else : ?>
          <h3>There is no posts</h3>
        <?php endif; wp_reset_query();

    }else{
      $args = [
          'posts_per_page' => 3,
          'post_type' => array( 'postsecond', 'post')
      ];
      $loop = new WP_Query($args);
        if ($loop->have_posts()) : ?>
          <?php while ($loop->have_posts()) : $loop->the_post();  ?>

            <div class="hoikushi_tokyo_blog-container">
              <a href="<?php the_permalink(); ?>">
              <div class="hoikushi_tokyo_blog-container-img">

              <?php
                    $image = get_field('thumbnail');
                    if( !empty($image) ):
              ?>
                      <img src="<?php echo $image['url']; ?>" />
              <?php endif; ?>

              </div>
              <div class="hoikushi_tokyo_blog-container-unity">
                <h3><?php the_title(); ?></h3>
                <p><?php the_excerpt(); ?></p>
              </a>
              </div><!--blog-container-unity-->
            </div><!--blog-container-->

          <?php endwhile; ?>
      <?php else : ?>
            <h3>There is no posts</h3>
      <?php endif; wp_reset_query();
    }
    ?>












		</div><!--blog-->

		<div id="category">
		  <div class="hoikushi_tokyo_blog">
		   <h2>カテゴリー</h2>


       <?php

         $args = [
             'posts_per_page' => 3,
             'post_type' => array( 'postsecond', 'post')
         ];
         $loop = new WP_Query($args);
       if (query_posts('cat>=1')) : ?>
         <?php while ($loop->have_posts()) : $loop->the_post(); ?>
             <div class="hoikushi_tokyo_blog-container">
               <a href="<?php the_permalink() ?>">
               <div class="hoikushi_tokyo_blog-container-img"><?php
                     $image = get_field('thumbnail');
                     if( !empty($image) ): ?>
                       <img src="<?php echo $image['url']; ?>" />
                     <?php endif; ?>
               </div>
               <div class="hoikushi_tokyo_blog-container-unity_cate">
                 <h3><?php the_title();?></h3>
                 <p><?php the_excerpt(); ?></p>
               </a>
               </div><!--blog-container-unity-->
             </div><!--blog-container-->
         <?php endwhile; ?>
       <?php else : ?>
         <h3>There is no posts</h3>
       <?php endif; wp_reset_query(); ?>
			</div><!--blog-->


	<div id="links">
		<div class="hoikushi_tokyo_blog">
		  <h2>東京の保育士求人についておすすめのブログ </h2>

      <?php query_posts( array( 'post_type' =>array('post','postSecond'),'posts_per_page' => 3)); ?>
      <?php if (have_posts()) : while(have_posts()) : the_post(); ?>

        <div class="hoikushi_tokyo_blog-container">
          <a href="<?php the_permalink(); ?>">
          <div class="hoikushi_tokyo_blog-container-img">
                    <?php
                          $image = get_field('thumbnail');
                          if( !empty($image) ):
                    ?>
                          <img src="<?php echo $image['url']; ?>">
                    <?php endif; ?>
          </div>
          <div class="hoikushi_tokyo_blog-container-unity_link">
            <h3><?php the_title(); ?></h3>
            <p><?php the_excerpt(); ?></p></a>
          </div><!--blog-container-unity-->
        </div><!--blog-container-->
      <?php endwhile; endif; wp_reset_query();  ?>

			</div><!--blog-->

	</div><!--container-->
  <?php get_footer(); ?>
