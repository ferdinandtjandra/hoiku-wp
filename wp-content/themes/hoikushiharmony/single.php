<?php get_header(); ?>


<body>
<div class="hoikushi_tensyoku_matome_wrapper">
	<div class="hoikushi_tensyoku_matome_header">
		<div class="hoikushi_tensyoku_matome_topimg">
			<div class="hoikushi_tensyoku_matome_kodomo">
			</div>
			<h1>サイトタイトルサイトタイトルサイトタイトル<br>サイトタイトルサイトタイトル</h1>
		</div><!--topimg-->
		<div class="hoikushi_tensyoku_matome_menu">
			 <?php get_sidebar(); ?>
		</div><!--menu-->
	</div><!--header-->

	<div class="hoikushi_tensyoku_matome_container_article">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="hoikushi_tensyoku_matome_article">
			<h2><?php the_title(); ?></h2>


      <h3>記事見出し</h3>
  		<div class="hoikushi_tensyoku_matome_tabel_img">
  		</div><!--tabel_img-->
  		<p><?php the_content(); ?></p>

    <?php endwhile; else : ?>
          <article>
            <p>no post</p>
          </article>
    <?php endif;  wp_reset_query();?>




	<div class="hoikushi_tensyoku_matome_postscript"><!--追記用-->
	  <h3>追記タイトル</h3>
	  <div class="hoikushi_tensyoku_matome_tabel_img">

	  </div><!--tabel_img-->
			<p><?php the_field('information'); ?></p>
		</div><!--postscript-->
	</div><!--article-->

    </div><!--container_article-->

    <div class="hoikushi_tensyoku_matome_contents">
			<div id="relation">
			<h2>▼関連記事</h2>
			<div class="hoikushi_tensyoku_matome_tabel_flex">

				<?php
				//GET POST SAME CATEGORY POST
				$post_id = get_the_ID();
				$categories = get_the_category( $post_id );

				$args = array(
				 'posts_per_page' => 6, // How many items to display
				 'post__not_in'   => array( get_the_ID() ), // Exclude current post
				 'no_found_rows'  => true, // We don't ned pagination so this speeds up the query
				);

				$cats = wp_get_post_terms( get_the_ID(), 'category' );
				$cats_ids = array();
				foreach( $cats as $wpex_related_cat ) {
				 $cats_ids[] = $wpex_related_cat->term_id;
				}
				if ( ! empty( $cats_ids ) ) {
				 $args['category__in'] = $cats_ids;
				}

				// Query posts
				$wpex_query = new wp_query( $args );

				// Loop through posts
				foreach( $wpex_query->posts as $post ) : setup_postdata( $post );
				?>

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




				<?php
				// End loop
				endforeach;

				// Reset post data
				wp_reset_postdata(); ?>







			</div><!--tabel_wrap-->
		</div><!--contains-->
	</div><!--id=Relation-->


    <div class="hoikushi_tensyoku_matome_contents_2">
    	<div id="cate">
			<h2>▼カテゴリ一覧</h2>
			<div class="hoikushi_tensyoku_matome_tabel_flex">

				<?php
				 // GET CATEGORY LIST
					$categories = get_categories(array('hide_empty' => 0,'number' => 3));

					foreach($categories as $category) {

						$current_term = get_queried_object();

						$image = get_field('thumbnail', $category->taxonomy . '_' . $category->term_id );
						?>
						<div class="hoikushi_tensyoku_matome_tabel">
							<a href="<?php echo "/category/".$category->slug  ?>">
							<div class="hoikushi_tensyoku_matome_tabel_img">
										<img src="<?php echo $image['url']; ?>">
										</div><!--tabel_img-->
							<h3><?php echo $category->name; ?></h3>
							<p><?php echo $category->description; ?></p>
							</a>
						</div><!--tabel-->



						<?php
					}
					wp_reset_query();
				 ?>




			</div><!--tabel_wrap-->
		</div><!--contains-->
	</div><!--id=cate-->

		<div class="hoikushi_tensyoku_matome_contents">
			<div id="link">
			<h2>▼おすすめ外部リンク</h2>
			<div class="hoikushi_tensyoku_matome_tabel_flex">

				<?php
				// GET RECOMMENDATION POST
				query_posts( array( 'post_type' =>array('post','postSecond'),'cat'=> 3,'posts_per_page' => 3)); ?>
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
		</div><!--contains-->
	</div><!--id=cate-->

  <?php get_footer(); ?>
