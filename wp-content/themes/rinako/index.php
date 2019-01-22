<?php get_header() ?>
<body>
<div class="osaka_hoikushi_kyuzin_wrapper">
	<div class="osaka_hoikushi_kyuzin_header">
		<div class="osaka_hoikushi_kyuzin_topimg">
			<div class="osaka_hoikushi_kyuzin_kodomo">
			</div>
			<h1>大阪保育士求人サイト大阪保育士求人サイト</h1>
		</div><!--topimg-->
		<div class="osaka_hoikushi_kyuzin_menu">
			 <a href="#">#ホーム</a><a href="#cate">#カテゴリ一覧</a><a href="#link">#おすすめ外部リンク</a>
		</div><!--menu-->
	</div><!--header-->

	<div class="osaka_hoikushi_kyuzin_container">
		<div class="osaka_hoikushi_kyuzin_contents">
			<h2>▼記事一覧</h2>
			<div class="osaka_hoikushi_kyuzin_tabel_flex">
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
			              <div class="osaka_hoikushi_kyuzin_tabel">
			                 <a href="<?php the_permalink(); ?>">
			                <div class="osaka_hoikushi_kyuzin_tabel_img">
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


			              <div class="osaka_hoikushi_kyuzin_tabel">
			                 <a href="<?php the_permalink(); ?>">
			                <div class="osaka_hoikushi_kyuzin_tabel_img">
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

		<div class="osaka_hoikushi_kyuzin_contents_2">
			<div id="cate">
			<h2>▼カテゴリ一覧</h2>
			<div class="osaka_hoikushi_kyuzin_tabel_flex">

				<?php
          $categories = get_categories(array('hide_empty' => 0,'number' => 3));

          foreach($categories as $category) {

            $current_term = get_queried_object();

            $image = get_field('thumbnail', $category->taxonomy . '_' . $category->term_id );
            ?>

            <div class="osaka_hoikushi_kyuzin_tabel">
              <a href="#">
              <div class="osaka_hoikushi_kyuzin_tabel_img">
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

		<div class="osaka_hoikushi_kyuzin_contents">
			<div id="link">
			<h2>▼外部リンク一覧</h2>
			<div class="osaka_hoikushi_kyuzin_tabel_flex">


				<?php query_posts( array( 'post_type' =>array('postSecond'))); ?>
				<?php if (have_posts()) : while(have_posts()) : the_post(); ?>

					<div class="osaka_hoikushi_kyuzin_tabel">
						 <a href="<?php the_permalink(); ?>">
						<div class="osaka_hoikushi_kyuzin_tabel_img">
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
