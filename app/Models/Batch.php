<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Batch Model.
 *
 * @property-read int           $id             The unique identifier of the batch.
 * @property string             $artikel_id     The artikel ID
 * @property string             $batch_code     The batch code
 * @property int                $voorraad       Voorraad van batch
 * @property Carbon             $created_at     Timestamp when the batch was created.
 * @property Carbon             $updated_at     Timestamp when the batch was last updated.
 */
class Batch extends Model
{
    use HasFactory;

    protected $table = 'batches';

    protected $casts = [
        'created_at' => 'datetime', // Casts 'created_at' to a datetime object
        'updated_at' => 'datetime', // Casts 'updated_at' to a datetime object
    ];


    protected $fillable = [
        'artikel_id',
        'batch_code',
        'voorraad'
    ];

    public function artikel(): belongsTo
    {
        return $this->belongsTo(Artikel::class);
    }
}
