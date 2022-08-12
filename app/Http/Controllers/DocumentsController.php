<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseDocumentController as BaseController;
use App\Models\Document;
use App\Models\Template;
use GuzzleHttp\Utils;
use Illuminate\Http\Request;

class DocumentsController extends BaseController
{
    public function index()
    {
        $templates = Template::getAllTemplates();
        return view('docs.list',['list'=> $templates ]);
    }

    public function create($id)
    {
        $template = Template::getTemplateOrFail($id);
        return view($template->view_path, ['doc' => $template, 'doc_id' => $id]);
    }

    public function open(Request $request)
    {
        $data = $request->post();
        $template = Template::getTemplateOrFail($data['doc_id']);

        $pdf = $this->generatePdf($template->view_path, $data);
        //$pdf->save(storage_path().'_doc.pdf');

        return $pdf->stream('my.pdf');//,array('Attachment'=>0))->header('Content-Type','application/pdf');

    }

    public function save(Request $request)
    {
        $decodedData = Utils::jsonEncode($request->except('_token'));

        $document = Document::create([
            'template_id' => $request->post('doc_id'),
            'user_id' => auth()->id(),
            'data' => $decodedData
        ]);

        if ($document) {
            return response()->json(['data' => $document], 201, [
                'Content-Type' => 'application/json'
            ]);
        }
        return response()->json(['data' => 'Error occurred'], 500);
    }
}
