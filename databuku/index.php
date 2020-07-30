<?php
$title = 'Daftar Produk';
require_once 'header.php';
?>
<a href="insert.php" class="btn btn-primary">Tambah Produk</a>
<br><br>


<table class="table table-hover apiData" id="dataTable">
    <thead>
        <tr>
            <th>No.</th>
            <th>Judul Buku</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $stmt = $buku->getData();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
            
        <?php } ?>
    </tbody>
</table>

<?php
require_once 'footer.php';
?>
<script>
$(document).ready(function(){
    $.when(show()).done(function(result){
        var no = 1;
        var output = '';
        
        $.each(result.data, function(key, value){
            output +=
            `
            <tr>
                <td>` + no++ + `</td>
                <td>` + value.namabuku + `</td>
                <td>` + value.harga + `</td>
                <td>
                    <a href="update.php?id=${value.id}" class="btn btn-warning">Edit</a>
                    <a href="delete.php?id=${value.id}" class="btn btn-danger" 
                    onclick="javascript: return confirm('Hapus data barang?')">Delete</a>
                </td>
            </tr>`;
        })
        $('.apiData').html(output);
    })
})
</script>