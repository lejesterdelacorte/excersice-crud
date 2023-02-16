<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rol;

class Usuario extends Model
{
    use HasFactory;
    
    protected $table = "usuarios";
    public $timestamps = false;
    protected $fillable = [
        "ID", 
        "NOMBRE",
        "EDAD",
        "SEXO",
        "ROLID"];
    protected $primaryKey = "ID";
    public function rol() {
        return $this->hasOne(Rol::class, 'ROLID', 'ROLID');
    }
}
