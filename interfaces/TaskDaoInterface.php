<?php


namespace interfaces;


use models\Task;

interface TaskDaoInterface
{
    public function findId($id);
    public function checked($id, $check);
    public function create(Task $newTask);
    public function read();
    public function update(Task $task);
    public function delete($id);
}