<?php
$title = 'Delete Produk';
require_once 'header.php';

$id = $_GET['id'];
require_once 'footer.php';

?>
<script type="text/javascript">
$(function(){
    var id = "<?php echo $id; ?>";
    deletedata(id);
});
</script>