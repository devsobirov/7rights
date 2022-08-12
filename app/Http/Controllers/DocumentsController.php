<?php

namespace App\Http\Controllers;

use App\Helpers\DocumentHelper;
use App\Models\Document;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    public function index()
    {
        $doc = Document::getAllDocuments();
        return view('docs.list',['list'=>$doc]);
    }

    public function create($id)
    {
        $doc = Document::getDocumentTplOrFail($id);
        return view($doc->template, ['doc'=>$doc, 'doc_id'=>$id]);
    }

    public function open(Request $request)
    {
        $data = $request->post();
        $document = Document::getDocumentTplOrFail($data['doc_id']);

        $pdf = $this->generatePdf($document->template, $data);
        //$pdf->save(storage_path().'_doc.pdf');

        return $pdf->stream('my.pdf');//,array('Attachment'=>0))->header('Content-Type','application/pdf');

    }

    public function save(Request $request)
    {
        //return '1';
        if ($request->expectsJson()) {
            return response()->json(['data' => '1'], 200, [
                'Content-Type' => 'application/json'
            ]);
        }

        return true;
    }

    private function generatePdf($template, $input)
    {
        $helper = new DocumentHelper();

        $input['sch_date'] = $helper->dateToText($input['sch_date']);
        $input['sch_corrects_date'] = isset($input['sch_corrects_date']) ?
            $helper->dateToText($input['sch_corrects_date']) : '';
        $input['sch_expired'] = $helper->dateToText((isset($input['sch_expired']) ? $input['sch_expired'] : ''));

        $sum = 0;

        // Закладка. Убрать
        if (isset($input['table'])){
            foreach ($input['table'] as $t){
                if (isset($t['gruzCount'])){
                    $sum = $sum+$t['gruzCount'] * $t['gruzPrice'];
                }
            }
            $input['sum_text'] = $helper->numToStr($sum);
        }

        $input['nds_perc'] = isset($input['nds']) ? $input['nds'] : 0;
        $input['gruzSum'] = $sum;
        $d_a = explode('.',$template);
        //$d_a[1] = 'test2';


        // PDF
        $pdf = !isset($input['orientation_horizontal']) ?
            PDF::loadView('blanks.'.$d_a[1], $input) :
            PDF::loadView('blanks.'.$d_a[1], $input,[],['format'=>'A4-L', 'display_mode'=>'fullpage', 'orientation' => 'L']);

        return $pdf;
    }
}
