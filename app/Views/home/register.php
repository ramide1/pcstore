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
    <div id="mensaje-error" class="alert alert-danger"></div>
    <form method="post" action="<?= site_url('/register') ?>">
      <h1 class="h3 mb-3 fw-normal">Por favor Regístrate</h1>

      <div class="form-floating">
        <input required type="email" name="email" class="form-control" placeholder="nombre@ejemplo.com">
        <label>Email</label>
      </div>
      <div class="form-floating">
        <input required type="password" name="password" class="form-control" placeholder="Contraseña">
        <label>Contraseña</label>
      </div>
      <div class="form-floating">
        <input required type="password" name="password_confirm" class="form-control" placeholder="Confirmar Contraseña">
        <label>Confirmar Contraseña</label>
      </div>
      <div class="form-floating">
        <input required type="text" name="nombre" class="form-control" placeholder="Nombre">
        <label>Nombre</label>
      </div>
      <div class="form-floating">
        <input required type="text" name="apellido" class="form-control" placeholder="Apellido">
        <label>Apellido</label>
      </div>
      <div class="form-floating">
        <input type="text" name="telefono" class="form-control" placeholder="Telefono">
        <label>Teléfono</label>
      </div>
      <button class="btn btn-primary w-100 py-2" type="submit">Registrarse</button>
    </form>
  </main>
</body>

<script>
  //Validacion de contraseña
  document.querySelector('form').addEventListener('submit', (e) => {
    e.preventDefault();
    if (document.getElementsByName('password')[0].value.length < 8) {
      document.getElementById('mensaje-error').style.display = 'block';
      document.getElementById('mensaje-error').innerHTML = 'La contraseña debe tener almenos 8 caracteres!';
    } else if (document.getElementsByName('password')[0].value != document.getElementsByName('password_confirm')[0].value) {
      document.getElementById('mensaje-error').style.display = 'block';
      document.getElementById('mensaje-error').innerHTML = 'Los campos de contraseña no coinciden!';
    } else {
      e.target.submit();
    }
  })
</script>

<style>
  #mensaje-error {
    display: none;
  }
</style>