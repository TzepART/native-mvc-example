<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <a class="navbar-brand" href="<?= URL_ROOT; ?>"><?= SITE_NAME; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= URL_ROOT; ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= URL_ROOT; ?>/page/about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= URL_ROOT;?>/post">Posts</a>
            </li>
        </ul>

        <ul class="navbar-nav mr-right">
            <?php if( isset($_SESSION['user_login'])) : ?>
                <span class="navbar-text pl-5">User logged:</span>
                <li class="nav-item dropdown pr-5">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i> <?= $_SESSION['user_login'];?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?= URL_ROOT;?>/user/logout"><i class="fa fa-power-off"></i> Logout</a>
                    </div>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL_ROOT;?>/user/login">Login</a>
                </li>
            <?php endif; ?>
        </ul>
</nav>
