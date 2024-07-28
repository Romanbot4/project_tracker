<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Tracker</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/selectable.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js" defer></script>

    <script src="js/dropdown.js" defer></script>
    <script src="js/selectable.js" defer></script>
</head>

<body>
    <?php echo view("components/header/header"); ?>
    <main>
        <section class="container py-4 " data-select-state-target>
            <form action="" method="POST">
                <div class="pb-4 d-flex justify-content-between">
                    <div class="fs-4 pe-5">
                        <span class="bi bi-files-alt"></span>
                        <span>Projects</span>
                        <span class="fs-6 text-muted ps-2" data-select-count-target></span>
                    </div>
                    <div class="d-flex gap-2 justify-content-end">
                        <button type="submit" formaction="<?php echo base_url("delete-projects-by-ids") ?>" id="deleteButton" class="d-none btn btn-outline-dark btn-sm" data-select-show type="button">
                            <span class="bi bi-trash"></span>
                            Delete
                        </button>
                        <button class="btn btn-outline-dark btn-sm" type="button" onclick="window.location.href='<?php echo base_url('create-project') ?>'">
                            <span class="bi bi-plus"></span>
                            Add
                        </button>
                    </div>
                </div>
                <div class="pb-2 fw-medium fs-body d-flex align-items-center justify-content-start">
                    <span>Show&nbsp;</span>
                    <select name="limit" class="mx-2 form-control min-width fw-medium fs-body" id="entryLimit">
                        <?php
                        $limitSelections = [10, 20];
                        foreach ($limitSelections as $selection) {
                            echo "<option "
                                . ($limit == $selection ? "selected='selected'" : "")
                                . ">"
                                . $selection
                                . "</option>";
                        }
                        ?>
                    </select>
                    <span>&nbsp;entries</span>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox" id="selectAllProjects" data-select-all-toggle>
                            </th>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Manager</th>
                            <th>Asignees</th>
                        </tr>
                    </thead>
                    <tbody data-select-all-target>
                        <?php
                        for ($i = 0; $i < $limit; $i++) {
                            $project = $i > count($projects) - 1 ? null :  $projects[$i];
                            echo $project == null ?
                                "" :
                                view("components/projects/project_row", [
                                    "project" => $project
                                ]);
                            // echo view("components/projects/project_row", [
                            //     "project" => $project
                            // ]);
                        }
                        ?>
                    </tbody>
                </table>
                <div class="d-flex justify-content-end gap-1">
                    <?php
                    foreach ($paginations as $pagination) {
                        echo '<a href="'
                            . $pagination->url
                            . '" class="btn '
                            . ($page == $pagination->page ? 'btn-outline-dark' : 'muted')
                            . '">'
                            . $pagination->page
                            . '</a>';
                    }
                    ?>
                </div>
            </form>

        </section>
    </main>
</body>
<script>
    let deleteButton = document.querySelector("#deleteButton");

    deleteButton.addEventListener("click", () => {
        let selectTarges = document.querySelectorAll("[data-select-all-target] input[type='checkbox']");
        console.log(selectTarges.length);
    });

    let entryLimitSelector = document.querySelector("#entryLimit");
    entryLimitSelector.addEventListener("change", () => {
        let value = entryLimitSelector.value;
        window.location.href = `<?php echo base_url("projects?limit=") ?>${value}`;
    });
</script>

</html>