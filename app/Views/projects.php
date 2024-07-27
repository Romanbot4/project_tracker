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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js" defer></script>

    <script src="js/dropdown.js" defer></script>
    <script src="js/selectable.js" defer></script>
</head>

<style>
    [data-select-state-target][selected] [data-select-show] {
        display: block !important;
    }

    [data-select-state-target][selected="multiple"] [data-select-multiple-show] {
        display: block !important;
    }
</style>

<body>
    <?php echo view("components/header/header"); ?>
    <main>
        <section class="container py-4" data-select-state-target>
            <div class="pb-4 d-flex justify-content-between">
                <div class="fs-4 pe-5">
                    <span class="bi bi-files-alt"></span>
                    <span>Projects</span>
                    <span class="fs-6 text-muted ps-2" data-select-count-target></span>
                </div>
                <div class="d-flex gap-2 justify-content-end">
                    <button class="d-none btn btn-outline-dark btn-sm" data-select-show type="button" onclick="window.location.href='<?php echo base_url('create-project') ?>'">
                        <span class="bi bi-trash"></span>
                        Delete
                    </button>
                    <button class="btn btn-outline-dark btn-sm" type="button" onclick="window.location.href='<?php echo base_url('create-project') ?>'">
                        <span class="bi bi-plus"></span>
                        Add
                    </button>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" id="selectAllProjects" data-select-all-toggle>
                        </th>
                        <td>#</td>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Manager</th>
                        <th>Asignees</th>
                    </tr>
                </thead>
                <tbody data-select-all-target>
                    <?php
                    foreach ($projects as $project) {
                        echo view("components/projects/project_row", [
                            "project" => $project
                        ]);
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>