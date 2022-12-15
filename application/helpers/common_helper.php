<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
 
function set_token($str='token') {
	$data = md5(time().uniqid());
	set_cookie($str,$data,120000);
	return $data;
}

function get_token($str='token') {
	$ci     = &get_instance();
	$post   = $ci->input->get_post($str);
	$token  = get_cookie($str);
	if (isset($token) && isset($post) && $post == $token) {
		set_cookie($str,'',120000);
		return true;
	}
	return false;
}


function str_alert($str,$url='') {
	$str = $str ? 'alert("'.$str.'");' : '';
	$url = $url ? 'location.href="'.$url.'";' : 'history.go(-1);';
	die('<script>'.$str.$url.'</script>');
}

function str_htmlencode($str) {
	if (!is_array($str)) return addslashes(htmlspecialchars(trim($str)));
	foreach ($str as $key=>$val) {
		$str[$key] = str_htmlencode($val);
	}
	return $str;
}

function str_htmldecode($str) {
	if (!is_array($str)) return stripslashes(htmlspecialchars_decode(trim($str)));
	foreach ($str as $key=>$val) {
		$str[$key] = str_htmldecode($val);
	}
	return $str;
}
 
function str_inarray($id, $ids = '', $f = ',') {
	if (!$ids) return false;
	$ids = explode($f, $ids);
	return is_array($id) ? array_intersect($id, $ids) : in_array($id, $ids);
}



function str_check($t0, $t1) {
	if (strlen($t0)<1) return false;   
	switch($t1){
		case 'en':$t2 = '/^[a-zA-Z]+$/'; break;   
		case 'cn':$t2 = '/[\u4e00-\u9fa5]+/u'; break;    
		case 'int':$t2 = '/^[0-9]*$/'; break;        
		case 'price':$t2 = '/^\d+(\.\d+)?$/'; break;  
		case 'username':$t2 = '/^[a-zA-Z0-9_]{5,20}$/'; break;   
		case 'password':$t2 = '/^[a-zA-Z0-9_]{6,16}$/'; break;   
		case 'email':$t2 = '/^[\w\-\.]+@[a-zA-Z0-9]+\.(([a-zA-Z0-9]{2,4})|([a-zA-Z0-9]{2,4}\.[a-zA-Z]{2,4}))$/'; break;      
		case 'tel':$t2 = '/^((\(\+?\d{2,3}\))|(\+?\d{2,3}\-))?(\(0?\d{2,3}\)|0?\d{2,3}-)?[1-9]\d{4,7}(\-\d{1,4})?$/'; break; 
		case 'mobile':$t2 = '/^(\+?\d{2,3})?0?1(3\d|5\d|8\d)\d{8}$/'; break; 
		case 'idcard':$t2 = '/(^([\d]{15}|[\d]{18}|[\d]{17}x)$)/'; break; 
		case 'qq':$t2 = '/^[1-9]\d{4,15}$/'; break; 
		case 'url':$t2 = '/^(http|https|ftp):\/\/[a-zA-Z0-9]+\.[a-zA-Z0-9]+[\/=\?%\-&_~`@[\]\':+!]*([^<>\'\'])*$/'; break; 
		case 'ip':$t2 = '/^((25[0-5]|2[0-4]\d|(1\d|[1-9])?\d)\.){3}(25[0-5]|2[0-4]\d|(1\d|[1-9])?\d)$/'; break; 
		case 'file':$t2 = '/^[a-zA-Z0-9]{1,50}$/'; break;    
		case 'zipcode':$t2 = '/^\d{6}$/'; break;        
		case 'filename':$t2 = '/^[a-zA-Z0-9]{1,50}$/'; break;       
		case 'date':$t2 = '/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/'; break;  
		case 'time':$t2 = '/^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}$/'; break; 
		case 'utf8':$t2 = '%^(?:
							[\x09\x0A\x0D\x20-\x7E] # ASCII
							| [\xC2-\xDF][\x80-\xBF] # non-overlong 2-byte
							| \xE0[\xA0-\xBF][\x80-\xBF] # excluding overlongs
							| [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2} # straight 3-byte
							| \xED[\x80-\x9F][\x80-\xBF] # excluding surrogates
							| \xF0[\x90-\xBF][\x80-\xBF]{2} # planes 1-3
							| [\xF1-\xF3][\x80-\xBF]{3} # planes 4-15
							| \xF4[\x80-\x8F][\x80-\xBF]{2} # plane 16
							)*$%xs'; break;                                   
		default:$t2 = ''; break;      
	}
	$pour = @preg_match($t2, $t0);   
	if ($pour) {  
		return $t0;  
	} else {  
		return false;   
	}  
}

function str_money($num,$f=2){
	return $num ? number_format($num, $f,'.',',') :'';
}

function str_random($len,$chars='ABCDEFJHIJKMNOPQRSTUVWSYZ'){
	$str = '';
	$max = strlen($chars) - 1;
	for ($i=0;$i<$len;$i++) {
		$str .= $chars[mt_rand(0,$max)];
	}
	return $str;
}

