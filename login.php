<?php
include('header.php');
include('Account.php');
$user = new Account($db);
?>
<?php
if (isset($_POST['btnLogin'])) {
    $users = $user->login($_POST['username'], md5($_POST['password']));
}
?>
<div>
    <form action="login.php" method="post">
        <h4>Admin Login</h4>
        <div class="col-md-4">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" placeholder="username" />
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password-field" data-toggle="password">
            </div>
            <div class="form-group">
                <button type="submit" name="btnLogin" class="btn btn-success">Welcome</button>
            </div>
        </div>
    </form>
</div></br>
<div>
    Username: blog
    Password: blog123
</div>