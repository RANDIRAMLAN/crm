<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
	public function up()
	{ {
			$this->forge->addField([
				'id'          => [
					'type'           => 'INT',
					'constraint'     => 5,
					'unsigned'       => true,
					'auto_increment' => true,
				],
				'employee_id'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '10',
				],
				'name' => [
					'type'           => 'VARCHAR',
					'constraint'     => '50',
				],
				'email' => [
					'type'			 => 'VARCHAR',
					'constraint'	 => '50'
				],
				'password' => [
					'type'			 => 'VARCHAR',
					'constraint'	 => '50',
				],
				'role_id' => [
					'type'			 => 'INT',
					'constraint'	 => 1,
				],
				'status' => [
					'type'			 => 'INT',
					'constraint'	 => 1,
				]
			]);
			$this->forge->addKey('id', true);
			$this->forge->createTable('user');
		}
	}
	public function down()
	{
		$this->forge->dropTable('user');
	}
}
