<?php

namespace App\Database\Seeds;

use App\Models\Todo;
use CodeIgniter\Database\Seeder;

class TodoSeeder extends Seeder
{
    public function run()
    {
        $data = array(
            [
                "name" => "task one",
                "done" => true
            ],
            [
                "name" => "task two",
                "done" => true
            ],
            [
                "name" => "task three",
                "done" => true
            ]
        );

        $todoModel = model(Todo::class);
        foreach($data as $todo) {
            $todoModel->save($todo);
        }
    }
}
