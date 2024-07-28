<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Tracker</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="js/validation.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="js/dropdown.js" defer></script>
</head>

<body>
    <?php echo view("components/header/header"); ?>
    <main class="container py-4 d-flex justify-content-center">
        <form action="<?php echo base_url("create-project") ?>" method="POST" class="needs-validation col-lg-5 col-md-7 col-12 <?php echo empty($errors) ? "" : "was-validated" ?>" novalidate>
            <h3 class="mb-4">Create Project</h3>
            <div class="mb-2">
                <label class="form-label" for="projectTitle">Title</label>
                <input class="form-control" type="text" name="title" id="projectTitle" placeholder="e.g Next Big App" required minlength="3">
                <span class="invalid-feedback"><?php echo $errors["title"] ?? "Enter valid project title" ?></span>
            </div>
            <div class="mb-2">
                <label for="" class="form-label">Descrption</label>
                <textarea class="form-control" name="description" id="description" rows="3" placeholder="e.g An awesome ecommerce app with great features"></textarea>
                <span class="invalid-feedback"><?php echo $errors["description"] ?? "Enter valid project description" ?></span>
            </div>
            <div class="mb-4 d-flex gap-2">
                <div class="w-100">
                    <label class="form-label" for="startDate">Start date</label>
                    <input class="form-control" type="date" name="start_at" id="startDate">
                    <span class="invalid-feedback"><?php echo $errors['start_date'] ?? "Enter valid start date"; ?></span>
                </div>
                <div class="w-100">
                    <label class="form-label" for="endDate">End date</label>
                    <input class="form-control" type="date" name="end_at" id="endDate">
                    <span class="invalid-feedback"><?php echo $errors['end_date'] ?? "Enter valid end date"; ?></span>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">
                Create
            </button>
        </form>
    </main>
</body>

</html>