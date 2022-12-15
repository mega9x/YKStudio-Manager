<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Lib_upload {
 
    public $filepath = 'data/upfile/';
	
	public $newfile  = '';
  
    public $ext_arr  = array('gif','jpg','png','bmp');
    
    public $maxsize  = 9999999;
 
	public function __construct($props = array()) {
	    $this->ci = &get_instance();
		if (count($props) > 0) {
			foreach ($props as $key => $val) {
				$this->$key = $val;
			}
		}
		$this->manage_url  = base_url().$this->filepath;
		$this->path        = $this->ci->input->get('path',TRUE); 
		$this->order       = $this->ci->input->get('order',TRUE) ? $this->ci->input->get('order',TRUE) : 'name';
		$this->newfile     = $this->newfile ? $this->newfile : date('YmdHis');  
		$this->maxsize     = defined('UPLOAD_FILEMAXSIZE') ? UPLOAD_FILEMAXSIZE : $this->maxsize;
		$this->ext_arr     = defined('UPLOADTYPE') ? explode('|',UPLOADTYPE) : $this->ext_arr;
		
    }
	
	public function upload($file) {
		$oldname  = $_FILES[$file]['name'];                 
		$filesize = $_FILES[$file]['size'];               
		$type     = $_FILES[$file]['type'];  
		$tmp      = $_FILES[$file]['tmp_name'];    
		if (!empty($_FILES[$file]['error'])) {
			switch($_FILES[$file]['error']){
				case '1':$error = '超过php.ini允许的大小';break;
				case '2':$error = '超过表单允许的大小';break;
				case '3':$error = '图片只有部分被上传';break;
				case '4':$error = '请选择图片';break;
				case '6':$error = '找不到临时目录';break;
				case '7':$error = '写文件到硬盘出错';break;
				case '8':$error = 'File upload stopped by extension';break;
				default: $error = '未知错误。';
			}
			return array('error'=>$error);
		}
		if (!is_dir($this->filepath)) @mkdir($this->filepath,0777); 	                                          
		$fileext = strtolower(trim(substr(strrchr($oldname,'.'),1)));   
		$newname = $this->newfile.'.'.$fileext;                                                            
		if (!in_array($fileext,$this->ext_arr)) return array('error'=>'上传文件类型不符');
		if ($filesize>$this->maxsize) return array('error'=>'文件大小超过指定大小');       							
		if (!move_uploaded_file($tmp,$this->filepath.$newname)) return array('error'=>'文件移动失败');
		$filepath = $this->filepath.$newname;
		$info = array(
				"oldname"  =>$oldname, 
				"newname"  =>$newname,   
				"filepath" =>$filepath,           
				"filesize" =>$filesize,  
				"fileext"  =>$fileext,
	    );
		return $info;
	}
 
	public function editor($file) {
		$oldname  = $_FILES[$file]['name'];                 
		$filesize = $_FILES[$file]['size'];               
		$type     = $_FILES[$file]['type'];  
		$tmp      = $_FILES[$file]['tmp_name'];  
 		if (!empty($_FILES[$file]['error'])) {
			switch($_FILES[$file]['error']){
				case '1':$error = '超过php.ini允许的大小';break;
				case '2':$error = '超过表单允许的大小';break;
				case '3':$error = '图片只有部分被上传';break;
				case '4':$error = '请选择图片';break;
				case '6':$error = '找不到临时目录';break;
				case '7':$error = '写文件到硬盘出错';break;
				case '8':$error = 'File upload stopped by extension';break;
				default: $error = '未知错误。';
			}
			return array('error'=>$error);
		}
		$dir               = $this->ci->input->get('dir',TRUE);  
		$image             = defined('UPLOAD_IMAGEFORMAT') ? UPLOAD_IMAGEFORMAT : 'gif|jpg|jpeg|png|bmp';
		$flash             = defined('UPLOAD_FLASHFORMAT') ? UPLOAD_FLASHFORMAT : 'swf';
		$media             = defined('UPLOAD_MEDIAFORMAT') ? UPLOAD_MEDIAFORMAT : 'swf|flv|mp3|wav|wma|wmv|mid|avi|mpg|asf|rm|rmvb';
		$file              = defined('UPLOAD_FILEFORMAT') ? UPLOAD_FILEFORMAT : 'doc|docx|xls|xlsx|ppt|htm|html|txt|zip|rar|gz|flv|swf';
		$ext_arr           = array(
								'image' => explode('|',$image),
								'flash' => explode('|',$flash),
								'media' => explode('|',$media),
								'file'  => explode('|',$file)
							 );
		if (!is_dir($this->filepath)) @mkdir($this->filepath,0777); 	                                          
		$fileext = strtolower(trim(substr(strrchr($oldname,'.'),1)));   
		$newname = $this->newfile.'.'.$fileext;                                                            
		if (!in_array($fileext,$ext_arr[$dir])) return array('error'=>'上传文件类型不符');
		if ($filesize>$this->maxsize) return array('error'=>'文件大小超过指定大小');       							
		if (!move_uploaded_file($tmp,$this->filepath.$newname)) return array('error'=>'文件移动失败');
		$filepath = $this->filepath.$newname;
		$ispic    = $dir=='image' ? 1 : 0;
		$info = array(
				"oldname"  =>$oldname, 
				"newname"  =>$newname,   
				"filepath" =>$filepath,           
				"filesize" =>$filesize,  
				"fileext"  =>$fileext,
				"ispic"    =>$ispic
		);
		return $info;
	}
 
 
	//文件管理
    public function manage(){
	    
        if (empty($this->path)) {
            $current_path = realpath($this->filepath).'/';           //根据path参数，设置各路径和URL
            $current_url  = $this->manage_url;
            $current_dir_path = '';
            $moveup_dir_path  = '';
        } else {
            $current_path = realpath($this->filepath).'/'.$this->path;
            $current_url  = $this->manage_url.$this->path;
            $current_dir_path = $this->path;
            $moveup_dir_path = preg_replace('/(.*?)[^\/]+\/$/', '$1', $current_dir_path);
        }
                                             
        if (preg_match('/\.\./', $current_path)) {                    //不允许使用..移动到上一级目录
            echo 'Access is not allowed.';
            exit;
        }
        if (!preg_match('/\/$/', $current_path)) {                    //最后一个字符不是/
            echo 'Parameter is not valid.';
            exit;
        }
        if (!file_exists($current_path) || !is_dir($current_path)) {  //目录不存在或不是目录
            echo 'Directory does not exist.';
            exit;
        }
		//遍历目录取得文件信息
        $file_list = array();
        if ($handle = opendir($current_path)) {
            $i = 0;
            while (false !== ($filename = readdir($handle))) {
                if ($filename{0} == '.')
                    continue;
                $file = $current_path . $filename;
                if (is_dir($file)) {
                    $file_list[$i]['is_dir'] = true;                            //是否文件夹
                    $file_list[$i]['has_file'] = (count(scandir($file)) > 2);   //文件夹是否包含文件
                    $file_list[$i]['filesize'] = 0;                             //文件大小
                    $file_list[$i]['is_photo'] = false;                         //是否图片
                    $file_list[$i]['filetype'] = '';                            //文件类别，用扩展名判断
                } else {
                    $file_list[$i]['is_dir']   = false;
                    $file_list[$i]['has_file'] = false;
                    $file_list[$i]['filesize'] = filesize($file);
                    $file_list[$i]['dir_path'] = '';
                    $file_ext = strtolower(array_pop(explode('.', trim($file))));
                    $file_list[$i]['is_photo'] = in_array($file_ext,$this->ext_editor['image']);
                    $file_list[$i]['filetype'] = $file_ext;
                }
                $file_list[$i]['filename'] = $filename;                               //文件名，包含扩展名
                $file_list[$i]['datetime'] = date('Y-m-d H:i:s', filemtime($file));   //文件最后修改时间
                $i++;
            }
            closedir($handle);
        }
		
        usort($file_list, array($this, 'cmp_func'));

        $result = array();
		//相对于根目录的上一级目录
        $result['moveup_dir_path'] = $moveup_dir_path;
		//相对于根目录的当前目录
        $result['current_dir_path'] = $current_dir_path;
		//当前目录的URL
        $result['current_url'] = $current_url;
		//文件数
        $result['total_count'] = count($file_list);
		//文件列表数组
        $result['file_list'] = $file_list;

		//输出JSON字符串
        header('Content-type: application/json; charset=UTF-8');
        //echo $this->save_path, $this->save_url;
        echo json_encode($result);
    }
	
	public function cmp_func($a, $b) {
        if ($a['is_dir'] && !$b['is_dir']) {
            return -1;
        } else if (!$a['is_dir'] && $b['is_dir']) {
            return 1;
        } else {
            if ($this->order == 'size') {
                if ($a['filesize'] > $b['filesize']) {
                    return 1;
                } else if ($a['filesize'] < $b['filesize']) {
                    return -1;
                } else {
                    return 0;
                }
            } else if ($this->order == 'type') {
                return strcmp($a['filetype'], $b['filetype']);
            } else {
                return strcmp($a['filename'], $b['filename']);
            }
        }
    }
 

}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */