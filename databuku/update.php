<?php
$title = 'Update Produk';
require_once 'header.php';


$id = $_GET['id'];
?>

<a href="index.php" class="btn btn-outline-dark float-right">Kembali</a>
<br><br>

<form action="" method="POST" id="apiForm">
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

<script>
    $(function(){
        var id="<?php echo $id; ?>";
        $.when(showbyid(id)).done(function(result){
            $("input[name=namabuku]").val(result.data.namabuku);
            $("input[name=harga]").val(result.data.harga);
        });

        $('#apiForm').submit(function(event){
            event.preventDefault();
            var form = $(this).serializeArray();

            update(form, id);
        })
    })
</script>