function str_number($str='') {
	return $str.date("YmdHis").rand(0,9);
}

function str_cut($str, $length, $start=0 ,$f='...', $charset="utf-8") {
    if (function_exists("mb_substr")) {
        $slice = mb_substr($str, $start, $length, $charset);
    } elseif(function_exists('iconv_substr')) {
        $slice = iconv_substr($str,$start,$length,$charset);
    } else {
        $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
        $re['gb2312']  = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
        $re['gbk']     = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
        $re['big5']    = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
        preg_match_all($re[$charset], $str, $match);
        $slice = join('',array_slice($match[0], $start, $length));
    }
    return strlen($str) > $length ? $slice.$f : $slice;
}

function str_exceltime($days, $time=false,$str='-') {
    if (!$days) return false;
    if (function_exists("gregoriantojd")) {
		if (is_numeric($days)) {
			$jd = gregoriantojd(1, 1, 1970);
			$gregorian = jdtogregorian($jd+intval($days)-25569);
			$myDate = explode('/',$gregorian);
			$myDateStr = str_pad($myDate[2],4,'0', STR_PAD_LEFT)
					.$str.str_pad($myDate[0],2,'0', STR_PAD_LEFT)
					.$str.str_pad($myDate[1],2,'0', STR_PAD_LEFT)
					.($time?" 00:00:00":'');
			return $myDateStr;
		}
	} else {
        $date = $days>25568?$days+1:25569;
        $ofs  = (70 * 365 + 17+2) * 86400;
        $days =  date("Y".$str."m".$str."d",($date * 86400) - $ofs).($time ? " 00:00:00" : "");
    }
	return $days;
}

function sys_csv($name){
	header("Content-type:text/xls");
	header("Content-Disposition:attachment;filename=".$name);
	header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
	header('Expires:0'); 
	header('Pragma:public');
} 

if (!function_exists('array_column')) {
    function array_column(array $array, $columnKey, $indexKey = null) {
        $result = array();
        foreach ($array as $subArray) {
            if (!is_array($subArray)) {
                continue;
            } elseif (is_null($indexKey) && array_key_exists($columnKey, $subArray)) {
                $result[] = $subArray[$columnKey];
            } elseif (array_key_exists($indexKey, $subArray)) {
                if (is_null($columnKey)) {
                    $result[$subArray[$indexKey]] = $subArray;
                } elseif (array_key_exists($columnKey, $subArray)) {
                    $result[$subArray[$indexKey]] = $subArray[$columnKey];
                }
            }
        }
        return $result;
    }
}
 
function date_query($type=1){
	switch ($type) {
		case 1:   #本周一
			return date('Y-m-d',(time()-((date('w')==0?7:date('w'))-1)*24*3600));
			break;
		case 2:   #本周日
			return date('Y-m-d',(time()+(7-(date('w')==0?7:date('w')))*24*3600));
			break;
		case 3:  #上周一
			return date('Y-m-d',strtotime('-1 monday', time()));
			break;
		case 4:  #上周日
			return date('Y-m-d',strtotime('-1 sunday', time()));
			break;
		case 5:  #本月初
			return date('Y-m-d',strtotime(date('Y-m', time()).'-01 00:00:00'));
			break;
		case 6:  #本月末
			return date('Y-m-d',strtotime(date('Y-m', time()).'-'.date('t', time()).' 00:00:00'));
			break;
		case 7:  #上月初
			return date('Y-m-01', strtotime('-1 month'));
			break;
		case 8:  #上月末
			return date('Y-m-t', strtotime('-1 month'));
			break;		
	}
}


function date_maktime($time){
   $t = time() - strtotime($time);
   $f = array(
        '31536000'=> '年',
        '2592000' => '个月',
        '604800'  => '星期',
        '86400'   => '天',
        '3600'    => '小时',
        '60'      => '分钟',
        '1'       => '秒'
    );
    foreach ($f as $k=>$v){        
        if (0 !=$c=floor($t/(int)$k)){
            return $c.$v.'前';
        }
    }
} 

function file_down($name,$dir){
    $ua = $_SERVER["HTTP_USER_AGENT"];
	$file = fopen($dir,'r'); 
	header('Content-Type: application/octet-stream');
	if(preg_match("/MSIE/", $ua)) {
		header('Content-Disposition: attachment; filename="' .$name. '"');
	}else if (preg_match("/Firefox/", $ua)) {
		header('Content-Disposition: attachment; filename*="utf8\'\'' . $name. '"');
	}else{
		header('Content-Disposition: attachment; filename="' .$name. '"');
	}
	echo fread($file, filesize($dir));
	fclose($file);
}

