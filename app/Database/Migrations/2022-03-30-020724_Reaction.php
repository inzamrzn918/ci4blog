<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Reaction extends Migration
{
    public function up()
    {
               //
               $this->forge->addField([
                'reaction_id'=>[
                    'type'           => 'INT',
                    'constraint'     => 5,
                    'unsigned'       => true,
                    'auto_increment' => true
                ],
                'reaction_title'         => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '100',
                    'unique'         => true,
                ],
                'reaction_description' => [
                    'type'           => 'TEXT',
                    'null'           => true,
                ],
                'reaction_slug' => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '256'
                ],
    
                'reaction_logical_delete'         => [
                    'type'           => 'BOOLEAN',
                    'default'        => false
                ],
    
                'reaction_status'      => [
                    'type'           => 'enum',
                    'constraint'     => ['ACTIVE', 'INACTIVE', 'APPROVED'],
                    'default'        => 'INACTIVE',
                ],
                'reaction_created_at datetime default current_timestamp', 
                'reaction_created_at datetime default current_timestamp on update current_timestamp', 
            ]);
    
            $this->forge->addPrimaryKey('reaction_id');
            $this->forge->addForeignKey('reaction_author','user','user_id','CASCADE', 'NO ACTION');
            $this->forge->createTable('reaction',true);
    }

    public function down()
    {
        //
        $this->forge->dropTable('reaction',true);
    }
}
