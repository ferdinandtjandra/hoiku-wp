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

	<div class="hoikushi_tensyoku_matome_article">
		<h2>h2記事タイトル</h2>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <h3><?php the_title(); ?></h3>
  		<div class="hoikushi_tensyoku_matome_tabel_img">
  		  <img src="<?php echo get_template_directory_uri(); ?>/images/pic01.png">
  		</div><!--tabel_img-->
  		<p><?php the_content(); ?></p>
 
    <?php endwhile; else : ?>
          <article>
            <p>no post</p>
          </article>
    <?php endif;  wp_reset_query();?>



		<h3>記事見出し</h3>
	<div class="hoikushi_tensyoku_matome_tabel_img">
		<img src="images/pic1.jpg">
	</div><!--tabel_img-->
		<p>記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。記事テキストです。</p>
	<div class="hoikushi_tensyoku_matome_postscript"><!--追記用-->
	  <h3>追記タイトル</h3>
	  <div class="hoikushi_tensyoku_matome_tabel_img">
		<img src="images/pic1.jpg">
	  </div><!--tabel_img-->
			<p>追記テキスト追記テキスト追記テキスト追記テキスト追記テキスト追記テキスト追記テキスト追記テキスト追記テキスト追記テキスト追記テキスト追記テキスト追記テキスト追記テキスト追記テキスト追記テキスト追記テキスト追記テキスト追記テキスト追記テキスト追記テキスト追記テキスト追記テキスト追記テキスト追記テキスト追記テキスト追記テキスト追記テキスト追記テキスト追記テキスト追記テキスト追記テキスト追記テキスト追記テキスト</p>
		</div><!--postscript-->
	</div><!--article-->

    </div><!--container_article-->

    <div class="hoikushi_tensyoku_matome_contents">
			<div id="relation">
			<h2>▼関連記事</h2>
			<div class="hoikushi_tensyoku_matome_tabel_flex">

        <?php
        $args = [
            'posts_per_page' => 6,
        ];
        $loop = new WP_Query($args);

        if (have_posts()) : ?>
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
        <?php endif; ?>

			</div><!--tabel_wrap-->
		</div><!--contains-->
	</div><!--id=Relation-->


    <div class="hoikushi_tensyoku_matome_contents_2">
    	<div id="cate">
			<h2>▼カテゴリ一覧</h2>
			<div class="hoikushi_tensyoku_matome_tabel_flex">
        <?php if (query_posts('cat=2')) : ?>
          <?php while ($loop->have_posts()) : $loop->the_post(); ?>
              <div class="hoikushi_tensyoku_matome_tabel">
                <a href="<?php the_permalink() ?>">
                <div class="hoikushi_tensyoku_matome_tabel_img">
                      <?php
                        $image = get_field('thumbnail');
                        if( !empty($image) ): ?>
                          <img src="<?php echo $image['url']; ?>" />
                        <?php endif; ?>
                      </div><!--tabel_img-->
                <h3><?php the_title();?></h3>
                <p><?php the_excerpt(); ?></p>
                </a>
              </div><!--tabel-->
          <?php endwhile; ?>
        <?php else : ?>
          <h3>There is no posts</h3>
        <?php endif; wp_reset_query();?>
			</div><!--tabel_wrap-->
		</div><!--contains-->
	</div><!--id=cate-->

		<div class="hoikushi_tensyoku_matome_contents">
			<div id="link">
			<h2>▼おすすめ外部リンク</h2>
			<div class="hoikushi_tensyoku_matome_tabel_flex">
        <?php query_posts( array( 'post_type' =>array('post','postSecond'))); ?>
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
