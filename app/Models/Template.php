<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $guarded = [];

    /**
     *  Получает списка шаблонов
     *
     * @return mixed
     */
    public static function getAllTemplates(): Collection
    {
        return self::select(['id', 'name', 'view_path'])->get();
    }

    /**
     * Получает шаблона для документа
     *
     * @param $id
     * @return mixed
     */
    public static function getTemplateOrFail($id)
    {
        $doc = self::findOrFail($id);
        abort_if(!$doc->view_path, '404');
        return $doc;
    }
}
