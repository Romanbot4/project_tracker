<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Tracker</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="js/validation.js" defer></script>
    <script src="js/dropdown.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js" defer></script>
    <script src="js/dropdown.js" defer></script>
</head>

<style>
    .color-selector {
        background-color: var(--color);
        border: none;
        height: 2rem;
        width: 2rem;
    }

    input.color-selector:checked {
        background-color: var(--color);
        border: none;
    }

    input.color-selector:checked:active {
        border: none;
    }
</style>

<body>
    <?php

    use App\Views\Styles\TagColors;

    echo view("components/header/header"); ?>
    <main class="container py-4 d-flex justify-content-center">
        <form action="<?php echo base_url("create-team") ?>" method="POST" novalidate class="needs-validation col-lg-5 col-md-7 col-12">
            <h3 class="mb-4">Create Team</h3>
            <div class="mb-2">
                <label class="form-label" for="teamTitle">Title</label>
                <input class="form-control" type="text" name="title" id="teamTitle" placeholder="e.g Design Team" required minlength="3">
                <span class="invalid-feedback"><?php echo $errors["title"] ?? "Enter valid team title" ?></span>
            </div>

            <div class="mb-2">
                <div class="form-group">
                    <label for="teamDescription">Description</label>
                    <textarea class="form-control" name="description" id="teamDescription" rows="3" placeholder="e.g In Figma We Flourish"></textarea>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label">Tag Color </label>
                <div class="d-flex gap-2">
                    <?php
                    foreach (TagColors::getColors() as $color) {
                        echo '<input style="--color:' . $color . ';" class="form-check-input color-selector" type="radio" name="tag_color" id="tagColor" value="' . $color . '">';
                    }
                    ?>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Create
            </button>

        </form>
    </main>
</body>

</html>