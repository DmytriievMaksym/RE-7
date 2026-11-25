<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\App;

class Nomination extends Model
{
    protected $table = 'nominations';
    protected $primaryKey = 'key';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = ['key'];

    public function translations(): HasMany{
        return $this->hasMany(NominationTranslation::class, 'nomination', 'key');
    }

    public function translate(): ?NominationTranslation
    {
        $locale = App::getLocale();
        $fallback = config('app.fallback_locale', 'uk');

        return $this->translations->firstWhere('locale', $locale)
            ?? $this->translations->firstWhere('locale', $fallback);
    }

    public function getNameAttribute(): string
    {
        return $this->translate()?->name;
    }

    public function getDescriptionAttribute(): string
    {
        return $this->translate()?->description;
    }

    public function models(): BelongsToMany{
        return $this->belongsToMany(ScaleModel::class, 'model_nomination', 'nomination', 'model_id');
    }
}
