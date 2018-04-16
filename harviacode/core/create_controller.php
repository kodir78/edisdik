<?php

$string = "<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class " . $c . " extends CI_Controller
{
    
    public \$table = '$table_name';

    function __construct()
    {
       parent::__construct();
       is_login();
       //\$this->load->library('ssp');
       \$this->load->model('$m');
       \$this->load->library('form_validation');
       \$this->load->library('datatables');
       \$this->load->library(array('PHPExcel','PHPExcel/PHPExcel_IOFactory'));";

if ($jenis_tabel <> 'reguler_table') {
}      
$string .= "
    }"; 

  // Awal Penambahan datatables server
        $string .="    \n\n public function data() {
        // Nama table
            \$table = '".$table_name."';
        // Nama primaryKey
            \$primaryKey = '".$pk."';
        // List field
            \$columns = array(\n";

            $i=0;
            foreach ($all as $row){
        // $string.="\$columns = array(";
                $string.="array('db' => '".$row['column_name']."', 'dt' => '".$row['column_name']."'),\n";
                $i++;
            }

            $string .="array(
                'db' => '".$pk."',
                'dt' => 'aksi',
                'formatter' => function( \$d, \$row ) {
                    return anchor('".$c_url."/read/'.\$key = \$this->encryptions->encode(\$d,\$this->config->item('encryption_key')),'<i class=\"fa fa-eye\"></i>',\"class='btn btn-success btn-sm'\").' '.
                   anchor('".$c_url."/update/'.\$key = \$this->encryptions->encode(\$d,\$this->config->item('encryption_key')),'<i class=\"fa fa-edit\"></i>',\"class='btn btn-info btn-sm'\").' '.
                   anchor('".$c_url."/delete/'.\$key = \$this->encryptions->encode(\$d,\$this->config->item('encryption_key')),'<i class=\"fa fa-trash\"></i>',\"class='btn btn-danger btn-sm'\",'onclick=\"javasciprt: return confirm(\\'Are You Sure ?\\')\"','$pk');
                   return \$this->datatables->generate();
                }
            )
        );

        \$sql_details = array(
            'user' => \$this->db->username,
            'pass' => \$this->db->password,
            'db' => \$this->db->database,
            'host' => \$this->db->hostname
        );
    
        echo json_encode(
            SSP::simple(\$_GET, \$sql_details, \$table, \$primaryKey, \$columns)
        );
    }";
            // Akhir Penambahan datatables server   

if ($jenis_tabel == 'reguler_table') {
    
$string .= "\n\n    public function index()
    {
        \$q = urldecode(\$this->input->get('q', TRUE));
        \$start = intval(\$this->uri->segment(3));
        
        if (\$q <> '') {
            \$config['base_url'] = base_url() . '$index.php/c_url/index.html?q=' . urlencode(\$q);
            \$config['first_url'] = base_url() . 'index.php/$c_url/index.html?q=' . urlencode(\$q);
        } else {
            \$config['base_url'] = base_url() . 'index.php/$c_url/index/';
            \$config['first_url'] = base_url() . 'index.php/$c_url/index/';
        }

        \$config['per_page'] = 10;
        \$config['page_query_string'] = FALSE;
        \$config['total_rows'] = \$this->" . $m . "->total_rows(\$q);
        \$$c_url = \$this->" . $m . "->get_limit_data(\$config['per_page'], \$start, \$q);
        \$config['full_tag_open'] = '<ul class=\"pagination pagination-sm no-margin pull-right\">';
        \$config['full_tag_close'] = '</ul>';
        \$this->load->library('pagination');
        \$this->pagination->initialize(\$config);

        \$data = array(
            '" . $c_url . "_data' => \$$c_url,
            'q' => \$q,
            'pagination' => \$this->pagination->create_links(),
            'total_rows' => \$config['total_rows'],
            'start' => \$start,
        );
        \$this->template->load('template','$c_url/$v_list', \$data);
    }";

   

} else {
    
$string .="\n\n    public function index()
    {
        \$this->template->load('template','$c_url/$v_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo \$this->" . $m . "->json();
    }";

}
    
$string .= "\n\n    public function read(\$key) 
    {
         \$key = \$this->encryptions->decode(\$this->uri->segment(3),\$this->config->item('encryption_key'));
        \$row = \$this->" . $m . "->get_by_id(\$key);
        if (\$row) {
            \$data = array(";
foreach ($all as $row) {
    $string .= "\n\t\t'" . $row['column_name'] . "' => \$row->" . $row['column_name'] . ",";
}
$string .= "\n\t    );
            \$this->template->load('template','$c_url/$v_read', \$data);
        } else {
            \$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('$c_url'));
        }
    }

    public function create() 
    {
        \$data = array(
            'button' => 'Create',
            'action' => site_url('$c_url/create_action'),";
foreach ($all as $row) {
    $string .= "\n\t    '" . $row['column_name'] . "' => set_value('" . $row['column_name'] . "'),";
}
$string .= "\n\t);
        \$this->template->load('template','$c_url/$v_form', \$data);
    }
    
    public function create_action() 
    {
        \$this->_rules();

        if (\$this->form_validation->run() == FALSE) {
            \$this->create();
        } else {
            \$data = array(";
foreach ($non_pk as $row) {
    $string .= "\n\t\t'" . $row['column_name'] . "' => \$this->input->post('" . $row['column_name'] . "',TRUE),";
}
//$oke = alert('alert-info', 'Selamat', 'Data Berhasil Diperbaharui');
$string .= "\n\t    );

            \$this->".$m."->insert(\$data);
            \$this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('$c_url'));
        }
    }
    
    public function update(\$key) 
    {
        \$key = \$this->encryptions->decode(\$this->uri->segment(3),\$this->config->item('encryption_key'));
        \$row = \$this->".$m."->get_by_id(\$key);

        if (\$row) {
            \$data = array(
                'button' => 'Update',
                'action' => site_url('$c_url/update_action'),";
foreach ($all as $row) {
    $string .= "\n\t\t'" . $row['column_name'] . "' => set_value('" . $row['column_name'] . "', \$row->". $row['column_name']."),";
}
$string .= "\n\t    );
            \$this->template->load('template','$c_url/$v_form', \$data);
        } else {
            \$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('$c_url'));
        }
    }
    
    public function update_action() 
    {
        \$this->_rules();

        if (\$this->form_validation->run() == FALSE) {
            \$this->update(\$this->input->post('$pk', TRUE));
        } else {
            \$data = array(";
foreach ($non_pk as $row) {
    $string .= "\n\t\t'" . $row['column_name'] . "' => \$this->input->post('" . $row['column_name'] . "',TRUE),";
}    
$string .= "\n\t    );

            \$this->".$m."->update(\$this->input->post('$pk', TRUE), \$data);
            \$this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('$c_url'));
        }
    }
    
    public function delete(\$key) 
    {
        \$key = \$this->encryptions->decode(\$this->uri->segment(3),\$this->config->item('encryption_key'));
        \$row = \$this->".$m."->get_by_id(\$key);

        if (\$row) {
            \$this->".$m."->delete(\$id);
            \$this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('$c_url'));
        } else {
            \$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('$c_url'));
        }
    }


    // Import Data excel
     public function upload(){
        \$fileName = \$this->input->post('file', TRUE);

          \$config['upload_path'] = './uploads/'; 
          \$config['file_name'] = \$fileName;
          \$config['allowed_types'] = 'xls|xlsx|csv|ods|ots';
          \$config['max_size'] = 10000;

          \$this->load->library('upload', \$config);
          \$this->upload->initialize(\$config); 
          
          if (!\$this->upload->do_upload('file')) {
           \$error = array('error' => \$this->upload->display_errors());
           \$this->session->set_flashdata('message','Ada kesalah dalam upload'); 
           redirect(site_url('$c_url')); 
           //redirect('Welcome'); 
          } else {
           \$media = \$this->upload->data();
           \$inputFileName = './uploads/'.\$media['file_name'];
           
           try {
            \$inputFileType = PHPExcel_IOFactory::identify(\$inputFileName);
            \$objReader = PHPExcel_IOFactory::createReader(\$inputFileType);
            \$objPHPExcel = \$objReader->load(\$inputFileName);
           } catch(Exception \$e) {
            die('Error loading file \"'.pathinfo(\$inputFileName,PATHINFO_BASENAME).'\": '.\$e->getMessage());
           }

           \$sheet = \$objPHPExcel->getSheet(0);
           \$highestRow = \$sheet->getHighestRow();
           \$highestColumn = \$sheet->getHighestColumn();

           for (\$row = 2; \$row <= \$highestRow; \$row++){  
             \$rowData = \$sheet->rangeToArray('B' . \$row . ':' . \$highestColumn . \$row,
               NULL,
               TRUE,
               FALSE);
               // Sesuaikan kolom dengan field dari masing-masing table
             \$data = array(
             \"No\"=> \$rowData[0][0],
             \"NamaKaryawan\"=> \$rowData[0][1],
             \"Alamat\"=> \$rowData[0][2],
             \"Posisi\"=> \$rowData[0][3],
             \"Status\"=> \$rowData[0][4]
            );
            \$this->db->insert(\"".$table_name."\",\$data);
           } 
           //delete file
           \$file = \$media['file_name'];
           \$path = './uploads/' . \$file;
            // Perintah meghapus file yang di upload -> unlink(\$path);
            unlink(\$path);
           \$this->session->set_flashdata('message','Berhasil upload ...!!'); 
           redirect(site_url('$c_url'));
          }  
    } 
   

    public function _rules() 
    {";
foreach ($non_pk as $row) {
    $int = $row3['data_type'] == 'int' || $row['data_type'] == 'double' || $row['data_type'] == 'decimal' ? '|numeric' : '';
    $string .= "\n\t\$this->form_validation->set_rules('".$row['column_name']."', '".  strtolower(label($row['column_name']))."', 'trim|required$int');";
}    
$string .= "\n\n\t\$this->form_validation->set_rules('$pk', '$pk', 'trim');";
$string .= "\n\t\$this->form_validation->set_error_delimiters('<span class=\"text-danger\">', '</span>');
    }";

if ($export_excel == '1') {
    $string .= "\n\n    public function excel()
    {
        \$this->load->helper('exportexcel');
        \$namaFile = \"$table_name.xls\";
        \$judul = \"$table_name\";
        \$tablehead = 0;
        \$tablebody = 1;
        \$nourut = 1;
        //penulisan header
        header(\"Pragma: public\");
        header(\"Expires: 0\");
        header(\"Cache-Control: must-revalidate, post-check=0,pre-check=0\");
        header(\"Content-Type: application/force-download\");
        header(\"Content-Type: application/octet-stream\");
        header(\"Content-Type: application/download\");
        header(\"Content-Disposition: attachment;filename=\" . \$namaFile . \"\");
        header(\"Content-Transfer-Encoding: binary \");

        xlsBOF();

        \$kolomhead = 0;
        xlsWriteLabel(\$tablehead, \$kolomhead++, \"No\");";
foreach ($non_pk as $row) {
        $column_name = label($row['column_name']);
        $string .= "\n\txlsWriteLabel(\$tablehead, \$kolomhead++, \"$column_name\");";
}
$string .= "\n\n\tforeach (\$this->" . $m . "->get_all() as \$data) {
            \$kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber(\$tablebody, \$kolombody++, \$nourut);";
foreach ($non_pk as $row) {
        $column_name = $row['column_name'];
        $xlsWrite = $row['data_type'] == 'int' || $row['data_type'] == 'double' || $row['data_type'] == 'decimal' ? 'xlsWriteNumber' : 'xlsWriteLabel';
        $string .= "\n\t    " . $xlsWrite . "(\$tablebody, \$kolombody++, \$data->$column_name);";
}
$string .= "\n\n\t    \$tablebody++;
            \$nourut++;
        }

        xlsEOF();
        exit();
    }";
}

if ($export_word == '1') {
    $string .= "\n\n    public function word()
    {
        header(\"Content-type: application/vnd.ms-word\");
        header(\"Content-Disposition: attachment;Filename=$table_name.doc\");

        \$data = array(
            '" . $table_name . "_data' => \$this->" . $m . "->get_all(),
            'start' => 0
        );
        
        \$this->load->view('" . $c_url ."/". $v_doc . "',\$data);
    }";
}

if ($export_pdf == '1') {
    $string .= "\n\n    function pdf()
    {
        \$data = array(
            '" . $table_name . "_data' => \$this->" . $m . "->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        \$html = \$this->load->view('" . $c_url ."/". $v_pdf . "', \$data, true);
        \$this->load->library('pdf');
        \$pdf = \$this->pdf->load();
        \$pdf->WriteHTML(\$html);
        \$pdf->Output('" . $table_name . ".pdf', 'D'); 
    }";
}

$string .= "\n\n}\n\n/* End of file $c_file */
/* Kodir Zaelani */
/* Location: ./application/controllers/$c_file */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator ".date('Y-m-d H:i:s')." */
/* http://harviacode.com */";




$hasil_controller = createFile($string, $target . "controllers/" . $c_file);

?>