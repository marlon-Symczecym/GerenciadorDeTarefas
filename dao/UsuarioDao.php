<?php

namespace dao;

include '../interfaces/UsuarioDaoInterface.php';

use PDO;
use models\Usuario;
use interfaces\UsuarioDaoInterface;

class UsuarioDao implements UsuarioDaoInterface
{
    private PDO $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    public function login(Usuario $user)
    {
        $query = 'SELECT * FROM `tb.users` WHERE name = :name';

        $sql = $this->pdo->prepare($query);
        $sql->bindValue(':name', $user->getName());
        $sql->execute();

        if($sql->rowCount() > 0) {
            $data = $sql->fetch();

            if(password_verify($user->getPassword(), $data['password'])) {
                $_SESSION['login'] = true;
                $_SESSION['user_id'] = $data['user_id'];
                $_SESSION['name'] = $data['name'];
                header('Location: index.php');
                exit;
            } else {
                header('Location: login.php');
                exit;
            }
        } else {
            header('Location: login.php');
            exit;
        }
    }

    public function register(Usuario $newUsuario, $password_confirmation)
    {
        if($newUsuario->getPassword() === $password_confirmation) {
            $query = 'INSERT INTO `tb.users` (name, password) VALUES (:name, :password)';
            $sql = $this->pdo->prepare($query);
            $sql->bindValue(':name', $newUsuario->getName());
            $sql->bindValue(':password', $newUsuario->getPassword());
            $sql->execute();
        } else {
            header('Location: register.php');
            exit;
        }

        header('Location: login.php');
        exit;
    }

    public function findId($id)
    {
        $query = 'SELECT * FROM `tb.users` WHERE user_id = :id';
        $sql = $this->pdo->prepare($query);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $user = $sql->fetch();
            $u = new Usuario();
            $u->setName($user['name']);

            return $u;
        }
    }

    public function update(Usuario $user, $password_confirmation = null)
    {
        if($password_confirmation != null) {
            if($user->getPassword() === $password_confirmation) {

                $query = 'UPDATE `tb.users` SET name = :name, password = :password WHERE user_id = :id';
                $sql = $this->pdo->prepare($query);
                $sql->bindValue(':id', $user->getId());
                $sql->bindValue(':name', $user->getName());
                $sql->bindValue(':password', $user->getPassword());

                if ($sql->execute()) {
                    $_SESSION['name'] = $user->getName();
                }
            }
        } else {

            $query = 'UPDATE `tb.users` SET name = :name WHERE user_id = :id';
            $sql = $this->pdo->prepare($query);
            $sql->bindValue(':id', $user->getId());
            $sql->bindValue(':name', $user->getName());

            if ($sql->execute()) {
                $_SESSION['name'] = $user->getName();
            }
        }

        header('Location: index.php');
        exit;
    }
}