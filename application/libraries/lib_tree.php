<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Lib_tree{

    public function __construct() {
	
	}
 
	public function array_2tree($list, $pk = 'id', $pid = 'parentid', $child = 'child', $root = 0) {
		$tree = array();
		if (is_array($list)) {
			$refer = array();
			foreach ($list as $key => $data) {
				$refer[$data[$pk]] = & $list[$key];
			}
			foreach ($list as $key => $data) {
				$parentid = $data[$pid];
				if ($root == $parentid) {
					$tree[] = & $list[$key];
				} else {
					if (isset($refer[$parentid])) {
						$parent = & $refer[$parentid];
						$parent[$child][] = & $list[$key];
					}
				}
			}
		}
		return $tree;
	}
	

}
