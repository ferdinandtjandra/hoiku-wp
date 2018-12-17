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
	        <?php endif; wp_reset_query();

	    }else{

        $args = [
            'posts_per_page' => 4,
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
        <?php endif; wp_reset_query();
			}?>

			</div>

		</div><!--brog-->
		<div class="youchienkyouyu_kyuzin_blog">
			<h2>おすすめ外部リンク</h2>
			<div class="youchienkyouyu_kyuzin_blog-flex">

				<?php
				// GET RECOMMENDATION POST
				query_posts( array( 'post_type' =>array('post','postSecond'),'cat'=> 3,'posts_per_page' => 4)); ?>
				<?php if (have_posts()) : while(have_posts()) : the_post(); ?>

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



				<?php endwhile; endif; wp_reset_query();  ?>


			</div><!--blog-flex-->
		</div><!--blog-->

		<div class="youchienkyouyu_kyuzin_blog">
			<h2>カテゴリ</h2>
			<div class="youchienkyouyu_kyuzin_blog-flex">

				<?php
				 // GET CATEGORY LIST
					$categories = get_categories(array('hide_empty' => 0,'number' => 4));

					foreach($categories as $category) {

						$current_term = get_queried_object();

						$image = get_field('thumbnail', $category->taxonomy . '_' . $category->term_id );
						?>
						<div class="youchienkyouyu_kyuzin_blog-container">
							<a href="#">
							<div class="youchienkyouyu_kyuzin_blog-container-img">
								<img src="<?php echo $image['url']; ?>">
							</div>
							<h3><?php echo $category->name; ?></h3>
								<p><?php echo $category->description; ?></p>
							</a>
							</div><!--blog-container-->


						<?php
					}
					wp_reset_query();
				 ?>







			</div><!--blog-flex-->
		</div><!--blog-->
	</div><!--container-->

    <?php get_footer(); ?>
