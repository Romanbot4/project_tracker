<header>
    <nav class="navbar navbar-expand-lg border-bottom">
        <div class="container-fluid">
            <a class="navbar-brand logo-word-mark" href="<?php echo base_url() ?>" alt="Project Tracker">
                <?php echo svg_icon(base_url("assets/logo/wordmark.svg")) ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo base_url('') ?>">
                            Me
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo base_url('projects') ?>">
                            Projects
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo base_url('reports') ?>">
                            Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo base_url('about') ?>">
                            About
                        </a>
                    </li>
                    <?php echo view(
                        empty($user) ?
                            "components/header/auth_action_nav_item" :
                            "components/header/user_nav_item"
                    ); ?>
                </ul>
                <?php echo view(
                    empty($user) ?
                        "components/header/auth_action_buttons" :
                        "components/header/user_action_button"
                ); ?>
            </div>
        </div>
    </nav>
</header>