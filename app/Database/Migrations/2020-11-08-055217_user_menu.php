<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserMenu extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 1,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'menu'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '5',
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('user_menu');
	}

	public function down()
	{
		$this->forge->dropTable('user_menu');
	}
}
