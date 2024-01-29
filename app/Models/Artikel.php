<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;


/**
 * Artikel Model.
 *
 * @property-read int           $id             The unique identifier of the artikel.
 * @property string             $artikel_code   The artikel code
 * @property Carbon             $created_at     Timestamp when the artikel was created.
 * @property Carbon             $updated_at     Timestamp when the artikel was last updated.
 */
class Artikel extends Model
{
    use HasFactory;

    protected $table = 'artikel';

    protected $casts = [
        'created_at' => 'datetime', // Casts 'created_at' to a datetime object
        'updated_at' => 'datetime', // Casts 'updated_at' to a datetime object
    ];

    protected $fillable = [
        'artikel_code'
    ];

    public function batches(): hasMany
    {
        return $this->hasMany(Batch::class);
    }
}
