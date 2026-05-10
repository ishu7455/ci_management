<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTasks extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],

            'user_id' => [
                'type' => 'INT',
                'constraint' => 11
            ],

            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],

            'description' => [
                'type' => 'TEXT',
                'null' => true
            ],

            'status' => [
                'type' => 'ENUM',
                'constraint' => ['Pending', 'Completed'],
                'default' => 'Pending'
            ],

            'due_date' => [
                'type' => 'DATE'
            ],

            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('tasks');
    }

    public function down()
    {
        $this->forge->dropTable('tasks');
    }
}