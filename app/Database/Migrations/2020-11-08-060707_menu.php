<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Menu extends Migration
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
			'menu_id'       => [
				'type'           => 'INT',
				'constraint'     => 1,
			],
			'desc' => [
				'type'           => 'VARCHAR',
				'constraint'     => '15',
			],
			'url' => [
				'type'			 => 'VARCHAR',
				'constraint'	 => '128'
			],
			'icon' => [
				'type'			 => 'VARCHAR',
				'constraint'     => '255'
			],
			'status' => [
				'type'			 => 'INT',
				'constraint'     => 1,
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('menu');
	}

	public function down()
	{
		$this->forge->dropTable('menu');
	}
}
