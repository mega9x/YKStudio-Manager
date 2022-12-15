<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Import extends CI_Controller
{
    /// 这个模块于 2022/12/15 重写
    /// Copyright megaTechart
    public function __construct()
    {
        //parent::__construct();
        //   $this->load->library(‘php-excel/reader’);
        parent::__construct();
        $this->load->model('excel_import_model');
        $this->load->library('excel');
        $this->common_model->checkpurview(72);
    }

    public function index()
    {
        $this->common_model->checkpurview(72);
        $this->load->model('data_model');
        $data['select_user'] = $this->mysql_model->get_results('user', array('isdel' => 0));
        //$where='';
        //$data['list']= $this->data_model->get_user_list($where,$type=2);
        //$post = array('User','excelfile','excelfile');
        $this->load->view('import/index', $data);
        //var_dump($data);
    }
    function daoru()
    {
        $jieshou = str_htmlencode($this->input->post(NULL, TRUE));
        //var_dump($data);
        $addusers = $this->session->userdata("username");
        $uid = $this->session->userdata("uid");
        //var_dump($addusers);
        if (!isset($_FILES["file"]["name"])) {
            return;
        }
        $path = $_FILES["file"]["tmp_name"];
        $object = PHPExcel_IOFactory::load($path);
        foreach ($object->getWorksheetIterator() as $worksheet) {
            $highestRow = $worksheet->getHighestRow();
            $highestColumn = $worksheet->getHighestColumn();
            for ($row = 2; $row <= $highestRow; $row++) {
                $accountName = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                $accountPassword = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                $site = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                $area = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                $missionTitle = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                $missionCode = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                $missionLink = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                $src = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                if( strlen($accountName) <= 0 ||
                    strlen($accountPassword) <= 0 ||
                    strlen($site) <= 0 ||
                    strlen($area) <= 0 ||
                    strlen($missionTitle) <= 0 ||
                    (strlen($missionCode) <= 0 && strlen($missionLink) <=0) ||
                    strlen($src) <= 0
                ) {
                    continue;
                }
                $adddate = date('Y-m-d');
                $addtime = date('Y-m-d H:i:s');
                $data[] = array(
                    'name' => $missionTitle,
                    'area1' => $area,
                    'area2' => "",
                    'address' => "账户: " .$accountName. "\n密码: " .$accountPassword,
                    'source' => $src,
                    'trade' => "CPA",
                    'email' => "",
                    'start' => "未选择",
                    'linkman' => $missionLink,
                    'job' => "",
                    //'zip'		=>	$zip,
                    'qq' => "",
                    'mobile' => $site,
                    'website' => "",
                    'weixin' => "",
                    'tel' => "",
                    'remark' => "",
                    'record' => $missionCode,
                    'adduser' => $addusers,
                    'adddate' => $adddate,
                    'addtime' => $addtime,
                    'uid' => $uid,
                );
            }
        }
        if (is_array($data) && count($data) > 0) {
            $this->excel_import_model->insert($data);
            echo  PHP_EOL. '导入成功';
        } else {
            str_alert('导入失败');
            //$this->load->view('Import/index');
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */