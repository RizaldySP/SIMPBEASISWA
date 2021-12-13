<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {

  //load model
  public function __construct()
  {
    parent::__construct();
    $this->load->model('pengajuan_model');
    $this->load->model('mahasiswa_model');
    //proteksi halaman
    $this->simple_login->cek_login();
  }

  //index tampil data list
	public function index()
	{
     $pengajuan = $this->pengajuan_model->listing_beasiswa();
     $cari_pengajuan = $this->pengajuan_model->listingcaripengajuan_bakm();
     $cari_pengajuan_bakm = $this->pengajuan_model->listing_export();
     $cari_periode_bakm = $this->pengajuan_model->listing_export();
	   $data = array ('title' => 'Data Pengajuan',
                    'pengajuan'  => $pengajuan,
                    'cari_pengajuan'  => $cari_pengajuan,
                    'cari_pengajuan_bakm'  => $cari_pengajuan_bakm,
                    'cari_periode_bakm'  => $cari_periode_bakm,
                    'isi'   =>  'admin/pengajuan/list');
     $this->load->view('admin/layout/wrapper' ,$data, FALSE);
	}

  public function status($id_pengajuan)
  {
    //mengambil detail data dari murid_model
    $pengajuan = $this->pengajuan_model->detail($id_pengajuan);

    //validasi input data
    $valid = $this->form_validation;

    $valid->set_rules('nama_beasiswa','nama beasiswa','required',
      array('required' => '%s harus diisi'));

    if($valid->run()==FALSE){
      //end validasi

     $data = array ('title' => 'Status Pengajuan',
                    'pengajuan'  =>  $pengajuan,
                    'isi'   =>  'admin/pengajuan/status');
     $this->load->view('admin/layout/wrapper' ,$data, FALSE);
     //masuk ke database
  }else{
      $i = $this->input;
      $data = array('id_pengajuan'      => $id_pengajuan,
                    'id_mahasiswa'     => $i->post('id_mahasiswa'),
                    'nama_beasiswa'    => $i->post('nama_beasiswa'),
                    'periode'    => $i->post('periode'),
                    'berkas'     => $i->post('berkas'),
                    'status'     => 'Mendapat Beasiswa',
                    'st'           => '1',
                    'tanggal_verifikasi'     => date('Y-m-d'));
      $this->pengajuan_model->edit($data);
      $this->session->set_flashdata('sukses','Data Telah Dirubah');
      redirect(base_url('admin/pengajuan'),'refresh');
    }
    //end masuk database
  }

  public function cari_pengajuan()
  {
    //mengambil detail data dari murid_model
    $pengajuan = $this->pengajuan_model->datacaripengajuan_bakm();
    $cari_pengajuan = $this->pengajuan_model->listingcaripengajuan_bakm();
    $data = array('title' => 'Data Pengajuan',
                  'cari_pengajuan' => $cari_pengajuan,
                  'pengajuan'  => $pengajuan,
                  'nama_mahasiswa'	 => $this->input->post('nama_mahasiswa'),
                  'isi'   =>  'admin/pengajuan/list');
    $this->load->view('admin/layout/wrapper' ,$data, FALSE);
  }

  public function detail($id_pengajuan)
  {
    //mengambil detail data dari murid_model
    $pengajuan = $this->pengajuan_model->detail($id_pengajuan);
     $data = array ('title' => 'Detail Data Mahasiswa',
                    'pengajuan'  =>  $pengajuan,
                    'isi'   =>  'admin/pengajuan/detail');
     $this->load->view('admin/layout/wrapper' ,$data, FALSE);
  }

  public function export_laporan_data_beasiswa()
  {
    // Load plugin PHPExcel nya
    // include APPPATH.'third_party/PHPExcel/Classes/PHPExcel.php';

    // Panggil class PHPExcel nya
    $excel = new PHPExcel();
    // Settingan awal fil excel
    $excel->getProperties()->setCreator('My Notes Code')
                 ->setLastModifiedBy('My Notes Code')
                 ->setTitle("Data Beasiswa")
                 ->setSubject("beasiswa")
                 ->setDescription("Laporan Semua Data Penerima Beasiswa")
                 ->setKeywords("Data Beasiswa");
    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
    $style_col = array(
      'font' => array('bold' => true), // Set font nya jadi bold
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
    $style_row = array(
      'alignment' => array(
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA PENERIMA BEASISWA"); // Set kolom A1 dengan tulisan "DATA SISWA"
    $excel->getActiveSheet()->mergeCells('A1:J1'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
    // Buat header tabel nya pada baris ke 3
    $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO");
    $excel->setActiveSheetIndex(0)->setCellValue('B3', "FAKULTAS");
    $excel->setActiveSheetIndex(0)->setCellValue('C3', "PRODI");
    $excel->setActiveSheetIndex(0)->setCellValue('D3', "NIM");
    $excel->setActiveSheetIndex(0)->setCellValue('E3', "NAMA BEASISWA");
    $excel->setActiveSheetIndex(0)->setCellValue('F3', "PERIODE");
    $excel->setActiveSheetIndex(0)->setCellValue('G3', "NAMA MAHASISWA");
    $excel->setActiveSheetIndex(0)->setCellValue('H3', "BERKAS");
    $excel->setActiveSheetIndex(0)->setCellValue('I3', "TANGGAL PENGAJUAN");
    $excel->setActiveSheetIndex(0)->setCellValue('J3', "TANGGAL VERIFIKASI");
    $excel->setActiveSheetIndex(0)->setCellValue('K3', "STATUS BEASISWA");

    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
    $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);

    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    $pengajuan = $this->pengajuan_model->listing_export_data();
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($pengajuan as $pengajuan){ // Lakukan looping pada variabel siswa

      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $pengajuan->nama_fakultas);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $pengajuan->nama_prodi);
      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $pengajuan->nim);
      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $pengajuan->nama_beasiswa);
      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $pengajuan->periode);
      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $pengajuan->nama_mahasiswa);
      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $pengajuan->berkas);
      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $pengajuan->tanggal_pengajuan);
      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $pengajuan->tanggal_verifikasi);
      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $pengajuan->status);

      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('g'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('h'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('i'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('j'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('k'.$numrow)->applyFromArray($style_row);

      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Set width kolom
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(30); // Set width kolom B
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(30); // Set width kolom D
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('g')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('h')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('i')->setWidth(30); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('j')->setWidth(30); // Set width kolom B
    $excel->getActiveSheet()->getColumnDimension('k')->setWidth(30); // Set width kolom B

    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Data Laporan Penerima Beasiswa");
    $excel->setActiveSheetIndex(0);
    // Proses file excel
    ob_end_clean();
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Data Laporan Penerima Beasiswa.xlsx"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
  }

}
