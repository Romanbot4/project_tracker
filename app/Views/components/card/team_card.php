<div class="team-card | card">
    <div style="<?php if ($tagColor != null) {
                    echo "--bs-card-cap-bg:" . $tagColor . ";";
                } ?>" class="card-header fw-semibold d-flex justify-content-between align-items-center">
        <span style="<?php if ($tagColor != null) {
                            echo "color:white !important;";
                        } ?>">
            <?php echo $title ?? "" ?>
        </span>
        <div class="dropdown">
            <button type="button" class="btn" data-bs-toggle="dropdown" style="<?php if ($tagColor != null) {
                                                                                    echo "--bs-btn-active-border-color:white !important;";
                                                                                } ?>">
                <span class="bi bi-three-dots-vertical" style="<?php if ($tagColor != null) {
                                                                    echo "color:white !important;";
                                                                } ?>"></span>
            </button>
            <ul class="dropdown-menu" styles="">
                <li><a class="dropdown-item" href="#">
                        <span class="pe-1 bi bi-pencil-square"></span>
                        Edit
                    </a></li>
                <li><a class="dropdown-item" href="<?php echo base_url("delete-team/" . $id) ?>">
                        <span class="pe-1 bi bi-trash"></span>
                        Delete
                    </a></li>
            </ul>
        </div>
    </div>
    <div style="<?php if ($tagColor != null) {
                    echo "background-color:" . $tagColor . "2B !important;";
                } ?>" class="card-body">
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