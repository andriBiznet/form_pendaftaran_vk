<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class PesertaModel extends Model
{
    protected $table = "tbl_pendaftaran";
    protected $primaryKey = "id_pendaftaran";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['id_pendaftaran', 'kode_vaksin_3', 'kode_tiket', 'nama', 'tanggal_lahir', 'nik', 'no_hp', 'tanggal_vac', 'metode_kedatangan', 'pilih_sesi', 'status', 'jenis_vaksinasi', 'disabilitas', 'status_abk', 'updated_at', 'created_at'];
}