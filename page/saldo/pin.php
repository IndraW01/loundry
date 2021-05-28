<?php

include "koneksi.php";

if (isset($_POST['buat'])) {
  $pin = $_POST['pin'];
  $id_user = $_POST['id'];

  mysqli_query($koneksi, "INSERT INTO tb_saldo (id_user, pin) VALUES ($id_user, $pin)");
  if (mysqli_affected_rows($koneksi) > 0) {
    echo "<script>
            alert('Pin berhasil dibuat');
            window.location.href = '?page=saldo';
          </script>";
  }
}

?>


<div class="card card-dark" style="width: 35%; margin: 5px auto;">
  <div class="card-header">
    <h3 class="card-title">Buat Pin</h3>
  </div>
  <form action="" method="POST">
    <div class="card-body">
      <div class="form-group">
        <label for="pin">pin</label>
        <input type="text" class="form-control" id="pin" placeholder="pin" name="pin" autocomplete="off">
      </div>
      <input type="hidden" name="id" value="<?= $id_user; ?>">
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary" name="buat">Buat</button>
    </div>
  </form>
</div>