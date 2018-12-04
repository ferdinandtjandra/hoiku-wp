
<?php get_header(); ?>
<body>
<div id="wrapper"><!--wrapperここから -->
<div id="kotei">
<div class="hoikushi_part_body-page">
  <h1>パート保育士としてはたらく！〜給料・求人まとめてみました〜</h1>
</div>

<div class="hoikushi_part_mainimg"><img src="<?php echo get_template_directory_uri(); ?>/images/mainimg.png" class="hoikushi_part_mainimg" /></div>
</div>
<div class="hoikushi_part_container">
<div class="hoikushi_part_right">



  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <h2><?php the_title(); ?></h2>
    <p>
    <img src="<?php echo get_template_directory_uri(); ?>/images/pic01.png" class="hoikushi_part_pic1" />
    <?php the_content(); ?>

  <?php endwhile; else : ?>
        <article>
          <p>no post</p>
        </article>
  <?php endif;  wp_reset_query();?>



<h2>保育士の方が転職を考えるとしたら</h2>
<p>
<img src="images/pic02.png" class="hoikushi_part_pic2" />
これから資格を持っている保育士（※こちらに関しての詳細内容は、<a href="#">武蔵野大学のウエブサイト「資格課程履修ガイド&nbsp;|保育士」</a>を参考にして下さい。）の方が転職を考えるとしたら、まずは求人情報を探さなければいけませんが、それには自分自身で行動を起こすことが重要です。黙っていても絶対に手に入る情報ではないので、そこを理解しておきましょう。<br/ ><br/ >仕事の情報に関しては、インターネット上から確認するのが基本です。ネット上で保育士の仕事ばかりピックアップしている非常に心強いサイトがあるので、そういったところで転職求人情報を見つけ出してみましょう。<br/ ><br/ >転職求人情報サイトを見つけることができたら、新しい仕事が入る度にメールマガジンで連絡が入るように設定しておくのが基本です。そのような工夫をして、保育士の新しい求人情報が出るたびに、見逃さないようにしておきましょう。</p>


<div class="hoikushi_part_tsuiki">
<h2>追記</h2>
<p>追記テキスト追記テキスト追記テキスト追記テキスト追記テキスト追記テキスト追記テキスト追記テキスト追記テキスト</p>
</div><!--tsuiki-->

</div>


<?php get_sidebar(); ?>

<br class="hoikushi_part_clear" />
</div>
</div><!--wrapperここまで-->
<div class="hoikushi_part_footnavi">サイトタイトル.</div>

</body>
</html>
