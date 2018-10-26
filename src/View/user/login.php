<?php
require APP_SRC_ROOT.'View/include/header.php';
/** @var \Model\Form\LoginForm $data */
?>
<div class="row">
<div class="col-md-6 mx-auto">
  <div class="card card-body bg-light mt-5">
     <h3>Login</h3>
     <p>Please fill in your credentials to login</p>
     <form action="<?= URL_ROOT; ?>/user/login" method="post">
        <div class="form-group">
           <label for="name">Login: <sup>*</sup></label>
            <input type="text" name="login" class="form-control form-control
            <?= $data->getFieldByName('login')->isValidField() ? '' : 'is-invalid';?>"
                   value="<?= $data->getFieldByName('login')->getValue(); ?>">
           <span class="invalid-feedback"><?= $data->getFieldByName('login')->getError(); ?></span>
        </div>
        <div class="form-group">
           <label for="name">Password: <sup>*</sup></label>
           <input type="password" name="password" class="form-control form-control
            <?= $data->getFieldByName('password')->isValidField() ? '' : 'is-invalid';?>"
           >
           <span class="invalid-feedback"><?= $data->getFieldByName('password')->getError(); ?></span>
        </div>
        <div class="row">
           <div class="col">
              <input type="submit" value="Login" class="btn btn-success btn-block"/>
           </div>
        </div>
     </form>
  </div>
</div>
<?php require APP_SRC_ROOT.'View/include/footer.php' ?>