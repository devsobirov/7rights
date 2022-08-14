<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    protected $guarded = [];

    protected $with = ['template:id,name,view_path'];

    protected $casts = [
        'data' => 'array'
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function template(): BelongsTo
    {
        return $this->belongsTo(Template::class, 'template_id')->withDefault();
    }

    public function scopeFilter($query)
    {
        $template_id = request()->template_id;
        $created_at = request()->created_at;

        $query->when(!empty($template_id), function ($query) use ($template_id) {
           $query->where('template_id', $template_id);
        });

        $query->when(!empty($created_at), function ($query) use ($created_at) {
           $year_month_day = explode('-', $created_at);

           $query->whereDay('created_at', $year_month_day[2])
               ->whereMonth('created_at', $year_month_day[1])
               ->whereYear('created_at', $year_month_day[0]);
        });
    }

    public function dataAsArray(): array
    {
        if (is_array($this->data)) return $this->data;
        return json_decode($this->data, true);
    }

}
