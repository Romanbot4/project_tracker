<div class="card text-bg-card">
    <div class="card-header fw-semibold d-flex justify-content-between">
        <span>
            <?php echo $title ?? "" ?>
        </span>
        <div class="dropdown">
            <button type="button" class="btn" data-bs-toggle="dropdown">
                <span class="bi bi-three-dots-vertical"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">
                        <span class="pe-1 bi bi-pencil-square"></span>
                        Edit
                    </a></li>
                <li><a class="dropdown-item" href="<?php echo base_url("delete-team/".$id) ?>">
                        <span class="pe-1 bi bi-trash"></span>
                        Delete
                    </a></li>
            </ul>
        </div>
    </div>
    <div class="card-body">
        <div class="card-text">
            <?php echo $description ?? "" ?>
            <div class="d-flex">
                <?php echo $userCount ?>
                <span class="ps-2 text-muted">
                    People
                </span>
            </div>
        </div>
    </div>
</div>