<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id'       => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'username'           => [
                'type'           => 'VARCHAR',
                'constraint'     => '25',
                'unique'         => true,
            ],
            'password'         => [
                'type'           => 'VARCHAR',
                'constraint'     => '256',
            ],
            'name'         => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                
            ],
            'mobile'         => [
                'type'           => 'VARCHAR',
                'constraint'     => '13',
                'unique'         => true,
            ],
            'email'         => [
                'type'           => 'VARCHAR',
                'constraint'     => '256',
                'unique'         => true,
            ],
            'user_logical_delete'         => [
                'type'           => 'BOOLEAN'
            ],
            'user_status'      => [
                'type'           => 'enum',
                'constraint'     => ['ACTIVE', 'INACTIVE', 'APPROVED','BANNED'],
                'default'        => 'INACTIVE',
            ],
            'user_created_at datetime default current_timestamp', 
            'user_updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addPrimaryKey('user_id');
        $this->forge->createTable('user'.true);
    }

    public function down()
    {
        //
        $this->forge->dropTable('user',true);
    }
}
