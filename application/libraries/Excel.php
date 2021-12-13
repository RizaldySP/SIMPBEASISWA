<?php

require_once(FCPATH.'application/third_party/PHPExcel/Classes/PHPExcel.php');

class Excel extends PHPExcel
{

  function __construct()
  {
    parent::__construct();
  }
}
