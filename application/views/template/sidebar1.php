 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 ?>
 <!-- sidebar menu -->
 <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
   <!--  <h3>General</h3> -->
   <ul class="nav side-menu">
    <li><a href="<?php echo site_url('dashboard') ?>"><i class="fa fa-home"></i> DASHBOARD</a> </li>
      <?php 
       $id_level_user = $this->session->userdata('id_level_user');
      $this->db->where_not_in('id',array(0));
      // Query untuk memilih menu berdasarkan level user
      $sql_menu = "SELECT * FROM tabel_menu WHERE id in(select id_menu from tbl_user_rule where id_level_user=$id_level_user) and is_main_menu=0";
      // Ganti script dibahawa ini dengan query
      //$main_menu = $this->db->get_where('tabel_menu',array('is_main_menu'=>0));
      // Sesuaikan dengan query berikut 
      $main_menu = $this->db->query($sql_menu)->result();
     // foreach ($main_menu->result() as $main){
      foreach ($main_menu as $main){
          // chek apakah punya sub menu ?
               
        $sub_menu = $this->db->get_where('tabel_menu',array('is_main_menu'=>$main->id));
        if($sub_menu->num_rows()>0){
            // tampilkan menu dengan submenu
          echo '<li><a><i class="fa '.$main->icon.'"></i> '.$main->nama_menu.' <span class="fa fa-chevron-down"></span></a>';
                    //echo "<li class='active'>".anchor('#','<i class="fa '.$main->icon.'"></i>'.$main->judul.'<span class="fa fa-chevron-down"></span>');
          echo '<ul class="nav child_menu">';
          foreach ($sub_menu->result() as $sub){
            echo "<li>".anchor($sub->link,$sub->nama_menu)."</li>";
          }
          echo '</ul>';
          echo "</li>"; 
        }else{
            // tampilkan single menu
          echo "<li>".anchor($main->link,'<i class="fa '.$main->icon.'"></i>'.$main->nama_menu)."</li>"; 
        }
      }
      ?>
      
    </ul>
  </div>

</div>
<!-- /sidebar menu -->

<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
  <a data-toggle="tooltip" data-placement="top" title="Settings">
    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="FullScreen">
    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="Lock">
    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php  echo base_url('auth/logout'); ?>">
    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
  </a>
</div>
<!-- /menu footer buttons -->
</div>
</div>

        <!-- top navigation -->