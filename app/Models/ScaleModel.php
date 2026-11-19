<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ScaleModel extends Model
{
    protected $table = 'models';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = ['name','scale','author_id'];

    public function nominations(): BelongsToMany{
        return $this->belongsToMany(
            Nomination::class,
            'model_nomination',
            'model_id',
            'nomination',
        );
    }
}
