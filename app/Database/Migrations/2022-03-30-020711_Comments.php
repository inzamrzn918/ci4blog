<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Comments extends Migration
{
    public function up()
    {
                //
                $this->forge->addField([
                    'comment_id'=>[
                        'type'           => 'INT',
                        'constraint'     => 5,
                        'unsigned'       => true,
                        'auto_increment' => true
                    ],
                    'comment_title'         => [
                        'type'           => 'VARCHAR',
                        'constraint'     => '100'
                    ],
                    'comment_author'        => [
                        'type'           =>'INT',
                        'null'           => true
                    ],
                    'comment_post'        => [
                        'type'           =>'INT',
                        'null'           => true
                    ],
                    'comment_text' => [
                        'type'           => 'TEXT',
                        'null'           => true,
                    ],
        
                    'comment_logical_delete'         => [
                        'type'           => 'BOOLEAN',
                        'default'        => false
                    ],
        
                    'comment_status'      => [
                        'type'           => 'enum',
                        'constraint'     => ['ACTIVE', 'INACTIVE', 'APPROVED','REJECTED'],
                        'default'        => 'INACTIVE',
                    ],
                    'comment_created_at datetime default current_timestamp', 
                    'comment_created_at datetime default current_timestamp on update current_timestamp', 
                ]);
        
                $this->forge->addPrimaryKey('comment_id');
                $this->forge->addForeignKey('comment_author','user','user_id','CASCADE', 'NO ACTION');
                $this->forge->addForeignKey('comment_post','blog','blog_id','CASCADE', 'NO ACTION');
                
                $this->forge->createTable('comment', true);
    }

    public function down()
    {
        //
        $this->forge->dropTable('comment', true);
    }
}
