<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NominationTranslation extends Model
{
    protected $table = 'nomination_translations';
    public $timestamps = false;
    protected $keyType = 'string';
    protected $fillable = [
        'nomination',
        'locale',
        'name',
        'description',
    ];

    public function nomination(): BelongsTo
    {
        return $this->belongsTo(Nomination::class, 'key', 'nomination');
    }
}
