<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'estimated_age',
        'date_of_birth'
    ];

    protected $casts = [
        'estimated_age' => 'integer',
        'date_of_birth' => 'date'
    ];

    public function save(array $options = [])
    {
        if (is_null($this->estimated_age) && is_null($this->date_of_birth)) {
            throw new \Exception('Both estimated_age and date_of_birth cannot be null at the same time.');
        }

        // Llamar al método save original del modelo
        return parent::save($options);
    }


}
