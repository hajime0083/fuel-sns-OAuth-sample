<h3><?php echo $word; ?></h3>
<p>
    ログインユーザーのタイムラインに投稿するテスト
</p>

<?php if($result <> ""){?>
<p><?php echo $result?></p>
<?php } ?>

<?php if($login){
echo Form::open(array('action' => 'fb/post', 'method' => 'post'));
echo Form::textarea('postbox', $post , array('rows' => 6, 'cols' => 8,'id'=>'postbox','name'=>'postbox'));
echo "<br />";
echo Form::input('submit', '投稿', array('type' => 'submit'));
echo Form::close();
}else{ ?>
<p>ログインしていないため、投稿テストは出来ません。</p>
<?php } ?>

