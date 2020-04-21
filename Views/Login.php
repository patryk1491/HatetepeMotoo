<?php
    if(isset($_POST['submit'])){
        LoginController::loginAction();
    }
?>

<div class="login">
    <h2>Log in</h2>
    <form method="post" action="">
        <div class="form-group">
            <label for="formGroupExampleInput">Login</label>
            <input name="username" type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter login">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Log in</button>
    </form>
</div>

