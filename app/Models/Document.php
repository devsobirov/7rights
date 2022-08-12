<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $guarded = [];

    /**
     *  Получает списка шаблонов
     *
     * @return mixed
     */
    public static function getAllDocuments(): Collection
    {
        return self::select(['id', 'name', 'template'])->get();
    }

    /**
     * Получает шаблона для документа
     *
     * @param $id
     * @return mixed
     */
    public static function getDocumentTplOrFail($id)
    {
        $doc = self::findOrFail($id);
        abort_if(!$doc->template, '404');
        return $doc;
    }
}
