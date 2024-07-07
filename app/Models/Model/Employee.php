<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_complet', 
        'email',
        'num_cni',
        'adresse',
        'date_naissance',
        'photo',
        'telephone1',
        'telephone2',
        'salaire'
    ];
}
