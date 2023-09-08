<head>
  <title>PC Store</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link href="<?= base_url('css/cover.css') ?>" rel="stylesheet">
</head>

<body class="animate__animated animate__fadein d-flex h-100 text-center text-bg-dark">

  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">
      <div>
        <h3 class="float-md-start mb-0">PC Store</h3>
        <nav class="nav nav-masthead justify-content-center float-md-end">
          <?php if ($userSession) : ?>
            <a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href="<?= site_url(); ?>">Inicio</a>
            <a class="nav-link fw-bold py-1 px-0"><?= $userSession['nombre'] ?></a>
            <a class="nav-link fw-bold py-1 px-0" href="<?= site_url('comentarios'); ?>">Comentarios</a>
            <a class="nav-link fw-bold py-1 px-0" href="<?= site_url('logout'); ?>">Cerrar Sesión</a>
          <?php else : ?>
            <a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href="<?= site_url(); ?>">Inicio</a>
            <a class="nav-link fw-bold py-1 px-0" href="<?= site_url('register'); ?>">Registrarse</a>
            <a class="nav-link fw-bold py-1 px-0" href="<?= site_url('login'); ?>">Iniciar Sesión</a>
            <a class="nav-link fw-bold py-1 px-0" href="<?= site_url('comentarios'); ?>">Comentarios</a>
          <?php endif; ?>
        </nav>
      </div>
    </header>

    <main class="px-3">
      <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success">
          <?= session()->getFlashdata('success') ?>
        </div>
      <?php endif; ?>
      <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger">
          <?= session()->getFlashdata('error') ?>
        </div>
      <?php endif; ?>
      <h1>PC Store.</h1>
      <p class="lead">Productos</p>
      <div class="row">
        <?php $count = 0; ?>
        <?php foreach ($productos as $producto) : ?>
          <?php if ($count % 3 === 0) : ?>
      </div>
      <div class="row">
      <?php endif; ?>
      <div class="col-md-4 mb-4">
        <a class="nav-link fw-bold py-1 px-0" href="<?= site_url('/productos/view/') . $producto['id']; ?>">
          <img src="<?= base_url('uploads/img/' . $producto['imagen']) ?>" alt="Imagen" width="300" height="300">
        </a>
      </div>
      <?php $count++; ?>
    <?php endforeach; ?>
      </div>
      <p class="lead">
        <a href="<?= site_url('productos'); ?>" class="btn btn-lg btn-light fw-bold border-white bg-white">Ver más</a>
      </p>
    </main>

    <footer class="mt-auto text-white-50">
      <p>Web de prueba en <a href="https://codeigniter.com/" class="text-white">CodeIgniter</a>, por <a href="https://github.com/ramide1" class="text-white">ramide1</a>.</p>
    </footer>
  </div>

</body>