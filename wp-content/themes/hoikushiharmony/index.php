  <?php get_header(); ?>

<body>
<div class="hoikushi_tensyoku_matome_wrapper">
	<div class="hoikushi_tensyoku_matome_header">
		<div class="hoikushi_tensyoku_matome_topimg">
			<div class="hoikushi_tensyoku_matome_kodomo">
			</div>
			<h1>サイトタイトルサイトタイトルサイトタイトル<br>
			サイトタイトルサイトタイトルサイトタイトル</h1>
		</div><!--topimg-->

    <?php get_sidebar(); ?>


	</div><!--header-->

	<div class="hoikushi_tensyoku_matome_container">
		<div class="hoikushi_tensyoku_matome_contents">
			<h2>▼記事一覧</h2>
			<div class="hoikushi_tensyoku_matome_tabel_flex">
  <?php
        if ( is_category() ) {

          $category = end(get_the_category());
          $category_id = $category->cat_ID;
          $args = [
              'posts_per_page' => 6,
              'post_type' => array( 'postsecond', 'post'),
              'cat' =>$category_id
          ];
          $loop = new WP_Query($args);

          if ($loop->have_posts()) : ?>
            <?php while ($loop->have_posts()) : $loop->the_post(); ?>
              <div class="hoikushi_tensyoku_matome_tabel">
                 <a href="<?php the_permalink(); ?>">
                <div class="hoikushi_tensyoku_matome_tabel_img">
                    <?php
                          $image = get_field('thumbnail');
                          if( !empty($image) ):
                    ?>
                          <img src="<?php echo $image['url']; ?>">
                    <?php endif; ?>
                  </div><!--tabel_img-->
                <h3><?php the_title(); ?></h3>
                <p><?php the_excerpt(); ?></p>
              </a>
              </div><!--tabel-->
            <?php endwhile; ?>
          <?php else : ?>
            <h3>There is no posts</h3>
          <?php endif; wp_reset_query();

      }else{

          $args = [
              'posts_per_page' => 6
          ];
          $loop = new WP_Query($args);

          if ($loop->have_posts()) : ?>
            <?php while ($loop->have_posts()) : $loop->the_post();  ?>


              <div class="hoikushi_tensyoku_matome_tabel">
                 <a href="<?php the_permalink(); ?>">
                <div class="hoikushi_tensyoku_matome_tabel_img">
                    <?php
                          $image = get_field('thumbnail');
                          if( !empty($image) ):
                    ?>
                          <img src="<?php echo $image['url']; ?>">
                    <?php endif; ?>
                  </div><!--tabel_img-->
                <h3><?php the_title(); ?></h3>
                <p><?php the_excerpt(); ?></p>
              </a>
              </div><!--tabel-->
            <?php endwhile; ?>
          <?php else : ?>
              <h3>There is no posts</h3>
          <?php endif;
        }
          wp_reset_query();?>

			</div><!--tabel_wrap-->
		</div><!--contains-->

		<div class="hoikushi_tensyoku_matome_contents_2">
			<div id="cate">
			<h2>▼カテゴリ一覧</h2>
			<div class="hoikushi_tensyoku_matome_tabel_flex">

        <?php
          $categories = get_categories(array('hide_empty' => 0,'number' => 3));

          foreach($categories as $category) {

            $current_term = get_queried_object();

            $image = get_field('thumbnail', $category->taxonomy . '_' . $category->term_id );
            ?>

            <div class="hoikushi_tensyoku_matome_tabel">
              <a href="#">
              <div class="hoikushi_tensyoku_matome_tabel_img">
                    <img src="<?php echo $image['url']; ?>">
                    </div><!--tabel_img-->
              <h3><?php echo $category->name; ?></h3>
              <p><?php the_excerpt(); ?></p>
              </a>
            </div><!--tabel-->

            <?php
          }
          wp_reset_query();
         ?>



			</div><!--tabel_wrap-->
		</div><!--contains-->
	</div><!--cate-->

		<div class="hoikushi_tensyoku_matome_contents">
			<div id="link">
			<h2>▼外部リンク一覧</h2>
			<div class="hoikushi_tensyoku_matome_tabel_flex">

        <?php query_posts( array( 'post_type' =>array('postSecond'))); ?>
        <?php if (have_posts()) : while(have_posts()) : the_post(); ?>

          <div class="hoikushi_tensyoku_matome_tabel">
  				   <a href="<?php the_permalink(); ?>">
  					<div class="hoikushi_tensyoku_matome_tabel_img">
                      <?php
                            $image = get_field('thumbnail');
                            if( !empty($image) ):
                      ?>
                            <img src="<?php echo $image['url']; ?>">
                      <?php endif; ?>
  		            </div><!--tabel_img-->
  					<h3><?php the_title(); ?></h3>
  					<p><?php the_excerpt(); ?></p>
  				   </a>
  				</div><!--tabel-->
        <?php endwhile; endif; wp_reset_query();  ?>

			</div><!--tabel_wrap-->
		</div><!--link-->
		</div><!--contains-->
	</div><!--container-->
  <?php get_footer(); ?>
