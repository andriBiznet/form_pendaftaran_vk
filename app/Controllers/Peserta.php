<?php
 
namespace App\Controllers;
 
use App\Models\PesertaModel;
 
class Peserta extends BaseController
{
    protected $peserta;
	protected $table = 'tbl_pendaftaran';
 
    function __construct()
    {
        $this->peserta = new PesertaModel();
    }
 
    public function index()
    {
        $data['peserta'] = $this->peserta->findAll();
        return view('peserta/index', $data);
    } 

    public function cek_data()
    {
    	$data['peserta'] = $this->peserta->findAll();
        return view('peserta/cek_data', $data);
    }

    public function add_data()
    {
        if (!$this->validate([
            'kode_vaksin_3' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'jenis_vaksin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'tanggal_vaksin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'sesi_kedatangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'bulan_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'tahun_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'nik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'no_hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
 
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
 
        $tanggal_lahir = strlen($this->request->getVar('tanggal_lahir'));
        if ($tanggal_lahir == 1) {
        	$r_tanggal_lahir = '0'.$this->request->getVar('tanggal_lahir');
        }else{
        	$r_tanggal_lahir = $this->request->getVar('tanggal_lahir');
        }

        $bulan_lahir = strlen($this->request->getVar('bulan_lahir'));
        if ($bulan_lahir == 1) {
        	$r_bulan_lahir = '0'.$this->request->getVar('bulan_lahir');
        }else{
        	$r_bulan_lahir = $this->request->getVar('bulan_lahir');
        }

        $tahun_lahir = strlen($this->request->getVar('tahun_lahir'));
        $t_lahir = $this->request->getVar('tahun_lahir');
        if ($tahun_lahir == '2') {
        	if ($t_lahir == '00' || $t_lahir == '01' || $t_lahir == '02' || $t_lahir == '03' || $t_lahir == '04' || $t_lahir == '05' || $t_lahir == '06' || $t_lahir == '07' || $t_lahir == '08' || $t_lahir == '09') {
        		$r_tahun_lahir = '20'.$this->request->getVar('tahun_lahir');
        	}else{
        		$r_tahun_lahir = '19'.$this->request->getVar('tahun_lahir');
        	}
        }elseif($tahun_lahir == '1'){
        	session()->setFlashdata('message', 'silahkan masukan tahun kelahiran kembali');
        	return redirect()->route('peserta');
        }else{
        	$r_tahun_lahir = $this->request->getVar('tahun_lahir');
        }

        $result_tanggal_lahir = $r_tanggal_lahir .'-'. $r_bulan_lahir .'-'. $r_tahun_lahir;
        // echo $result_tanggal_lahir;exit();

    	$nik = $this->request->getVar('nik');
		$data['peserta'] = $this->peserta->table($this->table)->select('id_pendaftaran, nik')->where(["nik" => $nik])->get()->getResult();
    	$cek_nik = count($data['peserta']);

    	if ($cek_nik) {
    		session()->setFlashdata('error', 'Mohon maaf nik anda sudah terdaftar. Terimakasih');
    		return redirect()->route('peserta');
    	}else{
	        $this->peserta->insert([
	            'kode_vaksin_3' => $this->request->getVar('kode_vaksin_3'),
	            'jenis_vaksinasi' => $this->request->getVar('jenis_vaksin'),
	            'tanggal_vac' => $this->request->getVar('tanggal_vaksin'),
	            'metode_kedatangan' => $this->request->getVar('sesi_kedatangan'),
	            'nama' => $this->request->getVar('nama'),
	            'tanggal_lahir' => $result_tanggal_lahir,
	            'nik' => $this->request->getVar('nik'),
	            'no_hp' => $this->request->getVar('no_hp')
	        ]);
	        session()->setFlashdata('message', 'Tambah Data Peserta Berhasil');
	        return redirect()->route('peserta');
    	}

        $this->peserta->insert([
            'kode_vaksin_3' => $this->request->getVar('kode_vaksin_3'),
            'jenis_vaksinasi' => $this->request->getVar('jenis_vaksin'),
            'tanggal_vac' => $this->request->getVar('tanggal_vaksin'),
            'metode_kedatangan' => $this->request->getVar('sesi_kedatangan'),
            'nama' => $this->request->getVar('nama'),
            'tanggal_lahir' => $result_tanggal_lahir,
            'nik' => $this->request->getVar('nik'),
            'no_hp' => $this->request->getVar('no_hp')
        ]);
        session()->setFlashdata('message', 'Tambah Data Peserta Berhasil');
        return redirect()->route('peserta');
    }

    public function result_cek_data()
    {
    	$nik = $this->request->getVar('nik');
		$data['peserta'] = $this->peserta->table($this->table)->select('id_pendaftaran, nik')->where(["nik" => $nik])->get()->getResult();
    	$cek_nik = count($data['peserta']);

    	if ($cek_nik) {
    		echo "ada";
    	}else{
	        session()->setFlashdata('message', 'Mohon maaf nik anda tidak ada. Silahkan registrasi kembali. Terimakasih');
	        return redirect()->route('peserta/cek_data');
    	}
    }

}