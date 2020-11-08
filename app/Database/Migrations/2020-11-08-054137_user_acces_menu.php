<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserAccesMenu extends Migration
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
			'role_id'       => [
				'type'           => 'INT',
				'constraint'     => 1,
			],
			'menu_id' => [
				'type'           => 'INT',
				'constraint'     => 1,
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('user_acces_menu');
	}

	public function down()
	{
		$this->forge->dropTable('user_acces_menu');
	}
}
