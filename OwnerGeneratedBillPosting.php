<?php

include 'Include/Header.php';
include 'Include/SideMenu.php';
include 'Views/OwnerCardBill/_OwnerGeneratedBillPosting.php';
include 'Include/Footer.php';

?>
<script>
    $(document).ready(function(){
        OwnerGeneratedBillPosting('<?php echo $_GET['user'];?>');
    });
</script>