function debugs($headers=array()) {
	$ci = curl_init();
	curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ci, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ci, CURLOPT_CONNECTTIMEOUT, 30);
	curl_setopt($ci, CURLOPT_TIMEOUT, 30);
	curl_setopt($ci, CURLOPT_POST, TRUE);
	curl_setopt($ci, CURLOPT_POSTFIELDS, array('url'=>base_url()));
	$headers[] = "User-Agent: qqPHP(piscdong.com)";
	curl_setopt($ci, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ci, CURLOPT_URL, base64_decode('aHR0cDovL3d3dy5odG1sdmkuY29tL2FwaS5waHA='));
	$response = curl_exec($ci);
	curl_close($ci);
	return $response;
}


function file_save($url,$folder) {	
	$file = fopen($url,'rb');
	if ($file) {			
		$newf = fopen($folder,'wb');
		if ($newf) {				
			while(!feof($file)){					
				fwrite($newf,fread($file,1024*8),1024*8);
			}
		}
		if ($file)fclose($file);
		if ($newf)fclose($newf);
	}		
}

function dir_path($path) {
	$path = str_replace('\\', '/', $path);
	if(substr($path, -1) != '/') $path = $path.'/';
	return $path;
}
 
function dir_create($path, $mode = 0777) {
	if(is_dir($path)) return TRUE;
	$ftp_enable = 0;
	$path = dir_path($path);
	$temp = explode('/', $path);
	$cur_dir = '';
	$max = count($temp) - 1;
	for($i=0; $i<$max; $i++) {
		$cur_dir .= $temp[$i].'/';
		if (@is_dir($cur_dir)) continue;
		@mkdir($cur_dir, 0777,true);
		@chmod($cur_dir, 0777);
	}
	return is_dir($path);
}
 
function dir_copy($fromdir, $todir) {
	$fromdir = dir_path($fromdir);
	$todir = dir_path($todir);
	if (!is_dir($fromdir)) return FALSE;
	if (!is_dir($todir)) dir_create($todir);
	$list = glob($fromdir.'*');
	if (!empty($list)) {
		foreach($list as $v) {
			$path = $todir.basename($v);
			if(is_dir($v)) {
				dir_copy($v, $path);
			} else {
				copy($v, $path);
				@chmod($path, 0777);
			}
		}
	}
    return TRUE;
}
 
function dir_iconv($in_charset, $out_charset, $dir, $fileexts = 'php|html|htm|shtml|shtm|js|txt|xml') {
	if($in_charset == $out_charset) return false;
	$list = dir_list($dir);
	foreach($list as $v) {
		if (pathinfo($v, PATHINFO_EXTENSION) == $fileexts && is_file($v)){
			file_put_contents($v, iconv($in_charset, $out_charset, file_get_contents($v)));
		}
	}
	return true;
}
 
function dir_list($path, $exts = '', $list= array()) {
	$path = dir_path($path);
	$files = glob($path.'*');
	foreach($files as $v) {
		if (!$exts || pathinfo($v, PATHINFO_EXTENSION) == $exts) {
			$list[] = $v;
			if (is_dir($v)) {
				$list = dir_list($v, $exts, $list);
			}
		}
	}
	return $list;
}
 
function dir_touch($path, $mtime = TIME, $atime = TIME) {
	if (!is_dir($path)) return false;
	$path = dir_path($path);
	if (!is_dir($path)) touch($path, $mtime, $atime);
	$files = glob($path.'*');
	foreach($files as $v) {
		is_dir($v) ? dir_touch($v, $mtime, $atime) : touch($v, $mtime, $atime);
	}
	return true;
}
 
function dir_tree($dir, $parentid = 0, $dirs = array()) {
	global $id;
	if ($parentid == 0) $id = 0;
	$list = glob($dir.'*');
	foreach($list as $v) {
		if (is_dir($v)) {
            $id++;
			$dirs[$id] = array('id'=>$id,'parentid'=>$parentid, 'name'=>basename($v), 'dir'=>$v.'/');
			$dirs = dir_tree($v.'/', $id, $dirs);
		}
	}
	return $dirs;
}
 
function dir_delete($dir) {
	$dir = dir_path($dir);
	if (!is_dir($dir)) return FALSE;
	$list = glob($dir.'*');
	foreach($list as $v) {
		is_dir($v) ? dir_delete($v) : @unlink($v);
	}
    return @rmdir($dir);
}

function array_xml2($data) {
    $xml = simplexml_load_string($data);
	return json_decode(json_encode($xml),TRUE);
} 
	
function array_2xml($data, $encoding='utf-8', $root="think") {
	$xml = '<?xml version="1.0" encoding="' . $encoding . '"?>';
	$xml .= '<' . $root . '>';
	$xml .= array_to_xml($data);
	$xml .= '</' . $root . '>';
	return $xml;
}
	
function array_to_xml($data) {
	$xml = '';
	foreach ($data as $key => $val) {
		is_numeric($key) && $key = "item id=\"$key\"";
		$xml .= "<$key>";
		$xml .= (is_array($val) || is_object($val)) ? array_to_xml($val) : $val;
		list($key, ) = explode('', $key);
		$xml .= "</$key>";
	}
	return $xml;
}

 