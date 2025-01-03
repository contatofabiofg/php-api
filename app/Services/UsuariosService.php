<?php

namespace App\Services;

use App\Models\Usuario;

class UsuariosService
{
    public function getAll(): string 
    {
        return Usuario::get();
    }
}