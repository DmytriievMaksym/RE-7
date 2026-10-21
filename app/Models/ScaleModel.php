<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScaleModel extends Model
{
    protected $table = 'models';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = ['name','scale','categories','author_id'];

    protected function casts():array{
        return ['categories' => 'array'];
    }

    //Щоб категорії кодувалися кирилицею замість юнікоду
    protected function setCategoriesAttribute($value): void
    {
        $this->attributes['categories'] = json_encode(
            $value,
            JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
        );
    }
}
