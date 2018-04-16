<?php 
$string ="<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>";
$string .= "<div class=\"\">
    <!-- Tab -->
    <div class=\"col-md-12 col-sm-12 col-xs-12\">
      <div class=\"x_panel\">
        <div class=\"x_title\">
          <h2>Tampil Data <small>".  ucwords($table_name)."</small></h2> &nbsp&nbsp&nbsp&nbsp
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
<div class=\"x_content\">
 <br />
<table class=\"table table-bordered table-responsive\">";
foreach ($non_pk as $row) {
    if ($row["data_type"] == 'text')
    {
    $string .= "\n <tr>
                    <td width=\"200\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></td><td> <textarea class=\"form-control\" readonly=\"\" rows=\"3\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\"><?php echo $".$row["column_name"]."; ?></textarea></td>
                    </tr>";
    }elseif($row["data_type"]=='email'){
        $string .= "\n<tr>
                    <td width=\"200\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></td><td><input readonly=\"\"  type=\"email\" class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" value=\"<?php echo $".$row["column_name"]."; ?>\" /></td>
                    </tr>";    
    }
    elseif($row["data_type"]=='date'){
        $string .= "\n<tr>
                    <td width=\"200\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></td><td><input readonly=\"\"  type=\"date\" class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" value=\"<?php echo $".$row["column_name"]."; ?>\" /></td>
                    </tr>";    
        } 
    else
    {
    $string .= "\n<tr>
                    <td width=\"200\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></td><td><input type=\"text\" readonly=\"\"  class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" value=\"<?php echo $".$row["column_name"]."; ?>\" /></td>
                    </tr>";
    }
}
$string .= "\n<tr>
                    <td></td><td> <a href=\"<?php echo site_url('".$c_url."') ?>\" class=\"btn btn-info\"><i class=\"fa fa-sign-out\"></i> Kembali</a></td>
                    </tr>
            </table>
           </div>   
        </div>
        <div class=\"clearfix\"></div>
        </div>"; 



$hasil_view_read = createFile($string, $target."views/" . $c_url . "/" . $v_read_file);

?>