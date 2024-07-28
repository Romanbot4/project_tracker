<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Tracker</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="js/validation.js" defer></script>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php echo view('components/header/header_plain') ?>
    <main class="d-flex flex-grow-1 justify-content-center align-items-center container">
        <form action="<?php echo base_url("sign-up") ?>" method="post" class="col-lg-5 col-md-7 col-12 p-md-4 rounded-4 mb-5 <?php echo empty($errors) ? "" : "was-validated" ?>" novalidate>
            <h3>Sign up</h3>
            <div class="d-flex flex-col mt-4">
                <div class="mt-2 flex-grow-1">
                    <label for="firstName" class="form-label">First name</label>
                    <input type="text" name="first_name" class="form-control" id="firstName" placeholder="e.g John" required minlength="5">
                    <span class="invalid-feedback"><?php echo $errors["first_name"] ?? "First name required" ?></span>
                </div>
                <div class="ms-2"></div>
                <div class="mt-2 flex-grow-1">
                    <label for="lastName" class="form-label">Second name</label>
                    <input type="text" name="last_name" class="form-control" id="lastName" placeholder="e.g Smith" required minlength="5">
                    <span class="invalid-feedback"><?php echo $errors["last_name"] ?? "Last name required" ?></span>
                </div>
            </div>
            <div class="mt-2">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" placeholder="e.g example@gmail.com" class="form-control" required minlength="5">
                <span class="invalid-feedback"><?php echo $errors["email"] ?? 'Enter valid email' ?></span>
            </div>
            <div class="mt-2">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required minlength="5">
                <span class="invalid-feedback"><?php echo $errors["password"] ?? 'Enter valid password' ?></span>
            </div>
            <div class="mt-2">
                <label for="confirmPassword" class="form-label">Confirm password</label>
                <input type="password" name="confirm_password" id="confirmPassword" class="form-control" required minlength="5">
                <span class="invalid-feedback"><?php echo $errors["confirm_password"] ?? 'Enter valid password' ?></span>
            </div>
            <button type="submit" class="btn btn-primary mt-4 w-100">Sign up</button>

            <div class="d-flex justify-content-center align-items-center mt-4">
                <span class="text-muted">Already have an account?</span>
                <button type="button" class="btn ms-2 text-primary" onclick="window.location.href='<?php echo base_url('login') ?>'">
                    Log in
                </button>
            </div>
        </form>
    </main>
</body>

</html>