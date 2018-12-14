<?php get_header(); ?>

<body>
<div class="hoikushi_tokyo_wrapper">
	<?php get_sidebar(); ?>
     <div class="hoikushi_tokyo_container">
			 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
       <div class="hoikushi_tokyo_article"><!--記事-->
       	<div class="hoikushi_tokyo_article_title">
       	   <div class="hoikushi_tokyo_article_img"></div>
       	   <div class="hoikushi_tokyo_article_img_sp"></div>
           <h2><?php the_title(); ?></h2>
        </div><!--title-->




							<p<?php the_content(); ?></p>
	        <?php endwhile; else : ?>
	              <article>
	                <p>no post</p>
	              </article>
	        <?php endif;  wp_reset_query();?>

             <div class="hoikushi_tokyo_postscript"><!--追記用-->
              <h3>追記タイトル</h3>

              <?php the_field('information'); ?>
						 </div><!--postscript--></p>

       </div><!--article-->
       <div id="category">
        <div class="hoikushi_tokyo_category">
         <h2>カテゴリー</h2>
          <div class="hoikushi_tokyo_category_wrap">

							 <?php
							 	// GET CATEGORY LIST
								 $categories = get_categories(array('hide_empty' => 0,'number' => 3));

								 foreach($categories as $category) {

									 $current_term = get_queried_object();

									 $image = get_field('thumbnail', $category->taxonomy . '_' . $category->term_id );
									 ?>
									 <div class="hoikushi_tokyo_category_aria">
										 <ul>
									 <li>
										<a href="#">
											<h3><?php echo $category->name; ?></h3>
											 <div class="hoikushi_tokyo_category_img">
											<img src="<?php echo $image['url']; ?>">
											 </div><!--category_img-->
												<p><?php echo $category->description; ?></p>
										 </a>
									 </li>
									 </div><!--category_aria-->
									 <?php
								 }
								 wp_reset_query();
								?>
					 </ul>
           </div><!--category_wrap-->
        </div><!--category-->

        <div id="relation">
        <div class="hoikushi_tokyo_category">
         <h2>関連記事</h2>
          <div class="hoikushi_tokyo_category_wrap">

								<?php
								//GET POST SAME CATEGORY
								$post_id = get_the_ID();
								$categories = get_the_category( $post_id );

								$args = array(
								 'posts_per_page' => 3, // How many items to display
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

								<div class="hoikushi_tokyo_category_aria">
		            <ul>
		              <li>
		                <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>">
		                  <h3><?php the_title(); ?></h3>
		                   <div class="hoikushi_tokyo_category_img">
												 <?php
	 				                   $image = get_field('thumbnail');
	 				                   if( !empty($image) ): ?>
	 				                     <img src="<?php echo $image['url']; ?>" />
	 				                   <?php endif; ?>
		                   </div><!--category_img-->
		                   <p><?php the_excerpt(); ?></p>
		                </a>
		              </li>
		          </div><!--category_aria-->


								<?php
								// End loop
								endforeach;

								// Reset post data
								wp_reset_postdata(); ?>


          </div><!--category_wrap-->
        </div><!--category-->

        <div id="links">
         <div class="hoikushi_tokyo_category">
          <h2>東京の保育士求人についておすすめのブログ</h2>
           <div class="hoikushi_tokyo_category_wrap">

						 <?php
						 // GET RECOMMENDATION POST
						 query_posts( array( 'post_type' =>array('post','postSecond'),'cat'=> 3,'posts_per_page' => 3)); ?>
			       <?php if (have_posts()) : while(have_posts()) : the_post(); ?>
								 <div class="hoikushi_tokyo_category_aria">
									 <ul>
										 <li>
											 <a href="<?php the_permalink(); ?>">
												 <h3><?php the_title(); ?></h3>
													<div class="hoikushi_tokyo_category_img">
														<?php
	 															 $image = get_field('thumbnail');
	 															 if( !empty($image) ):
		 												 ?>
		 															 <img src="<?php echo $image['url']; ?>">
		 												 <?php endif; ?>
													</div><!--category_img-->
													<p><?php the_excerpt(); ?></p>
											 </a>
										 </li>
								 </div><!--category_aria-->
			       <?php endwhile; endif; wp_reset_query();  ?>
      </ul>
           </div><!--category_wrap-->
        </div><!--category-->

  <?php get_footer(); ?>
