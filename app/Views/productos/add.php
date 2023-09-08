<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link href="<?= base_url('css/sign-in.css') ?>" rel="stylesheet">
</head>

<body class="animate__animated animate__fadein d-flex align-items-center py-4 bg-body-tertiary">
  <main class="form-signin w-100 m-auto">
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
    <form method="post" action="<?= site_url('/productos/add') ?>" enctype="multipart/form-data">
      <h1 class="h3 mb-3 fw-normal">Registrar un Producto</h1>

      <div class="form-floating">
        <input required type="text" name="nombre" class="form-control" placeholder="Nombre">
        <label>Nombre</label>
      </div>
      <div class="form-floating">
        <input required type="text" name="descripcion" class="form-control" placeholder="Descripcion">
        <label>Descripcion</label>
      </div>
      <div class="form-floating">
        <input required type="number" name="precio" class="form-control" placeholder="Precio">
        <label>Precio</label>
      </div>
      <div class="form-floating">
        <input required type="number" name="stock" class="form-control" placeholder="Stock">
        <label>Stock</label>
      </div>
      <div class="form-floating">
        <input required type="text" name="codigo" class="form-control" placeholder="Codigo">
        <label>Codigo</label>
      </div>
      <div class="form-floating">
        <input type="file" accept="image/png, image/jpeg" name="imagen" class="form-control" placeholder="Imagen">
        <label>Imagen</label>
      </div>
      <button class="btn btn-primary w-100 py-2" type="submit">Registrar</button>
    </form>
  </main>
</body>