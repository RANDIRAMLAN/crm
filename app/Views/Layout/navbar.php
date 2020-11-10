<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <h5 class="navbar-brand text-success ml-3"><strong>CRM</strong></h5>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto mr-3">
            <?php foreach ($menu as $m) { ?>
                <li class="nav-item">
                    <a class="nav-link text-success" href="<?= $m['url']; ?>"><strong><?= $m['desc']; ?></strong></a>
                </li>
            <?php }; ?>
        </ul>
    </div>
</nav>