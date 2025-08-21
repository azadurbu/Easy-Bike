<?php 
include 'Include/Header.php';
include 'Include/SideMenu.php';
include 'Views/_ViewOwnerTransferNew.php';
include 'Include/Footer.php';

?>
<script>
       OwnerTransferView(
              '<?php echo $_GET['stt'];?>',
              '<?php echo $_GET['userreg'];?>',
              '<?php echo $_GET['newowner'];?>',
              '<?php echo $_GET['oldowner'];?>',
              '<?php echo $_GET['date'];?>'
              );
</script>