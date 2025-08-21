<?php 

include 'Include/Header.php';
include 'Include/SideMenu.php';
include 'Views/OwnerCardBill/_ViewOwnerGeneratedBill.php';
include 'Include/Footer.php';
?>
<script>
    $(document).ready(function(){
        OwnerGeneratedBillView('<?php echo $_GET['user'];?>');
    });
</script>