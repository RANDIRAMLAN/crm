<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Complaint extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'company'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '50',
			],
			'phone_number' => [
				'type'           => 'CHAR',
				'constraint'     =>  '12',
			],
			'email' => [
				'type'	         => 'VARCHAR',
				'constraint'	 => '50',
			],
			'complaint' => [
				'type'			 => 'VARCHAR',
				'constraint'	 => '255'
			],
			'complaint_desc' => [
				'type'			 => 'VARCHAR',
				'constraint'	 => '500',
			],
			'screen_complaint' => [
				'type'			 => 'VARCHAR',
				'constraint'	 => '255'
			],
			'status' => [
				'type'			 => 'VARCHAR',
				'constraint'	 => '10',
			],
			'to_do' => [
				'type'			 => 'VARCHAR',
				'constraint'	 => '50',
			],
			'solution' => [
				'type'			 => 'VARCHAR',
				'constraint'	 => '500'
			],
			'screen_fix' => [
				'type'			 => 'VARCHAR',
				'constraint'	 => '255',
			],
			'created_at' => [
				'type'			 => 'DATETIME',
				'null'			 => true,
			],
			'updated_at' => [
				'type'			 => 'DATETIME',
				'null'			 => true,
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('complaint');
	}

	public function down()
	{
		$this->forge->dropTable('complaint');
	}
}
