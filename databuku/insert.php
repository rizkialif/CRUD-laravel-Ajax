<?php
$title = 'Tambah Produk';
require_once 'header.php';
?>

<a href="index.php" class="btn btn-outline-dark float-right">Kembali</a>
<br><br>
<form id="apiForm" action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Judul Buku</label>
        <input type="text" name="namabuku" class="form-control">       
    </div>

    <div class="form-group">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control">       
    </div>

    <div class="form-group">
        <input type="submit" name="submit" class="btn btn-primary">       
    </div>
</form>

<?php
require_once 'footer.php';
?>

<script type="text/javascript">
$(function(){
    $('#apiForm').submit(function(event) {
        event.preventDefault();
        var form  = $(this).serializeArray();
        simpan(form);
    })
})
</script>