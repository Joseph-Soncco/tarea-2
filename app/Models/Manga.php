<?php
namespace App\Models;

use CodeIgniter\Model;

class Manga extends Model
{
    protected $table = 'mangas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['titulo', 'descripcion', 'genero', 'imagen', 'precio', 'creado_en'];
}
