
<?php get_header(); ?>
<body>
<div class="hoikushi_part_wrapper">
	<div class="hoikushi_part_header">
		<div class="hoikushi_part_topimg">
			<h1>パート保育士としてはたらく！<br>〜給料・求人まとめてみました〜</h1>
		</div><!--topimg-->
	</div><!--header-->

	<div class="hoikushi_part_container">

			<div class="hoikushi_part_title">
				 <h2>保育士転職記事一覧</h2>
			</div>

			<div class="hoikushi_part_article">

        <?php
        $args = [
            'posts_per_page' => 6,
        ];
        $loop = new WP_Query($args);

        if (have_posts()) : ?>
          <?php while ($loop->have_posts()) : $loop->the_post();  ?>

            <div class="hoikushi_part_article_tabel">
      				<a href="<?php the_permalink(); ?>">
      				<div class="hoikushi_part_article_img">
                <?php
                      $image = get_field('thumbnail');
                      if( !empty($image) ):
                ?>
                      <img src="<?php echo $image['url']; ?>">
                <?php endif; ?>
      				</div>
      					<h2><?php the_title(); ?></h2>
      					<p><?php the_excerpt(); ?></p>
      				</a>
      			</div><!--article_tabel-->

          <?php endwhile; ?>
        <?php else : ?>
            <h3>There is no posts</h3>
        <?php endif; ?>


		</div><!--article-->

			<div class="hoikushi_part_title">
				 <h2>カテゴリ一覧</h2>
			</div>

			<div class="hoikushi_part_article">

        <?php if (query_posts('cat=2')) : ?>
          <?php while ($loop->have_posts()) : $loop->the_post(); ?>

            <div class="hoikushi_part_article_tabel">
      				<a href="<?php the_permalink() ?>">
      				<div class="hoikushi_part_article_img">
                <?php
                  $image = get_field('thumbnail');
                  if( !empty($image) ): ?>
                    <img src="<?php echo $image['url']; ?>" />
                  <?php endif; ?>
      				</div>
      					<h2><?php the_title();?></h2>
      					<p><?php the_excerpt(); ?></p>
      				</a>
      			</div><!--article_tabel-->
          <?php endwhile; ?>
        <?php else : ?>
          <h3>There is no posts</h3>
        <?php endif; wp_reset_query();?>



		</div><!--article-->



			<div class="hoikushi_part_title">
				 <h2>外部リンク一覧</h2>
			</div>

			<div class="hoikushi_part_article">

			<div class="hoikushi_part_article_tabel">
				<a href="#">
				<div class="hoikushi_part_article_img">
					<img src="images/article_img.jpg">
				</div>
					<h2>記事タイトル</h2>
					<p>記事テキスト記事テキスト記事テキスト記事テキスト記事テキスト記事テキスト記事テキスト記事テキスト記事テキスト</p>
				</a>
			</div><!--article_tabel-->


      <?php query_posts( array( 'post_type' =>array('post','postSecond'))); ?>
      <?php if (have_posts()) : while(have_posts()) : the_post(); ?>

        <div class="hoikushi_part_article_tabel">
          <a href="<?php the_permalink(); ?>">
          <div class="hoikushi_part_article_img">
            <?php
                  $image = get_field('thumbnail');
                  if( !empty($image) ):
            ?>
                  <img src="<?php echo $image['url']; ?>">
            <?php endif; ?>
          </div>
            <h2><?php the_title(); ?></h2>
            <p><?php the_excerpt(); ?></p>
          </a>
        </div><!--article_tabel-->
      <?php endwhile; endif; wp_reset_query();  ?>



			 
		</div><!--article-->


	</div><!--container-->
  <?php get_footer(); ?>