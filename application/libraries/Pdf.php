<?php defined('BASEPATH') OR exit('No direct script access allowed');
use Mpdf\Mpdf;


class Pdf
{
    public function __construct() {
        $this->_ci = get_instance();
        // $this->load->helper('file');
    }

    public function __get($var) {
        // return get_instance()->controller->$var;
    }

    public function generate($content, $name = 'download.pdf', $output_type = null, $footer = null, $margin_bottom = null, $header = null, $margin_top = null, $orientation = 'P') {

        if (!$output_type) {
            $output_type = 'S';
        }
        if (!$margin_bottom) {
            $margin_bottom = 0;
        }
        if (!$margin_top) {
            $margin_top = 0;
        }

        // $mpdf = new Mpdf('utf-8', 'A4-' . $orientation, '13', '', 10, 10, $margin_top, $margin_bottom, 9, 9);
        $mpdf = new Mpdf();

        // $mpdf->debug = (ENVIRONMENT == 'development');
        $mpdf->autoScriptToLang = true;
        $mpdf->autoLangToFont = true;
        $mpdf->setAutoTopMargin = 'stretch';
        $mpdf->setAutoBottomMargin = 'stretch';


        // if you need to add protection to pdf files, please uncomment the line below or modify as you need.
        $mpdf->SetProtection(array('print')); // You pass 2nd arg for user password (open) and 3rd for owner password (edit)
        // $mpdf->SetProtection(array('print', 'copy')); // Comment above line and uncomment this to allow copying of content
        $mpdf->SetTopMargin($margin_top);
        $mpdf->SetTitle('Qzolve');
        $mpdf->SetAuthor('Admin');
        $mpdf->SetCreator('Qzolve.com');
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->SetHTMLHeader('<img src="'. base_url() . 'skin/img/1TOP.jpg" style="width:100%;"/> ', '', true);
        
        $mpdf->SetHTMLFooter('<img src="'. base_url() . 'skin/img/footer.jpg" style="width:100%;"/>', '', true);

        $mpdf->AddPageByArray([
            'margin-left' => 0,
            'margin-right' => 0,
            'margin-top' => 0,
            'margin-bottom' => 0,
            'margin-header' => 0,
            'margin-footer' => 0,
        ]);
        
        $mpdf->shrink_tables_to_fit = 1;
        $mpdf->use_kwt = true;

        // $stylesheet = file_get_contents('assets/bootstrap/css/bootstrap.min.css');
        // $stylesheet = file_get_contents('assets/dist/css/AdminLTE.min.css');
        // $mpdf->WriteHTML($stylesheet, 1);

        // $stylesheet = file_get_contents('assets/bs/bootstrap.min.css');
        // $mpdf->WriteHTML($stylesheet, 1);
        
        // $mpdf->SetFooter($this->_ci->mSettings->sitename.'||{PAGENO}/{nbpg}', '', TRUE); // For simple text footer

        if (is_array($content)) {
            $mpdf->SetHeader($this->_ci->mSettings->sitename.'||{PAGENO}/{nbpg}', '', TRUE); // For simple text header
            $as = sizeof($content);
            $r = 1;
            foreach ($content as $page) {
                @$mpdf->WriteHTML($page['content']);
                if (!empty($page['footer'])) {
                    $mpdf->SetHTMLFooter('<p class="text-center">' . $page['footer'] . '</p>', '', true);
                }
                if ($as != $r) {
                    $mpdf->AddPage();
                }
                $r++;
            }

        } else {
            @$mpdf->WriteHTML($content);
            if ($header != '') {
                $mpdf->SetHTMLHeader('<p class="text-center">' . $header . '</p>', '', true);
            }
            if ($footer != '') {
                $mpdf->SetHTMLFooter('<p class="text-center">' . $footer . '</p>', '', true);
            }

        }

        if ($output_type == 'S') {
            ob_clean();
        	$file_content = $mpdf->Output('', 'S');
            write_file('assets/uploads/' . $name, $file_content);
            return 'assets/uploads/' . $name;
            // $file_content = $mpdf->Output('', 'S');
            // write_file('assets/uploads/pdf/' . $name, $file_content);
            // return 'assets/uploads/pdf/' . $name;
        } else {
            ob_clean();
            @$mpdf->Output($name, $output_type);
        }
    }
    
    
    public function generate_positive($content, $name = 'download.pdf', $output_type = null, $footer = null, $margin_bottom = null, $header = null, $margin_top = null, $orientation = 'P') {

        if (!$output_type) {
            $output_type = 'S';
        }
        if (!$margin_bottom) {
            $margin_bottom = 0;
        }
        if (!$margin_top) {
            $margin_top = 0;
        }

        // $mpdf = new Mpdf('utf-8', 'A4-' . $orientation, '13', '', 10, 10, $margin_top, $margin_bottom, 9, 9);
        $mpdf = new Mpdf();

        // $mpdf->debug = (ENVIRONMENT == 'development');
        $mpdf->autoScriptToLang = true;
        $mpdf->autoLangToFont = true;
        $mpdf->setAutoTopMargin = 'stretch';
        $mpdf->setAutoBottomMargin = 'stretch';


        // if you need to add protection to pdf files, please uncomment the line below or modify as you need.
        $mpdf->SetProtection(array('print')); // You pass 2nd arg for user password (open) and 3rd for owner password (edit)
        // $mpdf->SetProtection(array('print', 'copy')); // Comment above line and uncomment this to allow copying of content
        $mpdf->SetTopMargin($margin_top);
        $mpdf->SetTitle('Qzolve');
        $mpdf->SetAuthor('Admin');
        $mpdf->SetCreator('Qzolve.com');
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->SetHTMLHeader('<img src="'. base_url() . 'skin/img/TOP_POSTIVE.jpg" style="width:100%;"/> ', '', true);
        
        $mpdf->SetHTMLFooter('<img src="'. base_url() . 'skin/img/footer.jpg" style="width:100%;"/>', '', true);

        $mpdf->AddPageByArray([
            'margin-left' => 0,
            'margin-right' => 0,
            'margin-top' => 0,
            'margin-bottom' => 0,
            'margin-header' => 0,
            'margin-footer' => 0,
        ]);
        
        $mpdf->shrink_tables_to_fit = 1;
        $mpdf->use_kwt = true;

        // $stylesheet = file_get_contents('assets/bootstrap/css/bootstrap.min.css');
        // $stylesheet = file_get_contents('assets/dist/css/AdminLTE.min.css');
        // $mpdf->WriteHTML($stylesheet, 1);

        // $stylesheet = file_get_contents('assets/bs/bootstrap.min.css');
        // $mpdf->WriteHTML($stylesheet, 1);
        
        // $mpdf->SetFooter($this->_ci->mSettings->sitename.'||{PAGENO}/{nbpg}', '', TRUE); // For simple text footer

        if (is_array($content)) {
            $mpdf->SetHeader($this->_ci->mSettings->sitename.'||{PAGENO}/{nbpg}', '', TRUE); // For simple text header
            $as = sizeof($content);
            $r = 1;
            foreach ($content as $page) {
                @$mpdf->WriteHTML($page['content']);
                if (!empty($page['footer'])) {
                    $mpdf->SetHTMLFooter('<p class="text-center">' . $page['footer'] . '</p>', '', true);
                }
                if ($as != $r) {
                    $mpdf->AddPage();
                }
                $r++;
            }

        } else {
            @$mpdf->WriteHTML($content);
            if ($header != '') {
                $mpdf->SetHTMLHeader('<p class="text-center">' . $header . '</p>', '', true);
            }
            if ($footer != '') {
                $mpdf->SetHTMLFooter('<p class="text-center">' . $footer . '</p>', '', true);
            }

        }

        if ($output_type == 'S') {
            ob_clean();
        	$file_content = $mpdf->Output('', 'S');
            write_file('assets/uploads/' . $name, $file_content);
            return 'assets/uploads/' . $name;
            // $file_content = $mpdf->Output('', 'S');
            // write_file('assets/uploads/pdf/' . $name, $file_content);
            // return 'assets/uploads/pdf/' . $name;
        } else {
            ob_clean();
            @$mpdf->Output($name, $output_type);
        }
    }
    
