<div id="fullscreen_bg" class="fullscreen_bg"/>

<div class="container">
    <?php if(isset($error)){?>
    <div class="alert alert-danger">
        <?= $error;?>
    </div>
    <?php } ?>
    <form class="form-signin" method="post" action="">
        <h1 class="form-signin-heading text-muted">Sign In</h1>
        <input type="text" class="form-control" name="login" placeholder="Email address" required="" autofocus="">
        <input type="password" class="form-control" name="password" placeholder="Password" required="">
        <button class="btn btn-lg btn-primary btn-block" type="submit">
            Sign In
        </button>
    </form>

</div>