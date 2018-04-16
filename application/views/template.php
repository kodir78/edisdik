<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
$this->load->view('template/head');
?>
<!-- Sidebar -->    
<?php
$this->load->view('template/sidebar');
?>
<!-- /Sidebar -->
<!-- top navigation -->    
<?php
$this->load->view('template/tophead');
?>
<!-- /top navigation -->
<!-- page content -->
<div class="right_col" role="main" style="min-height: 5773.99px;" >
  <?php echo $contents; ?>
</div>
<!-- /page content -->

<?php
$this->load->view('template/footer');
?>