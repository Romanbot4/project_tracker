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
    <!-- <script src="node_modules/@popperjs/core/dist/popper.js" defer></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="js/dropdown.js" defer></script>

</head>

<body>
    <?php echo view("components/header/header"); ?>
    <main>
        <section class="container py-4">
            <form action="<?php echo base_url("teams"); ?>" method="POST">
                <div class="pb-4 d-flex justify-content-between">
                    <div class="fs-4 pe-5">
                        <span class="bi bi-people"></span>
                        <span>Teams</span>
                        <span class="fs-6 text-muted ps-2" data-select-count-target></span>
                    </div>
                    <div class="d-flex gap-2 justify-content-end">
                        <button type="submit" formaction="<?php echo base_url("delete-projects-by-ids") ?>" id="deleteButton" class="d-none btn btn-outline-dark btn-sm" data-select-show type="button">
                            <span class="bi bi-trash"></span>
                            Delete
                        </button>
                        <button class="btn btn-outline-dark btn-sm" type="button" onclick="window.location.href='<?php echo base_url('create-team') ?>'">
                            <span class="bi bi-plus"></span>
                            Add
                        </button>
                    </div>
                </div>

                <div id="albumGrid" class="card-grid" data-lazy-loading=true>
                </div>
            </form>

        </section>
    </main>
</body>
<script src="js/lazy_loading.js"></script>
<script defer>
    let albumGrid = document.querySelector("#albumGrid");
    let lazyLoading = new EasyLazyLoading(handleLazyLoading);
    let loadedSections = new Map();

    async function initialize() {
        updateView();
        await lazyLoading.loadContent();
        await lazyLoading.loadContent();
    }

    function updateView() {
        let contents = Array.from(loadedSections.values()).reduce((p, e) => {
            return `${p}\n${e}`;
        }, '');

        albumGrid.innerHTML = `${contents}`;
    }

    function setLoadingMore(isLoading) {
        albumGrid.setAttribute("data-lazy-loading", isLoading);
    }

    async function handleLazyLoading(page) {
        if (loadedSections.has(page)) {
            return true;
        }

        setLoadingMore(true);
        let values = await getContentSections(page);
        loadedSections.set(page, values);
        updateView();
        setLoadingMore(false);
        let parser = new DOMParser();
        let elements = parser.parseFromString(values, 'text/html');
        return elements.querySelectorAll(".album-card").length == 20;
    }


    async function getContentSections(page) {
        try {
            let res = await fetch(`<?php echo site_url("teams-cards?page=") ?>${page}`);
            return await res.text();
        } catch (error) {
            return null;
        }
    }

    initialize();
</script>

</html>