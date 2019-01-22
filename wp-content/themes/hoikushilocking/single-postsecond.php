<?php get_header() ?>

<body>
<div class="youchienkyouyu_kyuzin_wrapper">
<!--<div class="header">
</div>-->
<div class="youchienkyouyu_kyuzin_mainimg">
</div>
<div class="youchienkyouyu_kyuzin_container">
	<div class="youchienkyouyu_kyuzin_top">

	</div>
<div class="youchienkyouyu_kyuzin_rightside">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


      <h2><?php the_title(); ?></h2>
      <p>
        <?php the_content(); ?>

  <?php endwhile; else : ?>
        <article>
          <p>no post</p>
        </article>
  <?php endif;  wp_reset_query();?>

<div class="youchienkyouyu_kyuzin_tsuiki">
	<h2>ここから追記</h2>
<p>
<?php the_field('information'); ?>

</div><!--tsuiki-->
</div><!--rightside-->


<div class="youchienkyouyu_kyuzin_leftside">
<h3>おすすめ外部リンク</h3>
<ul>
	<?php
	// GET RECOMMENDATION POST
	query_posts( array( 'post_type' =>array('post','postSecond'),'cat'=> 3,'posts_per_page' => 3)); ?>
	<?php if (have_posts()) : while(have_posts()) : the_post(); ?>

		<li class="youchienkyouyu_kyuzin_sub">
			<a href="<?php the_permalink(); ?>">
			<div class="youchienkyouyu_kyuzin_gazou">
			</div><!--gazou-->
			<h4><?php the_title(); ?></h4>
			<p><?php the_excerpt(); ?></p>
		    </a>
		</li>



	<?php endwhile; endif; wp_reset_query();  ?>



</ul>
<h3>関連記事</h3>
<ul>
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

	<li class="youchienkyouyu_kyuzin_sub">
	<a href="<?php the_permalink(); ?>">
	<div class="youchienkyouyu_kyuzin_gazou">
	</div><!--gazou-->
	<h4><?php the_title(); ?></h4>
	<p><?php the_excerpt(); ?></p>
		</a>
	</li>



	<?php
	// End loop
	endforeach;

	// Reset post data
	wp_reset_postdata(); ?>


<h3>カテゴリ一覧</h3>
<ul>

	<?php
	 // GET CATEGORY LIST
		$categories = get_categories(array('hide_empty' => 0,'number' => 3));

		foreach($categories as $category) {

			$current_term = get_queried_object();

			$image = get_field('thumbnail', $category->taxonomy . '_' . $category->term_id );
			?>
			<li class="youchienkyouyu_kyuzin_sub">
				<a href="<?php echo "/category/".$category->slug  ?>">
				<div class="youchienkyouyu_kyuzin_gazou">
				</div><!--gazou-->
				<h4><?php echo $category->name; ?></h4>
				<p><?php echo $category->description; ?></p>
			    </a>
			</li>
			<?php
		}
		wp_reset_query();
	 ?>

</ul>

</div>
<br class="youchienkyouyu_kyuzin_clear" />
</div>
<div class="youchienkyouyu_kyuzin_footer">
	<p>Copyright(C)www.hoikushilocking.net All Rights Reserved. </p>
</div><!--footer-->
</div><!--wrapper-->
</body>
</html>
