<?php

include 'Include/Header.php';
include 'Include/SideMenu.php';
include 'Views/DriverCardBill/_ViewDriverBillNew.php';
include 'Include/Footer.php';

?>
<script>
    $(document).ready(function(){
        DriverCardBillView('<?php echo $_GET['user'];?>');
    });
</script>