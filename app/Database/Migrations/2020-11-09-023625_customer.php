<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Customer extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'company' => [
				'type'           => 'VARCHAR',
				'constraint'     => '50',
			],
			'owner' => [
				'type'           => 'VARCHAR',
				'constraint'     => '50',
			],
			'phone_number' => [
				'type'			 => 'CHAR',
				'constraint'	 => '12',
			],
			'email'	=> [
				'type'	    	 => 'VARCHAR',
				'constraint'	 => '50',
			],
			'address' => [
				'type'			 => 'VARCHAR',
				'constraint'	 => '128',
			],
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
		$this->forge->addKey('id', true);
		$this->forge->createTable('customer');
	}

	public function down()
	{
		$this->forge->dropTable('customer');
	}
}
