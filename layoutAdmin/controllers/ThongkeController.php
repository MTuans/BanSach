<?php
require_once "model/ThongkeModel.php";
class thongkeController
{
    private $thongkeModel;


    public function __construct()
    {
        $this->thongkeModel = new thongkeModel();
    }

    public function thongke()
    {
        $sp = $this->thongkeModel->sachdaban();
        $dt_cur = $this->thongkeModel->doanhthuhomnay();
        $dt_m = $this->thongkeModel->doanhthuthang();
        $dt_w = $this->thongkeModel->doanhthutuan();
        $loai_sach = $this->thongkeModel->sachbanchaytheoloai();
        $sl_sach = $this->thongkeModel->sachdaban7ngay();

        require 'Views/index.php';
        //var_dump($sp);
        //var_dump($dt_cur);
        //var_dump($dt_m);
        //var_dump($dt_w);
        //var_dump($loai_sach);
        //var_dump($sl_sach);
    }

}
