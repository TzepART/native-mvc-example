<?php
require APP_SRC_ROOT . 'View/include/header.php';
/** @var \Model\Form\PostForm $postForm */
$postForm = $data[0];
$postId = $data[1];
?>
    <a href="<?= URL_ROOT; ?>/post" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
    <div class="card card-body bg-light mt-5">
        <h3>Add Post</h3>
        <p>Update your post</p>
        <form action="<?= URL_ROOT; ?>/post/edit/<?= $postId ?>" method="post">
            <div class="form-group">
                <label for="title">Title: <sup>*</sup></label>
                <input type="text" name="title"
                       class="form-control form-control <?= $postForm->getFieldByName('title')->isValidField() ? '' : 'is-invalid' ?>"
                       value="<?= $postForm->getFieldByName('title')->getFormattingValue() ?>">
                <span class="invalid-feedback"><?= $postForm->getFieldByName('title')->getError() ?></span>
            </div>
            <div class="form-group">
                <label for="name">Body: <sup>*</sup></label>
                <textarea name="body"
                          class="form-control form-control <?= $postForm->getFieldByName('body')->isValidField() ? '' : 'is-invalid' ?>">
                <?= $postForm->getFieldByName('body')->getFormattingValue() ?>
            </textarea>
                <span class="invalid-feedback"><?= $postForm->getFieldByName('body')->getError() ?></span>
            </div>
            <input type="submit" class="btn btn-success" value="Submit"/>
        </form>
    </div>
<?php require APP_SRC_ROOT . 'View/include/footer.php' ?>