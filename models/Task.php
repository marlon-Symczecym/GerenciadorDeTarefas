<?php


namespace models;


class Task
{
    private int $id;
    private int $user_id;
    private string $task;
    private int $check;

    public function getId() {
        return $this->id;
    }

    public function setId($newId) {
        $this->id = $newId;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function setUserId($newUserId) {
        $this->user_id = $newUserId;
    }

    public function getTask() {
        return $this->task;
    }

    public function setTask($newTask) {
        $this->task = $newTask;
    }

    public function getCheck() {
        return $this->check;
    }

    public function setCheck($newCheck) {
        $this->check = $newCheck;
    }
}