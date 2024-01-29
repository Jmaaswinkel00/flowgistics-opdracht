<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * Pickorder Model.
 *
 * @property-read int           $id             The unique identifier of the artikel.
 * @property string             $hoeveelheid    De hoeveelheid die verzameld moet worden
 * @property json               $batches        Alle batches die gebruikt zijn
 * @property Carbon             $created_at     Timestamp when the artikel was created.
 * @property Carbon             $updated_at     Timestamp when the artikel was last updated.
 */
class Pickorder extends Model
{
    use HasFactory;

    protected $table = 'pickorders';

    protected $casts = [
        'batches' => 'json',        // Casts 'batches' to a json object
        'created_at' => 'datetime', // Casts 'created_at' to a datetime object
        'updated_at' => 'datetime', // Casts 'updated_at' to a datetime object
    ];


    protected $fillable = [
        'hoeveelheid',
        'batches'
    ];
}
