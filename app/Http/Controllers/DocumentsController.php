<?php

namespace App\Http\Controllers;

use App\Helpers\DocumentHelper;
use App\Models\Document;
use App\Models\Template;
use Barryvdh\DomPDF\Facade\Pdf;
use GuzzleHttp\Utils;
use Illuminate\Http\Request;

class DocumentsController extends Controller
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
