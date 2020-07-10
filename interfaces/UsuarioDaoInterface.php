<?php

namespace interfaces;

use \models\Usuario;

interface UsuarioDaoInterface
{
    public function login(Usuario $user);
    public function register(Usuario $newUsuario, $password_confirmation);
    public function findId($id);
    public function update(usuario $user, $password_confirmation = null);
}