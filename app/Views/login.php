<?php
helper("svg_icon");
?>

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
    <?php echo view("components/header/header_plain"); ?>
    <main class="d-flex flex-grow-1 justify-content-center align-items-center container">
        <form action="<?php echo base_url("login") ?>" method="post" class="col-lg-5 col-md-7 col-12 p-md-4 rounded-4 mb-5 <?php echo empty($errors) ? "" : "was-validated" ?>" novalidate>
            <h3>Log in</h3>
            <div class="mt-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="e.g example@gmail.com" required minlength="5">
                <span class="invalid-feedback"><?php echo $errors["email"] ?? "Enter valid email" ?></span>
            </div>
            <div class="mt-2">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required minlength="5">
                <span class="invalid-feedback"><?php echo $errors["password"] ?? "Enter valid password" ?></span>
            </div>
            <button type="submit" class="btn btn-primary mt-4 w-100">Log in</button>

            <div class="d-flex justify-content-center align-items-center mt-4">
                <span class="text-muted">Don't have an account?</span>
                <button type="button" class="btn ms-2 text-primary" onclick="window.location.href='<?php echo base_url('sign-up') ?>'">
                    Sign up
                </button>
            </div>
        </form>
    </main>
</body>

</html>