    public function generate_negative($content, $name = 'download.pdf', $output_type = null, $footer = null, $margin_bottom = null, $header = null, $margin_top = null, $orientation = 'P') {

        if (!$output_type) {
            $output_type = 'S';
        }
        if (!$margin_bottom) {
            $margin_bottom = 0;
        }
        if (!$margin_top) {
            $margin_top = 0;
        }

        // $mpdf = new Mpdf('utf-8', 'A4-' . $orientation, '13', '', 10, 10, $margin_top, $margin_bottom, 9, 9);
        $mpdf = new Mpdf();

        // $mpdf->debug = (ENVIRONMENT == 'development');
        $mpdf->autoScriptToLang = true;
        $mpdf->autoLangToFont = true;
        $mpdf->setAutoTopMargin = 'stretch';
        $mpdf->setAutoBottomMargin = 'stretch';


        // if you need to add protection to pdf files, please uncomment the line below or modify as you need.
        $mpdf->SetProtection(array('print')); // You pass 2nd arg for user password (open) and 3rd for owner password (edit)
        // $mpdf->SetProtection(array('print', 'copy')); // Comment above line and uncomment this to allow copying of content
        $mpdf->SetTopMargin($margin_top);
        $mpdf->SetTitle('Qzolve');
        $mpdf->SetAuthor('Admin');
        $mpdf->SetCreator('Qzolve.com');
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->SetHTMLHeader('<img src="'. base_url() . 'skin/img/TOP_NEGATIVE.jpg" style="width:100%;"/> ', '', true);
        
        $mpdf->SetHTMLFooter('<img src="'. base_url() . 'skin/img/footer.jpg" style="width:100%;"/>', '', true);

        $mpdf->AddPageByArray([
            'margin-left' => 0,
            'margin-right' => 0,
            'margin-top' => 0,
            'margin-bottom' => 0,
            'margin-header' => 0,
            'margin-footer' => 0,
        ]);
        
        $mpdf->shrink_tables_to_fit = 1;
        $mpdf->use_kwt = true;

        // $stylesheet = file_get_contents('assets/bootstrap/css/bootstrap.min.css');
        // $stylesheet = file_get_contents('assets/dist/css/AdminLTE.min.css');
        // $mpdf->WriteHTML($stylesheet, 1);

        // $stylesheet = file_get_contents('assets/bs/bootstrap.min.css');
        // $mpdf->WriteHTML($stylesheet, 1);
        
        // $mpdf->SetFooter($this->_ci->mSettings->sitename.'||{PAGENO}/{nbpg}', '', TRUE); // For simple text footer

        if (is_array($content)) {
            $mpdf->SetHeader($this->_ci->mSettings->sitename.'||{PAGENO}/{nbpg}', '', TRUE); // For simple text header
            $as = sizeof($content);
            $r = 1;
            foreach ($content as $page) {
                @$mpdf->WriteHTML($page['content']);
                if (!empty($page['footer'])) {
                    $mpdf->SetHTMLFooter('<p class="text-center">' . $page['footer'] . '</p>', '', true);
                }
                if ($as != $r) {
                    $mpdf->AddPage();
                }
                $r++;
            }

        } else {
            @$mpdf->WriteHTML($content);
            if ($header != '') {
                $mpdf->SetHTMLHeader('<p class="text-center">' . $header . '</p>', '', true);
            }
            if ($footer != '') {
                $mpdf->SetHTMLFooter('<p class="text-center">' . $footer . '</p>', '', true);
            }

        }

        if ($output_type == 'S') {
            ob_clean();
        	$file_content = $mpdf->Output('', 'S');
            write_file('assets/uploads/' . $name, $file_content);
            return 'assets/uploads/' . $name;
            // $file_content = $mpdf->Output('', 'S');
            // write_file('assets/uploads/pdf/' . $name, $file_content);
            // return 'assets/uploads/pdf/' . $name;
        } else {
            ob_clean();
            @$mpdf->Output($name, $output_type);
        }
    }
    
