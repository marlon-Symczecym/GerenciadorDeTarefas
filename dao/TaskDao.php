<?php


namespace dao;
include '../interfaces/TaskDaoInterface.php';

use interfaces\TaskDaoInterface;
use models\Task;
use PDO;

class TaskDao implements TaskDaoInterface
{

    private PDO $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    public function findId($id)
    {
        $query = 'SELECT * FROM `tb.tasks` WHERE id = :id';
        $sql = $this->pdo->prepare($query);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0) {

            $data = $sql->fetch();

            $t = new Task();
            $t->setTask($data['task']);
            $t->setId($data['id']);
            $t->setCheck($data['check']);

            return $t;
        }

        header('Location: index.php');
        exit;
    }

    public function create(Task $newTask)
    {
        if(strlen($newTask->getTask()) > 0) {
            $query = 'INSERT INTO `tb.tasks` (task, user_id) VALUES (:task, :user_id)';
            $sql = $this->pdo->prepare($query);
            $sql->bindValue(':task', $newTask->getTask());
            $sql->bindValue(':user_id', $newTask->getUserId());
            $sql->execute();
        }

        header('Location: index.php');
        exit;
    }

    public function checked($id, $check)
    {
        $query = 'UPDATE `tb.tasks` SET `check` = :check WHERE id = :id';
        $sql = $this->pdo->prepare($query);
        $sql->bindValue(':check', $check == 0 ? 1: 0);
        $sql->bindValue(':id', $id);
        $sql->execute();

        header('Location: index.php');
        exit;
    }

    public function read()
    {
        $data = [];

        $query = 'SELECT * FROM `tb.tasks` WHERE user_id = :user_id ORDER BY id';
        $sql = $this->pdo->prepare($query);
        $sql->bindValue(':user_id', $_SESSION['user_id']);
        $sql->execute();

        if($sql->rowCount() > 0) {
            foreach ($sql->fetchAll() as $tasks) {
                $t = new Task();
                $t->setId($tasks['id']);
                $t->setTask($tasks['task']);
                $t->setCheck($tasks['check']);

                $data[] = $t;
            }
        }

        return $data;

    }

    public function update(Task $task)
    {
        $query = 'UPDATE `tb.tasks` SET task = :task WHERE id = :id';
        $sql = $this->pdo->prepare($query);
        $sql->bindValue(':id', $task->getId());
        $sql->bindValue(':task', $task->getTask());
        $sql->execute();

        header('Location: index.php');
        exit;
    }

    public function delete($id)
    {
        $query = 'DELETE FROM `tb.tasks` WHERE id = :id';
        $sql = $this->pdo->prepare($query);
        $sql->bindValue(':id', $id);
        $sql->execute();

        header('Location: index.php');
        exit;
    }

}