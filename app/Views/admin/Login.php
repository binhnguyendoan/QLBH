<?php
include '../admin/Header.php';
include '../../Controllers/AdminloginController.php';
?>
<?php
$class = new adminlogin();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adminUser = $_POST['User'];
    $adminPass = md5($_POST['Pass']);

    $login_check = $class->login_admin($adminUser, $adminPass);
}
?>

<body>
    <div class="container tm-mt-big tm-mb-big">
        <div class="row">

            <div class="col-12 mx-auto tm-login-col">
                <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h2 class="tm-block-title mb-4">Welcome to Dashboard, Login</h2>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <form action="Login.php" method="post" class="tm-login-form">
                                <span>
                                    <?php if (isset($login_check)) {
                                        echo $login_check;
                                    } ?></span>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input name="User" type="text" class="form-control validate" id="username" value=""
                                        required />
                                </div>
                                <div class="form-group mt-3">
                                    <label for="password">Password</label>
                                    <input name="Pass" type="password" class="form-control validate" id="password"
                                        value="" required />
                                </div>
                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-primary btn-block text-uppercase">
                                        Login
                                    </button>
                                </div>
                                <button class="mt-5 btn btn-primary btn-block text-uppercase">
                                    Forgot your password?
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '../admin/Footer.php' ?>
</body>