    public function generate_samplereject($content, $name = 'download.pdf', $output_type = null, $footer = null, $margin_bottom = null, $header = null, $margin_top = null, $orientation = 'P') {

        if (!$output_type) {
            $output_type = 'S';
        }
        if (!$margin_bottom) {
            $margin_bottom = 0;
        }
        if (!$margin_top) {
            $margin_top = 0;
        }

        // $mpdf = new Mpdf('utf-8', 'A4-' . $orientation, '13', '', 10, 10, $margin_top, $margin_bottom, 9, 9);
        $mpdf = new Mpdf();

        // $mpdf->debug = (ENVIRONMENT == 'development');
        $mpdf->autoScriptToLang = true;
        $mpdf->autoLangToFont = true;
        $mpdf->setAutoTopMargin = 'stretch';
        $mpdf->setAutoBottomMargin = 'stretch';


        // if you need to add protection to pdf files, please uncomment the line below or modify as you need.
        $mpdf->SetProtection(array('print')); // You pass 2nd arg for user password (open) and 3rd for owner password (edit)
        // $mpdf->SetProtection(array('print', 'copy')); // Comment above line and uncomment this to allow copying of content
        $mpdf->SetTopMargin($margin_top);
        $mpdf->SetTitle('Qzolve');
        $mpdf->SetAuthor('Admin');
        $mpdf->SetCreator('Qzolve.com');
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->SetHTMLHeader('<img src="'. base_url() . 'skin/img/rejected_ns.jpg" style="width:100%;"/> ', '', true);
        
        $mpdf->SetHTMLFooter('<img src="'. base_url() . 'skin/img/footer.jpg" style="width:100%;"/>', '', true);

        $mpdf->AddPageByArray([
            'margin-left' => 0,
            'margin-right' => 0,
            'margin-top' => 0,
            'margin-bottom' => 0,
            'margin-header' => 0,
            'margin-footer' => 0,
        ]);
        
        $mpdf->shrink_tables_to_fit = 1;
        $mpdf->use_kwt = true;

        // $stylesheet = file_get_contents('assets/bootstrap/css/bootstrap.min.css');
        // $stylesheet = file_get_contents('assets/dist/css/AdminLTE.min.css');
        // $mpdf->WriteHTML($stylesheet, 1);

        // $stylesheet = file_get_contents('assets/bs/bootstrap.min.css');
        // $mpdf->WriteHTML($stylesheet, 1);
        
        // $mpdf->SetFooter($this->_ci->mSettings->sitename.'||{PAGENO}/{nbpg}', '', TRUE); // For simple text footer

        if (is_array($content)) {
            $mpdf->SetHeader($this->_ci->mSettings->sitename.'||{PAGENO}/{nbpg}', '', TRUE); // For simple text header
            $as = sizeof($content);
            $r = 1;
            foreach ($content as $page) {
                @$mpdf->WriteHTML($page['content']);
                if (!empty($page['footer'])) {
                    $mpdf->SetHTMLFooter('<p class="text-center">' . $page['footer'] . '</p>', '', true);
                }
                if ($as != $r) {
                    $mpdf->AddPage();
                }
                $r++;
            }

        } else {
            @$mpdf->WriteHTML($content);
            if ($header != '') {
                $mpdf->SetHTMLHeader('<p class="text-center">' . $header . '</p>', '', true);
            }
            if ($footer != '') {
                $mpdf->SetHTMLFooter('<p class="text-center">' . $footer . '</p>', '', true);
            }

        }

        if ($output_type == 'S') {
            ob_clean();
        	$file_content = $mpdf->Output('', 'S');
            write_file('assets/uploads/' . $name, $file_content);
            return 'assets/uploads/' . $name;
            // $file_content = $mpdf->Output('', 'S');
            // write_file('assets/uploads/pdf/' . $name, $file_content);
            // return 'assets/uploads/pdf/' . $name;
        } else {
            ob_clean();
            @$mpdf->Output($name, $output_type);
        }
    }

