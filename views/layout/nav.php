<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="/home">Coffee Shop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <?php if (isset($_SESSION['user'])): ?>
          <li class="nav-item"><a class="nav-link" href="/home">Inicio</a></li>
          <li class="nav-item"><a class="nav-link" href="/?controller=user&action=index">Usuarios</a></li>
          <li class="nav-item"><a class="nav-link" href="/?controller=auth&action=logout">Cerrar sesión</a></li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="/?controller=auth&action=login">Login</a></li>
          <li class="nav-item"><a class="nav-link" href="/?controller=user&action=register">Registrar</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
