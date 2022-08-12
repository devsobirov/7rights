<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    protected $guarded = [];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function template(): BelongsTo
    {
        return $this->belongsTo(Template::class, 'template_id');
    }

    public function scopeFilter($query)
    {
        $template_id = request()->template_id;
        $created_at = request()->created_at;

        $query->when(!empty($template), function ($query) use ($template_id) {
           $query->where('template_id', $template_id);
        });

        $query->when(!empty($created_at), function ($query) use ($created_at) {
           $day_month_year = explode($created_at, '-');

           $query->whereDate('created_at', $day_month_year[0])
               ->whereMonth('created_at', $day_month_year[1])
               ->whereYear('created_at', $day_month_year[2]);
        });
    }
}
