<?php

include 'Include/Header.php';
include 'Include/SideMenu.php';
include 'Views/DriverCardBill/_DriverBillPostingNew.php';
include 'Include/Footer.php';

?>
<script>
    $(document).ready(function(){
        DriverBillPosting('<?php echo $_GET['user'];?>');
    });
</script>