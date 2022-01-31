<?php
 
namespace App\Database\Migrations;
 
use CodeIgniter\Database\Migration;
 
class FormRegistrasiVaksin extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_pendaftaran'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'kode_vaksin_3'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '150',
			],
			'kode_tiket'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '200',
			],
			'nama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'tanggal_lahir'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'nik'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '150',
			],
			'no_hp' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'tanggal_vac' => [
				'type'           => 'DATE',
				'null'           => true,
			],
			'metode_kedatangan' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'pilih_sesi' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',	
			],
			'create_date' => [
				'type'           => 'DATETIME',
				'null'           => true,
			],
			'waktu_vac' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',	
			],
			'status' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',	
			],
			'jenis_vaksinasi' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',	
			],
			'disabilitas' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',	
			],
			'status_abk' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',	
			],
			'updated_at' => [
				'type'           => 'DATETIME',
				'null'           => true,
			],
			'created_at' => [
				'type'           => 'DATETIME',
				'null'           => true,
			]
		]);
		$this->forge->addPrimaryKey('id_pendaftaran');
		$this->forge->createTable('tbl_pendaftaran');
	}
 
	//--------------------------------------------------------------------
 
	public function down()
	{
		$this->forge->dropTable('form_registrasi_vaksin_3');
	}
}