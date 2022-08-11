<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MainModel;
use PDF;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return $this->docs();
    }

    public function docs(){
        $doc = MainModel::getAllTpl();
        return view('docs.list',['list'=>$doc]);
    }
    // сохранение документа
    public function saveDoc(){
       $r = rand(1,2);
       return $r==1 ? true : false; 
    }
    // Создание нового документа
    public function new($id){
        $doc = MainModel::getDocumentTpl($id);
		//dd(\DB::table('docs')->get());
        if (!$doc->form_template){
            abort(404);
        }
        return view($doc->form_template, ['doc'=>$doc, 'doc_id'=>$id]);
    }
    // отдать на загрузку.
    public function convertDoc(Request $request){

        if ($request->isMethod('post')) {
            $input = $request->all();
            $doc = MainModel::getDocumentTpl($input['doc_id']);
            if (!$doc->form_template){
                abort(404);
            }
            /*
            echo '<pre>';
            print_r($input);
            exit();
         */
            $input['sch_date'] = $this->date2text($input['sch_date']);
            $input['sch_corrects_date'] = isset($input['sch_corrects_date']) ? $this->date2text($input['sch_corrects_date']) : '';
            $input['sch_expired'] = $this->date2text((isset($input['sch_expired']) ? $input['sch_expired'] : ''));
            $sum = 0;

            // Закладка. Убрать
            if (isset($input['table'])){
                foreach ($input['table'] as $t){
                    if (isset($t['gruzCount'])){
                        $sum = $sum+$t['gruzCount'] * $t['gruzPrice'];
                    }
                }
                $input['sum_text'] = $this->num2str($sum);
            }
            
            $input['nds_perc'] = isset($input['nds']) ? $input['nds'] : 0;
            $input['gruzSum'] = $sum;
            $d_a = explode('.',$doc->form_template);
            //$d_a[1] = 'test2';
            
            
            // PDF
            $pdf = !isset($input['orientation_horizontal']) ? PDF::loadView('blanks.'.$d_a[1], $input) : PDF::loadView('blanks.'.$d_a[1], $input,[],['format'=>'A4-L', 'display_mode'=>'fullpage', 'orientation' => 'L']);
         
            $pdf->save(storage_path().'_doc.pdf');

         
            return $pdf->stream('my.pdf');//,array('Attachment'=>0))->header('Content-Type','application/pdf');
        }
    }

    // суммы прописью
    public function num2str($num)
    {
        $nul = 'ноль';
        $ten = array(
            array('', 'Один', 'Два', 'Три', 'Четыре', 'Пять', 'Шесть', 'Семь', 'Восемь', 'Девять'),
            array('', 'Одна', 'Две', 'Три', 'Четыре', 'Пять', 'Шесть', 'Семь', 'Восемь', 'Девять')
        );
        $a20 = array('Десять', 'Одиннадцать', 'Двенадцать', 'Тринадцать', 'Четырнадцать', 'Пятнадцать', 'Шестнадцать', 'Семнадцать', 'Восемнадцать', 'Девятнадцать');
        $tens = array(2 => 'Двадцать', 'Тридцать', 'Сорок', 'Пятьдесят', 'Шестьдесят', 'Семьдесят', 'Восемьдесят', 'Девяносто');
        $hundred = array('', 'Сто', 'Двести', 'Триста', 'Четыреста', 'Пятьсот', 'Шестьсот', 'Семьсот', 'Восемьсот', 'Девятьсот');
        $unit = array(
            array('копейка' , 'копейки',   'копеек',     1),
            array('рубль',    'рубля',     'рублей',     0),
            array('тысяча',   'тысячи',    'тысяч',      1),
            array('миллион',  'миллиона',  'миллионов',  0),
            array('миллиард', 'миллиарда', 'миллиардов', 0),
        );
     
        list($rub, $kop) = explode('.', sprintf("%015.2f", floatval($num)));
        $out = array();
        if (intval($rub) > 0) {
            foreach (str_split($rub, 3) as $uk => $v) {
                if (!intval($v)) continue;
                $uk = sizeof($unit) - $uk - 1;
                $gender = $unit[$uk][3];
                list($i1, $i2, $i3) = array_map('intval', str_split($v, 1));
                // mega-logic
                $out[] = $hundred[$i1]; // 1xx-9xx
                if ($i2 > 1) $out[] = $tens[$i2] . ' ' . $ten[$gender][$i3]; // 20-99
                else $out[] = $i2 > 0 ? $a20[$i3] : $ten[$gender][$i3]; // 10-19 | 1-9
                // units without rub & kop
                if ($uk > 1) $out[] = $this->morph($v, $unit[$uk][0], $unit[$uk][1], $unit[$uk][2]);
            }
        } else {
            $out[] = $nul;
        }
        $out[] = $this->morph(intval($rub), $unit[1][0], $unit[1][1], $unit[1][2]); // rub
        $out[] = $kop . ' ' . $this->morph($kop, $unit[0][0], $unit[0][1], $unit[0][2]); // kop
        return trim(preg_replace('/ {2,}/', ' ', join(' ', $out)));
    }
 

    public function morph($n, $f1, $f2, $f5) 
    {
        $n = abs(intval($n)) % 100;
        if ($n > 10 && $n < 20) return $f5;
        $n = $n % 10;
        if ($n > 1 && $n < 5) return $f2;
        if ($n == 1) return $f1;
        return $f5;
    }

    public function date2text($date){
        $date = !$date ? date("d.n.y",time()) : date("d.n.Y", strtotime($date));
        $date = explode('.',$date);
        $months = array('нулября', 'января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря');
        return $date[0] . ' ' . $months[$date[1]] . ' ' . $date[2] . ' г.';
    }
}
