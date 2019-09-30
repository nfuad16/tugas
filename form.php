<?php 
  include ('conn.php'); 

  $status = '';
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $npm = $_POST['npm'];
      $nama = $_POST['nama'];
      $alamat = $_POST['addr'];
      $jenis_kelamin = $_POST['jenis_kelamin'];
      
      $query = "INSERT INTO mhs (npm, nama, alamat, jenis_kelamin) VALUES('$npm','$nama','$alamat','$jenis_kelamin')"; 

      
      $result = mysqli_query(connection(),$query);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      header('Location: form.php?status='.$status);
  }
?>

<?php 
    if ($status=='ok') {
    echo '<br><br><div class="alert alert-success" role="alert">Berhasil Disimpan</div>';
    }
    elseif($status=='err'){
    echo '<br><br><div class="alert alert-danger" role="alert">Gagal</div>';
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css" />
        <title>Form Data Diri</title>
    </head>
    <body>
    <div class="register-form">
        <h1>input</h1>
        <form action="form.php"  method="post">
        <div class="NPM">
            <label>NPM : </label> 
            <input type="text" name="npm" placeholder="Masukkan npm Anda">
            <br>
        </div>
        <div class="name">
            <label>Nama : </label> 
            <input type="text" name="nama" placeholder="Masukkan nama Anda">
            <br>
        </div>
        <div class="alamat">
            <label>Alamat : </label> 
            <input type="text" name="addr" placeholder="Masukkan Alamat Anda">
            <br>
        </div>
        <div class="jumlah">
            <label>Jenis Kelamin : </label> 
            <input type="text" name="jenis_kelamin" placeholder="Masukkan Jenis Kelamin">
            <br>
        </div>
        <button type="submit" class="button">Send Form</button>
        </form>
        <button onclick="location.href='view.php'">List Data</button>
    </div>
    </body>
</html>