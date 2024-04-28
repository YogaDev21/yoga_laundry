<!DOCTYPE html>
<html data-bs-theme="dark" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="../../style/style.css">
    <link rel="stylesheet" href="../../style/bootstrap.min.css">
    <link rel="shortcut icon" href="../../assets/logoIcon.png" type="image/x-icon">
    <script src="../../javascript/bootstrap.bundle.min.js"></script>
</head>

<body class="min-vh-100 d-flex">
    <div class="container d-flex align-items-center justify-content-center">
        <div class="col-xl-5 ">
            <div class="card rounded-3 text-black">
                <div class="card-body p-md-5 mx-md-4 text-white">
                    <div class="text-center">
                        <h4 class="mt-1 mb-5 pb-1">Login To Yoga Laundry</h4>
                    </div>
                    <form action="login_proses.php" method="POST">
                        <label for="formGroupExampleInput" class="form-label">Username</label>
                        <div class="form-outline mb-4">
                            <input type="text" name="username" class="form-control" id="formGroupExampleInput" placeholder="username">
                        </div>

                        <label for="formGroupExampleInput2" class="form-label">Password</label>
                        <div class="form-outline mb-4">
                            <input type="password" name="password" class="form-control" id="formGroupExampleInput2" placeholder="password">
                        </div>
                        <div class=" pt-1 pb-1">
                            <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 w-100" type="submit">Log
                                in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>