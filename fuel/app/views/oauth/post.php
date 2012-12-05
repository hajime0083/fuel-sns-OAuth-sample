<h3><?php echo $word; ?></h3>
<p>
    ログインユーザーのタイムラインに投稿するテスト
</p>

<?php if($result <> ""){?>
<p><?php echo $result?></p>
<?php } ?>

<?php if($login){
echo Form::open(array('action' => 'oauth/post', 'method' => 'post'));
echo Form::textarea('tweetbox', $tweet , array('rows' => 6, 'cols' => 8,'id'=>'tweetbox','name'=>'tweetbox'));
echo "<br />";
echo Form::input('submit', 'Tweet', array('type' => 'submit'));
echo Form::close();
}else{ ?>
<p>ログインしていないため、投稿テストは出来ません。</p>
<?php } ?>

