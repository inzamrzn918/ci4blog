<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Image extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'image_id'=>[
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'image_name'         => [
                'type'           => 'TEXT',
                'unique'         => true
            ],
            'uploaded_by'        => [
                'type'           =>'INT',
                'null'           => true
            ],
            'image_description' => [
                'type'           => 'TEXT'
            ],
            'image_alt' => [
                'type'           => 'VARCHAR',
                'constraint'     => '256'
            ],

            'image_logical_delete'         => [
                'type'           => 'BOOLEAN',
                'default'        => false
            ],

            'image_status'      => [
                'type'           => 'enum',
                'constraint'     => ['ACTIVE', 'INACTIVE'],
                'default'        => 'INACTIVE',
            ],
            'image_created_at datetime default current_timestamp', 
            'image_created_at datetime default current_timestamp on update current_timestamp', 
        ]);

        $this->forge->addPrimaryKey('image_id');
        $this->forge->addForeignKey('uploaded_by','user','user_id','CASCADE', 'CASCADE');
        $this->forge->createTable('image', true);
    }

    public function down()
    {
        //
        $this->forge->dropTable('image',true);
    }
}
