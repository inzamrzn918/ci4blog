<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Blog extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'blog_id'=>[
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'blog_title'         => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'unique'         => true,
            ],
            'blog_author'        => [
                'type'           =>'INT',
                'null'           => true
            ],
            'blog_description' => [
                'type'           => 'TEXT',
                'null'           => true,
            ],
            'blog_slug' => [
                'type'           => 'VARCHAR',
                'constraint'     => '256'
            ],

            'blog_logical_delete'         => [
                'type'           => 'BOOLEAN',
                'default'        => false
            ],

            'blog_status'      => [
                'type'           => 'enum',
                'constraint'     => ['ACTIVE', 'INACTIVE', 'APPROVED'],
                'default'        => 'INACTIVE',
            ],
            'blog_created_at datetime default current_timestamp', 
            'blog_created_at datetime default current_timestamp on update current_timestamp', 
        ]);

        $this->forge->addPrimaryKey('blog_id');
        $this->forge->addForeignKey('blog_author', 'user', 'user_id', 'CASCADE', 'NO ACTION');
        $this->forge->createTable('blog', true);
    }

    public function down()
    {
        //
        $this->forge->dropTable('blog', true);
    }
}
