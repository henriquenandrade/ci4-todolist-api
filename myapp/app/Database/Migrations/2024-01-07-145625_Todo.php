<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Todo extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                "id" => [
                    "type" => "INT",
                    "constraint" => 5,
                    "unsigned" => true,
                    "auto_increment" => true
                ],
                "name" => [
                    "type" => "VARCHAR",
                    "constraint" => "100"
                ],
                "done" => [
                    "type" => "BOOLEAN",
                    "default" => false
                ]
            ]
        );

        $this->forge->addKey("id", true);
        $this->forge->createTable("todos");
    }
    
    public function down()
    {
        $this->forge->dropTable("todos");
    }
}
