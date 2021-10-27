<?php
include("../config/config.php");
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<main>
    <div class="container-fluid">
        <div class="d-flex justify-content-center d-flex align-items-center" style="height: 200px;">
            <h1>LOGIN</h1>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <form action="process-login.php" method="POST">
                    <div class="mb-3">
                        <label for="txtUsername" class="form-label">UserName</label>
                        <input name="txtUsername" type="text" class="form-control" aria-describedby="emailHelp">
                        <div class="form-text">Enter Username</div>
                    </div>
                    <div class="mb-3">
                        <label for="txtPassword" class="form-label">Password</label>
                        <input name="txtPassword" type="password" class="form-control">
                        <div class="form-text">Enter Password</div>

                    </div>
                    <button name="btnlogin" type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
</main>

