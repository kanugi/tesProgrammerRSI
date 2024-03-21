<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <!-- material icon -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="./css/style.css">
  
  <title>Aplikasi Data Pasien</title>
</head>
<body class="bg-light">

  <h1>Aplikasi Data Pasien</h1>

  <div class="container mt-5">
    <div class="card-body">
      <h3 class="card-title">Tambah Data Pasien</h3>
      <p class="card-text">Selamat Datang</p>
    
      <!-- status alert -->
      <?php if (isset($_GET['status'])) : ?>
        <?php
        if ($_GET['status'] == 'sukses')
          echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                  <strong>Sukses!</strong> Data berhasil ditambahkan!
                  <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
        else
          echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                  <strong>Ups!</strong> Data gagal ditambahkan!
                  <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
        ?>
      <?php endif; ?>

      <!-- form tabah pasien -->
      <form action="create.php" method="POST">
        <div class="row mb-3">
          <label for="nama_pasien" class="col-sm-2 col-form-label">Nama Pasien</label>
          <div class="col-sm-10">
            <input type="text" name="nama_pasien" class="form-control" id="nama_pasien" required>
          </div>
        </div>
        <div class="row mb-3">
          <label for="jenis_kelamin_pasien" class="col-sm-2 col-form-label">Jenis Kelamin</label>
          <div class="col-sm-10">
            <input type="text" name="jenis_kelamin_pasien" class="form-control" id="jenis_kelamin_pasien" required>
          </div>
        </div>
        <div class="row mb-3">
          <label for="tgl_lahir_pasien" class="col-sm-2 col-form-label">Tgl Lahir</label>
          <div class="col-sm-10">
            <input type="date" name="tgl_lahir_pasien" class="form-control" id="tgl_lahir_pasien" required>
          </div>
        </div>
        <div class="row mb-3">
          <label for="alamat_pasien" class="col-sm-2 col-form-label">Alamat</label>
          <div class="col-sm-10">
            <input type="text" name="alamat_pasien" class="form-control" id="alamat_pasien" required>
          </div>
        </div>
        <div class="col-12">
          <button type="submit" name="tambah" class="btn btn-primary">Submit</button>
        </div>
      </form>

      <!-- alert data sukses dihapus -->
      <?php if (isset($_GET['hapus'])) : ?>
            <?php
            if ($_GET['hapus'] == 'sukses')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Sukses!</strong> Data berhasil dihapus!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> Data gagal dihapus!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
      <?php endif; ?>

      <!-- alert data sukses diedit -->
      <?php if (isset($_GET['edit'])) : ?>
            <?php
            if ($_GET['edit'] == 'sukses')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Sukses!</strong> Data berhasil diedit!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> Data gagal diedit!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
      <?php endif; ?>

      <!--fitur filter mengurutkan umur pasien paling tua-->
      
      <?php
      $sql = "SELECT * FROM tbl_pasien";
      $db = mysqli_connect('localhost', 'root', '', 'dbpasien');
      $query = mysqli_query($db, $sql);
      $data = mysqli_fetch_array($query);
      $umur = date_diff(date_create($data['tgl_lahir_pasien']), date_create('today'))->y;
      ?>


      <!-- table data pasien -->
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">ID Pasien</th>
            <th scope="col">Nama Pasien</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Tgl Lahir</th>
            <th scope="col">Alamat</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM tbl_pasien";
          $db = mysqli_connect('localhost', 'root', '', 'dbpasien');
          $query = mysqli_query($db, $sql);
          while ($data = mysqli_fetch_array($query)) {
          ?>
            <tr>
              <td><?= $data['id_pasien'] ?></td>
              <td><?= $data['nama_pasien'] ?></td>
              <td><?= $data['jenis_kelamin_pasien'] ?></td>
              <td><?= $data['tgl_lahir_pasien'] ?></td>
              <td><?= $data['alamat_pasien'] ?></td>
              <td>
                <a href="edit.php?id_pasien=<?= $data['id_pasien'] ?>" class="btn btn-success">Edit</a>
                <a href="delete.php?id_pasien=<?= $data['id_pasien'] ?>" class="btn btn-danger">Delete</a>
              </td>
            </tr>
          <?php
          }
          ?>

        </tbody>
      </table>

      <!-- modal edit pasien -->
      <div>
        <?php
        $sql = "SELECT * FROM tbl_pasien";
        $query = mysqli_query($db, $sql);
        $dbpasien = mysqli_fetch_array($query);
        ?>

        <form action="edit.php" method="$_POST">
          <div class="form-group">
            <label for="edit_nama_pasien">Nama Pasien</label>
            <input type="text" name="edit_nama_pasien" class="form-control" id="edit_nama_pasien" value="<?= $dbpasien['nama_pasien'] ?>">
          </div>
          <div class="form-group">
            <label for="edit_jenis_kelamin_pasien">Jenis Kelamin</label>
            <input type="text" name="edit_jenis_kelamin_pasien" class="form-control" id="edit_jenis_kelamin_pasien" value="<?= $dbpasien['jenis_kelamin_pasien'] ?>">
          </div>
          <div class="form-group">
            <label for="edit_tgl_lahir_pasien">Tgl Lahir</label>
            <input type="text" name="edit_tgl_lahir_pasien" class="form-control" id="edit_tgl_lahir_pasien" value="<?= $dbpasien['tgl_lahir_pasien'] ?>">
          </div>
          <div class="form-group">
            <label for="edit_alamat_pasien">Alamat</label>
            <input type="text" name="edit_alamat_pasien" class="form-control" id="edit_alamat_pasien" value="<?= $dbpasien['alamat_pasien'] ?>">
          </div>
        </form>
      </div>


      <!-- delete pasien-->


      <!-- modal delete pasien -->
      <div class="modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Hapus Data</h5>
              <button type="button" class="btn-close" onclick="clicking()" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Apakah anda yakin ingin menghapus data ini?</p>
            </div>
            <div class="modal-footer">
              <form action="delete.php" method="$_POST">
                <input type="hidden" name="delete_id" value="<?= $dbpasien['id_pasien'] ?>">
                <button type="submit" name="delete_data" class="btn btn-danger">Hapus</button> 
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>  
</body>
</html>