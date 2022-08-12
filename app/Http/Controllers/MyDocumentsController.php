<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Http\Controllers\BaseDocumentController as BaseController;
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

    public function print(Document $document)
    {
        abort_if($document->user_id != auth()->id(), 403);
        $pdf = $this->generatePdf($document->template->view_path, $document->data);

        return $pdf->stream('my_pdf.pdf');
    }

    public function download(Document $document)
    {
        abort_if($document->user_id != auth()->id(), 403);
        $pdf = $this->generatePdf($document->template->view_path, $document->data);

        return $pdf->download('my_pdf.pdf');
    }
}
