<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Postal extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'country' => [
				'type'			 => 'VARCHAR',
				'constraint'	 => '50',
			],
			'province' => [
				'type'			 => 'VARCHAR',
				'constraint'	 => '50',
			],
			'city' => [
				'type'			 => 'VARCHAR',
				'constraint'	 => '50',
			],
			'district' => [
				'type'			 => 'VARCHAR',
				'constraint'	 => '50',
			],
			'sub_district' => [
				'type'			 => 'VARCHAR',
				'constraint'	 => '50',
			],
			'postal_code' => [
				'type'	         => 'INT',
				'constraint'	 => 5,
			],
		]);
		$this->forge->createTable('postal');
	}

	public function down()
	{
		$this->forge->dropTable('postal');
	}
}
