<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function author(): BelongsTo{
        return $this->belongsTo(Author::class,'author_id','id');
    }
}
