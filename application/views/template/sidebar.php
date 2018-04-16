 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 ?>
 <!-- sidebar menu -->
 <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
   <h3>Main Navigation</h3>
   <ul class="nav side-menu">  
   <li>
    <a href="<?php echo base_url(); ?>">
      <i class="fa fa-home"></i> <span>Dashboard</span>
    </a>
  </li>
  <!-- Menu Dinamis -->
  <?php
  // chek settingan tampilan menu
  $setting = $this->db->get_where('tbl_setting',array('id_setting'=>1))->row_array();
  if($setting['value']=='ya'){
            // cari level user
    $id_user_level = $this->session->userdata('id_user_level');
    $sql_menu = "SELECT * 
    FROM tbl_menu 
    WHERE id_menu in(select id_menu from tbl_hak_akses where id_user_level=$id_user_level) and is_main_menu=0 and is_aktif='y'";
  }else{
    $sql_menu = "select * from tbl_menu where is_aktif='y' and is_main_menu=0";
  }



  $main_menu = $this->db->query($sql_menu)->result();
  
  foreach ($main_menu as $menu){
            // chek is have sub menu
    $this->db->where('is_main_menu',$menu->id_menu);
    $this->db->where('is_aktif','y');
    $submenu = $this->db->get('tbl_menu');
    if($submenu->num_rows()>0){
                // display sub menu
      echo "<li>
      <a href='#'>
      <i class='$menu->icon'></i> <span>".ucwords($menu->title)."</span>
      <span class='fa fa-chevron-down'>
      
      </span>
      </a>
      <ul class='nav child_menu' style='display: none;'>";
      foreach ($submenu->result() as $sub){
        echo "<li>".anchor($sub->url,"<span>".ucwords($sub->title))."</span></li>"; 
      }
      echo" </ul>
      </li>";
    }else{
                // display main menu
      echo "<li>";
      echo anchor($menu->url,"<i class='".$menu->icon."'></i><span>".ucwords($menu->title));
      echo "</span></li>";
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