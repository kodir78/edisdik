<?php 
$string ="<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>";
$string = "<div class=\"\">
    <!-- Tab -->
    <div class=\"col-md-12 col-sm-12 col-xs-12\">
      <div class=\"x_panel\">
        <div class=\"x_title\">
          <h2><?php echo \$button ?> Data <small>".  ucwords($table_name)."</small></h2> &nbsp&nbsp&nbsp&nbsp
          <button type=\"button\" class=\"btn btn-info\" data-toggle=\"modal\" data-target=\".bs-example-modal-lg\">Import</button> &nbsp&nbsp
          <ul class=\"nav navbar-right panel_toolbox\">
            <li> <a href=\"<?php echo site_url('".$c_url."') ?>\"><i class=\"fa fa-sign-out\"></i></a></li>
            <li><a class=\"collapse-link\"><i class=\"fa fa-chevron-up\"></i></a></li>
            <li class=\"dropdown\">
              <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-expanded=\"false\"><i class=\"fa fa-wrench\"></i></a>
              <ul class=\"dropdown-menu\" role=\"menu\">
                <li><a href=\"#\">Settings 1</a>
                </li>
                <li><a href=\"#\">Settings 2</a>
                </li>
            </ul>
        </li>
        <li><a class=\"close-link\"><i class=\"fa fa-close\"></i></a>
        </li>
    </ul>
    <div class=\"clearfix\"></div>
</div>
 <div class=\"modal fade bs-example-modal-lg\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">
                    <div class=\"modal-dialog modal-lg\">
                      <div class=\"modal-content\">
                        <div class=\"modal-header\">
                          <button type=\"button\" class=\"close\" data-dismiss=\"modal\"><span aria-hidden=\"true\">×</span>
                          </button>
                          <h4 class=\"modal-title\" id=\"myModalLabel\">Import Data ".  ucwords($table_name)."</h4>
                        </div>
                        <div class=\"modal-body\">
                            <!-- form start sesuiakan controller/upload-->
                                    <form action=\"<?php echo site_url();?>".$c_url."/upload/\" enctype=\"multipart/form-data\" method=\"post\">  
                                      <div class=\"box-body\">
                                        <div class=\"form-group\">
                                        Pastikan file sumber yang Anda gunakan ekstensi <b>xls|xlsx</b> &nbsp&nbsp&nbsp&nbsp
                                        <?php echo anchor('downloads/templatedata_.xlsx', 'Download Template', array('class' => 'btn btn-info btn-sm')); ?><br>
                                          <label for=\"file\">File input</label>
                                          <input name=\"file\" type=\"file\" id=\"file\">
                                        </div>
                                      </div>
                                      <!-- /.box-body -->
                                      <div class=\"box-footer\">
                                        <button type=\"submit\" class=\"btn btn-success\"><i class=\"fa fa-upload\"></i> Import</button>&nbsp&nbsp&nbsp&nbsp
                                      </div>
                                    </form>
                        </div>
                        <div class=\"modal-footer\">
                          <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
                        </div>

                      </div>
                    </div>
                  </div>
<div class=\"x_content\">
 <br />
<form action=\"<?php echo \$action; ?>\" method=\"post\">
                                            <table class=\"table table-bordered table-responsive\">";
                            foreach ($non_pk as $row) {
                                if ($row["data_type"] == 'text')
                                {
                                $string .= "\n<tr>
                                                    <td width=\"200\">
                                                        ".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?>
                                                    </td>
                                                    <td>
                                                        <textarea class=\"form-control\" rows=\"3\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\"><?php echo $".$row["column_name"]."; ?></textarea>
                                                    </td>
                                                </tr>";
                                }elseif($row["data_type"]=='email'){
                                    $string .= "\n<tr>
                                                    <td width='200'>
                                                        ".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?>
                                                    </td>
                                                    <td>
                                                        <input type=\"email\" class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" value=\"<?php echo $".$row["column_name"]."; ?>\" />
                                                    </td>
                                                </tr>";    
                                }
                                elseif($row["data_type"]=='date'){
                                    $string .= "\n<tr>
                                                    <td width='200'>
                                                        ".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?>
                                                    </td>
                                                    <td>
                                                        <input type=\"date\" class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" value=\"<?php echo $".$row["column_name"]."; ?>\" />
                                                    </td>
                                                </tr>";    
                                    } 
                                else
                                {
                                $string .= "\n<tr>
                                                    <td width=\"200\">
                                                        ".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?>
                                                    </td>
                                                    <td>
                                                        <input type=\"text\" class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" value=\"<?php echo $".$row["column_name"]."; ?>\" />
                                                    </td>
                                                </tr>";
                                }
                            }
                            $string .= "\n<tr>
                                                    <td>
                                                    </td>
                                                    <td>
                                                        <input type=\"hidden\" name=\"".$pk."\" value=\"<?php echo $".$pk."; ?>\" /> 
                                                        <button type=\"submit\" class=\"btn btn-success\"><i class=\"fa fa-floppy-o\"></i> <?php echo \$button ?></button>&nbsp&nbsp&nbsp&nbsp
                                                        <a href=\"<?php echo site_url('".$c_url."') ?>\" class=\"btn btn-info\"><i class=\"fa fa-sign-out\"></i> Kembali</a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </form>
                                        </div>   
                                     </div>
                                     <div class=\"clearfix\"></div>
                                    </div>"; 
                                                                       

$hasil_view_form = createFile($string, $target."views/" . $c_url . "/" . $v_form_file);

?>