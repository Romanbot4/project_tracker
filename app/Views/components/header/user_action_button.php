<div class="_dropdown" data-dropdown>
    <button type="button" class="avatar-card rounded-5 border bg-white" data-dropdown-button>
        <i class="bi bi-person-circle"></i>
    </button>
    <div class="_dropdown-content | shadow bg-white rounded-3 mt-2">
        <ul class="ps-0 mb-0 py-2">
            <li>
                <a class="px-4 py-2 text-body d-flex align-items-center justify-content-space-between" href="#">
                    <div class="flex-grow-1 d-flex flex-col">
                        <i class="bi bi-person-circle"></i>
                        <div class="ps-2">
                            <span>
                                <?php echo $user->displayName                            ?>
                            </span>
                            <div class="text-muted fs-caption" href="#">View profile</div>
                        </div>
                    </div>
                </a>
            </li>
            <li class="pt-1">
                <hr class="dropdown-divider">
            </li>
            <li>
                <a class="px-4 py-2 text-body d-flex flex-col align-items-center justify-content-space-between" href="#">
                    <div class="flex-grow-1 d-flex flex-col">
                        <i class="bi bi-moon-stars-fill"></i>
                        <span class="ps-2">
                            Appearance
                        </span>
                    </div>
                    <i class="bi bi-chevron-right ps-4"></i>
                </a>
            </li>
            <li>
                <a class="px-4 py-2 text-body d-flex flex-col align-items-center justify-content-center" href="#">
                    <div class="flex-grow-1 d-flex flex-col">
                        <i class="bi bi-translate"></i>
                        <span class="ps-2">
                            Language
                        </span>
                    </div>
                    <i class="bi bi-chevron-right ps-4"></i>
                </a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li>
                <a class="px-4 py-2 text-body d-flex flex-col align-items-center justify-content-center" href="#">
                    <div class="flex-grow-1 d-flex flex-col">
                        <i class="bi bi-gear-fill"></i>
                        <span class="ps-2">
                            Settings
                        </span>
                    </div>
                </a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li>
                <a class="px-4 py-2 text-body d-flex flex-col align-items-center justify-content-center" href="<?php echo base_url("logout") ?>">
                    <div class="flex-grow-1 d-flex flex-col">
                        <i class="bi bi-box-arrow-left"></i>
                        <span class="ps-2">
                            Log out
                        </span>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>