    public function merge_PDFs( $files, $output_type ){
        $pdf = new Mpdf();
        $pdf->enableImports = true;
        foreach( $files as $file ){
            $file = FCPATH. "assets/uploads/pdf/".$file.".pdf";
            $pdf->SetImportUse();
            $pagecount = $pdf->SetSourceFile($file);
            for ($i=1; $i<=($pagecount); $i++) {
                $pdf->AddPage();
                $import_page = $pdf->ImportPage($i);
                $pdf->UseTemplate($import_page);
            }
        }

        $pdf_name = date('Y-m-d_His') . '.pdf';
        $path = FCPATH . "assets/uploads/pdf/";
        $pdf_path = $path . $pdf_name;

        //Make sure path exists
        if (!file_exists($path)) {
            mkdir($path, 0777);
        }

        if ($output_type == 'F') {
            ob_clean();
            $pdf->Output($pdf_path, 'F');
            unset($pdf);
            return base_url('assets/uploads/pdf/').$pdf_name;
        } else {
            ob_clean();
            $pdf->Output($pdf_name, 'D');
        }
    }
}

?>

<?php // defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . "/third_party/MPDF/mpdf.php";

// require_once FCPATH . "vendor/mpdf/mpdf/src/Mpdf.php";

// class Pdf extends Mpdf
// {
//     public function __construct()
//     {
//         parent::__construct();
//     }
// }

?>