<?php get_header(); ?>

<body>
<div class="hoikushi_tokyo_wrapper">
	<?php get_sidebar(); ?>
     <div class="hoikushi_tokyo_container">
       <div class="hoikushi_tokyo_article"><!--記事-->
       	<div class="hoikushi_tokyo_article_title">
       	   <div class="hoikushi_tokyo_article_img"></div>
       	   <div class="hoikushi_tokyo_article_img_sp"></div>
           <h2>h2 ここに記事のタイトルをいれます。この画像は記事のカバー写真です</h2>
        </div><!--title-->

					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<h3><?php the_title(); ?></h3>
							<div class="hoikushi_tokyo_article_picter">
	             <img src="<?php echo get_template_directory_uri(); ?>/images/pic01.png">
							</div>
							<p<?php the_content(); ?></p>
	        <?php endwhile; else : ?>
	              <article>
	                <p>no post</p>
	              </article>
	        <?php endif;  wp_reset_query();?>



            <h3>ｈ３タイトル</h3>
             <div class="hoikushi_tokyo_article_picter">
               <img src="<?php echo get_template_directory_uri(); ?>/images/pic01.png">
             </div>
             <p>保育士（※詳細情報は、<a href="#">堺女子短期大学のオフィシャルHP「保育士コース | コース説明 」</a>をご参照ください。）の転職とは、思った以上に見かけるものだといえます。あまりやるイメージがないかもしれませんが、保育士はいろいろなところで働けるチャンスがあるので、今の職場で納得できない部分があるなら、積極的に転職した方が良いでしょう。<br/ ><br/ >ちなみに、転職するなら言うまでもなく求人情報を探す必要があります。求人情報を探すならインターネットから探すのが1番楽ですが、本格的に探してもらうならハローワークで探してもらうのが1番だと言えるでしょう。<br/ ><br/ >ハローワークを利用しながらも、仕事情報専門雑誌などの雑誌に目を向けるのも良いです。インターネットと併用して、全国各地にある保育士の求人情報を探すようにすれば、問題なく働きたい場所が見つかるようになるでしょう。転職のチャンスはいろいろなところにあります。

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
						$args = [
			          'posts_per_page' => 6,
			      ];
			      $loop = new WP_Query($args);
						if (have_posts()) : ?>
			          <?php while ($loop->have_posts()) : $loop->the_post();  ?>

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
	 					                      <img src="<?php echo $image['url']; ?>" />
	 					              <?php endif; ?>
			              	   </div><!--category_img-->
			                   <p><?php the_excerpt(); ?></p>
											 </a>
			              </li>
			          </div><!--category_aria-->
			          <?php endwhile; ?>
			      <?php else : ?>
			            <h3>There is no posts</h3>
			      <?php endif; ?>

            </ul>
           </div><!--category_wrap-->
        </div><!--category-->

        <div id="relation">
        <div class="hoikushi_tokyo_category">
         <h2>関連記事</h2>
          <div class="hoikushi_tokyo_category_wrap">

						<?php if (query_posts('cat=4')) : ?>
		          <?php while ($loop->have_posts()) : $loop->the_post(); ?>

		            <div class="hoikushi_tokyo_category_aria">
		            <ul>
		              <li>
		                <a href="<?php the_permalink() ?>">
		                  <h3><?php the_title();?></h3>
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
		          <?php endwhile; ?>
		        <?php else : ?>
		          <h3>There is no posts</h3>
		        <?php endif; wp_reset_query(); ?>
            </ul>
           </div><!--category_wrap-->
        </div><!--category-->

        <div id="links">
         <div class="hoikushi_tokyo_category">
          <h2>東京の保育士求人についておすすめのブログ</h2>
           <div class="hoikushi_tokyo_category_wrap">

						 <?php query_posts( array( 'post_type' =>array('post','postSecond'),'posts_per_page' => 6)); ?>
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
