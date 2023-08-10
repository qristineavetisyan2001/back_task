<html>
<head>
    <link rel = "stylesheet" href = "<?= URL_ROOT; ?>/public/css/bootstrap.css">
</head>
<body>
<section class="vh-100" style="background-color: #f0c6fb;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <h3 class="mb-5">Sign in</h3>
                        <div class="form-outline mb-4">
                            <input type="email"  id="username"  placeholder = "Email:" class="user_name form-control form-control-lg" />
                        </div>
                        <div class="form-outline mb-4">
                            <input type="password"  id="password"  placeholder = "Password:" class="pass form-control form-control-lg" />
                        </div>
                        <!-- Checkbox -->
                        <div class="form-check d-flex justify-content-start mb-4">
                            <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                            <label class="form-check-label mx-2" for="form1Example3"> Remember password </label>
                        </div>
                        <button class="btn_login w-100 btn btn-primary btn-lg btn-block" type="submit">Login</button>
                        <hr class="my-4">
                        <div class = "error_mes"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src = "<?=URL_ROOT ?>/public/js/jquery.js"></script>
<script src = "<?=URL_ROOT ?>/public/js/bootstrap.js"></script>
<script src = "<?=URL_ROOT ?>/public/js/admin_main.js"></script>
</body>
</html>