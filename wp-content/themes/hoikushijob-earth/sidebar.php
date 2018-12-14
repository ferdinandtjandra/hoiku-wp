
<div class="hoikushi_part_left">
<div class="hoikushi_part_box">
<h3>関連記事</h3>
<ul>
	<?php
	//GET POST SAME CATEGORY
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

	<li class="hoikushi_part_sidebar">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</li>

	<?php
	// End loop
	endforeach;

	// Reset post data
	wp_reset_postdata(); ?>




</div>

<div class="hoikushi_part_box">
<h3>サイトカテゴリ</h3>
<ul>
	<?php
	 // GET CATEGORY LIST
		$categories = get_categories(array('hide_empty' => 0,'number' => 3));

		foreach($categories as $category) {

			$current_term = get_queried_object();

			$image = get_field('thumbnail', $category->taxonomy . '_' . $category->term_id );
			?>

			<li class="hoikushi_part_sidebar">
				<a href="#"><?php echo $category->name; ?></a>
			</li>

			<?php
		}
		wp_reset_query();
	 ?>
</div>

<div class="hoikushi_part_box">
<h3>おすすめ外部リンク</h3>
<ul>
	<?php
	// GET RECOMMENDATION POST
	query_posts( array( 'post_type' =>array('post','postSecond'),'cat'=> 3,'posts_per_page' => 3)); ?>
	<?php if (have_posts()) : while(have_posts()) : the_post(); ?>
		<li class="hoikushi_part_sidebar">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</li>
	<?php endwhile; endif; wp_reset_query();  ?>
</div>






</div>
