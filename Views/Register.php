<?php
    if(isset($_POST['submit'])){
        RegisterController::registerAction();
    }
?>
<div class="login">
    <h2>Sign up</h2>
    <form method="post" action="">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" required aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Login</label>
            <input type="text" name="login" class="form-control" id="formGroupExampleInput" pattern=".{6,}" maxlength="25" required title="6 characters minimum" placeholder="Enter login">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Phone number</label>
            <input type="tel" name="phone" class="form-control" id="formGroupExampleInput" pattern="[0-9]{3} [0-9]{3} [0-9]{3}" maxlength="11" required placeholder="XXX XXX XXX" required title="XXX XXX XXX format">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" minlength="6" required id="exampleInputPassword1" placeholder="Enter password">
        </div>
        <div class="butcap">
            <div class="g-recaptcha" data-sitekey="6LeH0MIUAAAAACQpfmvUX6VePy48OHEJ6_kd9_ns"></div>
            <button type="submit" name="submit" class="btn btn-primary">Sign up!</button>
        </div>
    </form>

</div>