<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTimestampsTable extends Migration
{
    public function up()
    {
        $fields = [
            'created_at' => [
                'type' => 'DATETIME'
            ],
            'updated_at' => [
                'type' => 'DATETIME'
            ]
        ];

        $this->forge->addColumn('todos', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('todos', 'created_at', 'updated_at');
    }
}
