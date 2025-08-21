<?php 
include 'Include/Header.php';
include 'Include/SideMenu.php';
include 'Views/_BillPostingNew.php';
include 'Include/Footer.php';

?>
<script>
    $(document).ready(function(){
        BillPosting('<?php echo $_GET['user'];?>');
    });
</script>