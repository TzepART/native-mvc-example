<?php
require APP_SRC_ROOT . 'View/include/header.php';
/** @var \Model\Form\PostForm $data */
?>
<a href="<?= URL_ROOT; ?>/post" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<div class="card card-body bg-light mt-5">
    <h3>Add Post</h3>
    <p>Create a new post</p>
    <form action="<?= URL_ROOT; ?>/post/add" method="post">
        <div class="form-group">
            <label for="title">Title: <sup>*</sup></label>
            <input type="text" name="title"
                   class="form-control form-control <?= $data->getFieldByName('title')->isValidField() ? '' : 'is-invalid' ?>"
                   value="<?= $data->getFieldByName('title')->getFormattingValue() ?>">
            <span class="invalid-feedback"><?= $data->getFieldByName('title')->getError() ?></span>
        </div>
        <div class="form-group">
            <label for="name">Body: <sup>*</sup></label>
            <textarea name="body"
                      class="form-control form-control <?= $data->getFieldByName('body')->isValidField() ? '' : 'is-invalid' ?>">
                <?= $data->getFieldByName('body')->getFormattingValue() ?>
            </textarea>
            <span class="invalid-feedback"><?= $data->getFieldByName('body')->getError() ?></span>
        </div>
        <input type="submit" class="btn btn-success" value="Submit"/>
    </form>
</div>
<?php require APP_SRC_ROOT . 'View/include/footer.php' ?>
