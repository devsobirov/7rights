<?php

namespace App\Http\Controllers;

use App\Helpers\DocumentHelper;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

abstract class BaseDocumentController extends Controller
{

    protected function generatePdf($template, $input)
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
