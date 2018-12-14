
<?php get_header(); ?>
<body>
<div id="wrapper"><!--wrapperここから -->
<div id="kotei">
<div class="hoikushi_part_body-page">
  <h1>パート保育士としてはたらく！〜給料・求人まとめてみました〜</h1>
</div>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="hoikushi_part_mainimg"><?php
      $image = get_field('thumbnail');
      if( !empty($image) ):
?>
        <img src="<?php echo $image['url']; ?>" />
<?php endif; ?></div>
</div>
<div class="hoikushi_part_container">
<div class="hoikushi_part_right">




    <h2><?php the_title(); ?></h2>
    <p>
    <?php the_content(); ?>

  <?php endwhile; else : ?>
        <article>
          <p>no post</p>
        </article>
  <?php endif;  wp_reset_query();?>



<div class="hoikushi_part_tsuiki">
<h2>追記</h2>
<p><?php the_field('information'); ?></p>
</div><!--tsuiki-->

</div>


<?php get_sidebar(); ?>

<br class="hoikushi_part_clear" />
</div>
</div><!--wrapperここまで-->
<div class="hoikushi_part_footnavi">サイトタイトル.</div>

</body>
</html>
