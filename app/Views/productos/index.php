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
      <h1>Productos</h1>
      <table class="lead">
        <tr>
          <th>Nombre</th>
          <th>Precio</th>
          <th>Stock</th>
          <th>Codigo</th>
          <th>Imagen</th>
          <?php if ($admin) : ?>
            <th> <a class="nav-link fw-bold py-1 px-0" href="<?= site_url('/productos/add'); ?>">+</a>
            </th>
          <?php endif; ?>
        </tr>
        <?php foreach ($productos as $producto) : ?>
          <tr>
            <td><a class="nav-link fw-bold py-1 px-0" href="<?= site_url('/productos/view/') . $producto['id']; ?>"><?= $producto['nombre'] ?></a></td>
            <td><?= '$ ' . number_format($producto['precio'], 2, ',', '.') ?></td>
            <td><?= $producto['stock'] ?></td>
            <td><?= $producto['codigo'] ?></td>
            <td><img src="<?= base_url('uploads/img/' . $producto['imagen']) ?>" alt="Imagen" width="100" height="100"></td>
            <?php if ($admin) : ?>
              <td>
                <a class="nav-link fw-bold py-1 px-0" href="<?= site_url('/productos/edit/') . $producto['id']; ?>">Editar</a>
                <a class="nav-link fw-bold py-1 px-0" href="<?= site_url('/productos/delete/') . $producto['id']; ?>">Eliminar</a>
              </td>
            <?php endif; ?>
          </tr>
        <?php endforeach; ?>
      </table>
    </main>

    <footer class="mt-auto text-white-50">
      <p>Web de prueba en <a href="https://codeigniter.com/" class="text-white">CodeIgniter</a>, por <a href="https://github.com/ramide1" class="text-white">ramide1</a>.</p>
    </footer>
  </div>

</body>

<style>
  /* Estilos para la tabla */
  table {
    width: 80%;
    margin: 0 auto;
    border-collapse: collapse;
    text-align: center;
    background-color: gray;
  }

  table th,
  table td {
    border: 1px solid #ddd;
    padding: 8px;
  }
</style>