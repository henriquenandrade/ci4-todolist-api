<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Todo;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class TodoController extends BaseController
{
    use ResponseTrait;

    /**
     * Instance of Todo Model
     *
     * @var Todo
     */
    private Todo $todo;

    public function __construct()
    {
        $this->todo = model(Todo::class);
    }

    /**
     * List Todos
     *
     * @return ResponseInterface
     */
    public function index(): ResponseInterface
    {
        $todos = $this->todo->findAll();

        return $this
            ->setResponseFormat("json")
            ->respond($todos, 200);
    }

    /**
     * Get Todo
     *
     * @param integer $id
     * @return ResponseInterface
     */
    public function show(int $id): ResponseInterface
    {
        $todo = $this->todo->find($id);

        return $this
            ->setResponseFormat("json")
            ->respond($todo, 200);
    }

    /**
     * Create new Todo
     *
     * @return ResponseInterface
     */
    public function create(): ResponseInterface
    {
        if($this->todo->save($this->request->getJSON())) {
            $todo = $this->todo->find($this->todo->insertID());
            return $this
                ->setResponseFormat("json")
                ->respondCreated($todo, 'Success Todo created');
        }

        return $this
            ->setResponseFormat("json")
            ->failValidationErrors($this->todo->errors());
    }

    /**
     * Update Todo
     *
     * @param integer $id
     * @return ResponseInterface
     */
    public function update(int $id): ResponseInterface
    {
        if($this->todo->update($id, [
            "name" => $this->request->getVar('name'),
            "done" => $this->request->getVar('done')
        ])) {
            $todo = $this->todo->find($id);
            return $this
                ->setResponseFormat("json")
                ->respondUpdated($todo, 'Update Todo created');
        }

        return $this
            ->setResponseFormat("json")
            ->failValidationErrors($this->todo->errors());
    }

    /**
     * Delete Todo
     *
     * @param integer $id
     * @return ResponseInterface
     */
    public function delete(int $id): ResponseInterface
    {
        if($this->todo->delete($id)) {
            return $this
                ->setResponseFormat("json")
                ->respondDeleted($this->todo->findAll(), 'Success Todo deleted');
        }

        return $this
            ->setResponseFormat("json")
            ->failNotFound('Todo Not Found!');
    }
}
