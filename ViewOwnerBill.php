<?php

include 'Include/Header.php';
include 'Include/SideMenu.php';
include 'Views/OwnerCardBill/_ViewOwnerBillNew.php';
include 'Include/Footer.php';

?>
<script>
    $(document).ready(function(){
        OwnerCardBillView('<?php echo $_GET['user'];?>');
    });
</script>