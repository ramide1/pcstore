<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link href="<?= base_url('css/sign-in.css') ?>" rel="stylesheet">
</head>

<body>
    <div class="animate__animated animate__fadein container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="product-details text-center p-4">
                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success mb-4">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger mb-4">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>
                    <h1 class="mb-4">Detalles del Producto</h1>
                    <img src="<?= base_url('uploads/img/' . $producto['imagen']) ?>" alt="Imagen del Producto" class="product-image mb-4">
                    <h2><?= $producto['nombre'] ?></h2>
                    <p><strong>Precio: </strong><?= '$ ' . number_format($producto['precio'], 2, ',', '.') ?></p>
                    <p><strong>Stock:</strong> <?= $producto['stock'] ?></p>
                    <p><strong>Código:</strong> <?= $producto['codigo'] ?></p>
                    <h3>Descripción</h3>
                    <p><?= $producto['descripcion'] ?></p>
                </div>
            </div>
        </div>
    </div>
</body>

<style>
    body {
        background-color: #f8f9fa;
    }

    .product-details {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .product-image {
        max-width: 300px;
        max-height: 300px;
        object-fit: contain;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
</style>