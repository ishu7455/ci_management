<?php

namespace Config;

use CodeIgniter\Events\Events;
use App\Models\TaskModel;

Events::on('userLoggedIn', function($userId){

    $taskModel = new TaskModel();

    $randomTasks = [

        'Complete project',

        'Fix bugs',

        'Send report',

        'Attend meeting',

        'Check emails'
    ];

    $taskModel->save([

        'user_id' => $userId,

        'title' => $randomTasks[array_rand($randomTasks)],

        'description' => 'Auto generated task',

        'status' => 'Pending',

        'due_date' => date('Y-m-d', strtotime('+2 days'))
    ]);
});