<?php require APP_SRC_ROOT.'View/include/header.php' ?>
<a href="<?php echo URL_ROOT; ?>/post" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<br/>
<h1><?php echo $data['post']->title; ?></h1>
<div class="bg-secondary text-white p-2 mb-3">
    Written on <?php echo \Helper\DateTimeHelper::helper_format_date($data['post']->created_at); ?>
</div>
<p class="breakline"><?php echo $data['post']->body; ?></p>
<hr>
<a href="<?php echo URL_ROOT; ?>/post/edit/<?php echo $data['post']->id; ?>" class="btn btn-dark">Edit</a>
<form class="pull-right" action="<?php echo URL_ROOT; ?>/post/delete/<?php echo $data['post']->id; ?>" method="post">
    <input type="submit" value="Delete" class="btn btn-danger">
</form>
<?php require APP_SRC_ROOT.'View/include/footer.php' ?>
