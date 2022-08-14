<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Http\Controllers\BaseDocumentController as BaseController;
use App\Models\Template;
use GuzzleHttp\Utils;
use Illuminate\Http\Request;

class MyDocumentsController extends BaseController
{

    public function index()
    {
        $documents = Document::select(['id', 'template_id', 'user_id', 'created_at'])
            ->where('user_id', auth()->id())
            ->filter()
            ->orderBy('id', \request()->orderBy ? 'asc' : 'desc')
            ->paginate()->withQueryString();

        return view('docs.my-documents', compact('documents'));
    }

    public function edit(Document $document)
    {
        abort_if($document->user_id != auth()->id(), 403);
        $template = Template::getTemplateOrFail($document->template_id);

        return view($template->view_path)->with(['doc' => $template])
            ->with([ 'doc_id' => $template->id])
            ->with(['data' => $document->dataAsArray()]);
    }

    public function print(Document $document)
    {
        $pdf = $this->getPdfIfAllowed($document);

        return $pdf->stream('my_pdf.pdf');
    }

    public function download(Document $document)
    {
        $pdf = $this->getPdfIfAllowed($document);

        return $pdf->download('my_pdf.pdf');
    }

    private function getPdfIfAllowed($document)
    {
        abort_if($document->user_id != auth()->id(), 403);
        $inputData = $document->data;
        if (!is_array($inputData)) {
            $inputData = Utils::jsonDecode($inputData, true);
        }
        return $this->generatePdf($document->template->view_path, $inputData);
    }
}
