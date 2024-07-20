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
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item disabled" aria-disabled="true">
                        <a class="nav-link" href="#">
                            Projects
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">
                            Tasks
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">
                            About
                        </a>
                    </li>
                </ul>
                <div class="d-flex">
                    <button class="btn me-2" onclick="window.location.href='<?php echo base_url('login') ?>'">
                        Sign in
                    </button>
                    <button class="btn btn-primary" onclick="window.location.href='<?php echo base_url('sign-up') ?>'">
                        Sign up
                    </button>
                </div>
            </div>
        </div>
    </nav>
</header>