<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah/Edit Barang</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Form Tambah/Edit Barang</h2>
        <form action="<?= $action ?>" method="post">
            <input type="hidden" name="idbarang" value="<?= $idbarang ?>">

            <div class="form-group row">
                <label for="namabarang" class="col-sm-2 col-form-label">Nama Barang:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="namabarang" value="<?= $namabarang ?>">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="kat" class="col-sm-2 col-form-label">Kategori:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="kat" value="<?= $kat ?>">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="deskripsi" value="<?= $deskripsi ?>">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="stock" class="col-sm-2 col-form-label">Stock:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="stock" value="<?= $stock ?>">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary"><?= $button ?></button>
                    <a href="<?= site_url('Admin') ?>" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
