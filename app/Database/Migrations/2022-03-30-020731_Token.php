<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Token extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'token_id'       => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'token'           => [
                'type'           => 'TEXT',
                'unique'         => true
            ],
            'token_user'         => [
                'type'           => 'INT',
            ],
            'token_status'      => [
                'type'           => 'enum',
                'constraint'     => ['ACTIVE', 'INACTIVE'],
                'default'        => 'INACTIVE',
            ],
            'token_expires_at datetime',
            'token_created_at datetime default current_timestamp',
            'token_updated_at datetime default current_timestamp', 
            
        ]);
        $this->forge->addPrimaryKey('token_id');
        $this->forge->addForeignKey('token_user','user','user_id','CASCADE', 'CASCADE');
        $this->forge->createTable('token',true);
    }

    public function down()
    {
        //
        $this->forge->dropTable('token', true);
    }
}
