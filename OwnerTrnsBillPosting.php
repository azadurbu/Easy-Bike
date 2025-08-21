<?php 
include 'Include/Header.php';
include 'Include/SideMenu.php';
include 'Views/_OwnerTrnsBillPostingNew.php';
include 'Include/Footer.php';

?>

<script>
    $(document).ready(function(){
        OwnerTnsBillPosting('<?php echo $_GET['user'];?>');
    });
</script>