<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lib_page
{

    //分页栏每页显示的页数
    public $rollPage = 5;
    //页数跳转时要带的参数
    public $parameter;
    //分页URL地址
    public $url = '';
    //默认列表每页显示行数
    public $listRows = 10;
    //起始行数
    public $firstRow;
    //分页总页面数
    public $totalPages;
    //总行数
    public $totalRows;
    //当前页数
    public $nowPage;
    //分页的栏的总页数
    public $varPage = 'page';
    //默认分页变量名
    protected $coolPages;

    public function __construct($props = array())
    {
        $this->ci = &get_instance();
        if (count($props) > 0) {
            foreach ($props as $key => $val) {
                $this->$key = $val;
            }
        }
        $this->listRows = defined('PAGESIZE') ? PAGESIZE : $this->listRows;
        $this->totalPages = ceil($this->totalRows / $this->listRows);
        $this->coolPages = ceil($this->totalPages / $this->rollPage);
        $this->nowPage = max(intval($this->ci->input->get_post($this->varPage, TRUE)), 1);
        if (!empty($this->totalPages) && $this->nowPage > $this->totalPages) {
            $this->nowPage = $this->totalPages;
        }
        $this->firstRow = $this->listRows * ($this->nowPage - 1);
        $this->parameter = $this->parameter ? '&' . $this->parameter : '';
    }

    public function showpage()
    {
        $str = '<li class="first disabled"><a href="javascript:void(0);">' . $this->totalRows . ' 条记录 ' . $this->nowPage . '/' . $this->totalPages . '页</a></li>';
        $str .= '<li class="next"><a href="' . $this->url . '?' . $this->varPage . '=1' . $this->parameter . '">首页</a></li>';
        if ($this->nowPage < $this->rollPage) $start = 1;
        $end = 5;
        if ($this->nowPage >= $this->rollPage) {
            $start = $this->nowPage - 2;
            $end = $this->nowPage + 2;
        }
        $end = $end > $this->totalPages ? $this->totalPages : $end;
        for ($i = $start; $i <= $end; $i++) {
            if ($i == $this->nowPage) {
                $str .= '<li class="active"><a href="javascript:void(0);">' . $i . '</a></li>';
            } else {
                $str .= '<li><a href="' . $this->url . '?' . $this->varPage . '=' . $i . $this->parameter . '">' . $i . '</a></li>';
            }
        }
        $str .= '<li class="next"><a href="' . $this->url . '?' . $this->varPage . '=' . $this->totalPages . $this->parameter . '">尾页</a></li>';
        return $str;
    }

    public function m_showpage()
    {
        $str = '<a href="?' . $this->varPage . '=1"><b><<</b>';
        if ($this->nowPage < $this->rollPage) $start = 1;
        $end = 5;
        if ($this->nowPage >= $this->rollPage) {
            $start = $this->nowPage - 2;
            $end = $this->nowPage + 2;
        }
        $end = $end > $this->totalPages ? $this->totalPages : $end;
        for ($i = $start; $i <= $end; $i++) {
            if ($i == $this->nowPage) {
                $str .= '<a href="javascript:void(0);" class="active"><b>' . $i . '</b></a>';
            } else {
                $str .= '<a href="' . $this->url . '?' . $this->varPage . '=' . $i . $this->parameter . '"><b>' . $i . '</b></a>';
            }
        }
        $str .= '<a href="' . $this->url . '?' . $this->varPage . '=' . $this->totalPages . $this->parameter . '"><b>>></b></a>';
        $str .= '<label style="vertical-align: middle;">总计：<B style="color:#f30;"> ' . $this->totalRows . ' </B>条</label>';
        return $str;
    }

}
