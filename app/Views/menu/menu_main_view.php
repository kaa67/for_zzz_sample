<nav class="navbar navbar-light navbar-expand-lg bg-light fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Anotherkiller</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

        <?php if ($isGuest): ?>
          <li class="nav-item">
            <a class="nav-link" href="/login">Login</a>
          </li>
        <?php endif; ?>

        <?php if (!$isGuest): ?>
          <li class="nav-item">
            <a class="nav-link" href="/budget">Budget</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/logout">Logut</a>
          </li>
        <?php endif; ?>
        </ul>
      </div>
    </div>
  </div>
</nav>