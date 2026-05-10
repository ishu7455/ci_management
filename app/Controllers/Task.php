<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Task extends BaseController
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function getTasks()
    {
        $taskModel = new TaskModel();

        $tasks = $taskModel
            ->where('user_id', session()->get('id'))
            ->findAll();

        return $this->response->setJSON([
            'data' => $tasks
        ]);
    }

    public function store()
    {
        $rules = [

            'title' => 'required',

            'due_date' => 'required'
        ];

        if (!$this->validate($rules)) {

            return $this->response->setJSON([
                'status' => false,
                'errors' => $this->validator->getErrors()
            ]);
        }

        $taskModel = new TaskModel();

        $taskModel->save([

            'user_id' => session()->get('id'),

            'title' => $this->request->getPost('title'),

            'description' => $this->request->getPost('description'),

            'status' => $this->request->getPost('status'),

            'due_date' => $this->request->getPost('due_date')
        ]);

        return $this->response->setJSON([
            'status' => true
        ]);
    }

    public function edit($id)
    {
        $taskModel = new TaskModel();

        $task = $taskModel
            ->where('user_id', session()->get('id'))
            ->find($id);

        return $this->response->setJSON($task);
    }

    public function update($id)
    {
        $taskModel = new TaskModel();

        $taskModel->update($id, [

            'title' => $this->request->getPost('title'),

            'description' => $this->request->getPost('description'),

            'status' => $this->request->getPost('status'),

            'due_date' => $this->request->getPost('due_date')
        ]);

        return $this->response->setJSON([
            'status' => true
        ]);
    }

    public function delete($id)
    {
        $taskModel = new TaskModel();

        $taskModel
            ->where('user_id', session()->get('id'))
            ->delete($id);

        return $this->response->setJSON([
            'status' => true
        ]);
    }
}