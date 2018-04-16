<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="row" >
    <div class="col-md-4">
        <h2 style="margin-top:0px">KELOLA HAK AKSES </h2>
    </div>
    <!-- message -->
    <div class="col-md-4 text-center">
        <div style="margin-top: 4px"  id="message">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        </div>
    </div>
    <!-- /message -->
</div>
<div class="rows">
   <div class="col-xs-12">
    <?php echo alert('alert-info', 'Perhatian', 'Silahkan Cheklist Pada Menu Yang Akan Diberikan Akses') ?>
</div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                LEVEL :  <b><?php echo $level['nama_level'] ?></b>
                <ul class="nav navbar-right panel_toolbox">
        <li> <a href="<?php echo site_url('userlevel') ?>"><i class="fa fa-sign-out"></i></a></li>
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-bordered table-striped table-responsive" id="mytable">
                    <thead>
                        <tr>
                            <th width="30px">No</th>
                            <th>Nama Modul</th>
                            <th width="100px">Beri Akses</th>
                        </tr>
                        <?php
                        $no = 1;
                        foreach ($menu as $m) {
                            echo "<tr>
                            <td>$no</td>
                            <td>$m->title</td>
                            <td align='center'><input type='checkbox' ".  checked_akses($this->uri->segment(3), $m->id_menu)." onClick='kasi_akses($m->id_menu)'></td>
                            </tr>";
                            $no++;
                        }
                        ?>
                    </thead>
                    <tfoot>
                       <tr>
                            <th width="30px">No</th>
                            <th>Nama Modul</th>
                            <th width="100px">Beri Akses</th>
                        </tr> 
                    </tfoot>
                                <!--<tr><td></td><td colspan="2">
                                        <button type="submit" class="btn btn-danger btn-sm">Simpan Perubahan</button>
                                    </td></tr>-->

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <script type="text/javascript">
                    function kasi_akses(id_menu){
        //alert(id_menu);
        var id_menu = id_menu;
        var level = '<?php echo $this->uri->segment(3); ?>';
        //alert(level);
        $.ajax({
            url:"<?php echo base_url()?>/userlevel/kasi_akses_ajax",
            data:"id_menu=" + id_menu + "&level="+ level ,
            success: function(html)
            { 
                //load();
                window.location.replace("#autoreload");
                reloading=setTimeout("window.location.reload();", 500);
                alert('Hak akses sukses dirubah');
            }
        });
    }    
</script>