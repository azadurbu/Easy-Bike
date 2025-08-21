<?php

include 'Include/Header.php';
include 'Include/SideMenu.php';
include 'Views/OwnerCardBill/_OwnerBillPostingNew.php';
include 'Include/Footer.php';

?>
<script>
    $(document).ready(function(){
        OwnerBillPosting('<?php echo $_GET['user'];?>');
    });
</script>