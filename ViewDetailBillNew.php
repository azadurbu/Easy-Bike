<?php 
include 'Include/Header.php';
include 'Include/SideMenu.php';
include 'Views/_ViewDetailBillNew.php';
include 'Include/Footer.php';

?>
<script>
    $(document).ready(function(){
        DetailBill('<?php echo $_GET['user'];?>');
    });
</script>