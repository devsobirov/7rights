<?php


namespace App\Services;

use App\Services\Torg12PDF;
use App\Helpers\DocumentHelper;
use PhpParser\Comment\Doc;

class Torg12PDFService
{
    /**
     * Данные документа полученные из формы
     * или сохраненные в БД
     *
     * @var null|array $inputData
     */
    public $inputData;
    public $pdf;
    public $helper;

    const OUTPUT_AS_STREAM = 'I';
    const OUTPUT_AS_DOWNLOAD = 'D';

    const DEFAULT_OKEI_CODE = 796;
    const DEFAULT_OKEI_TITLE = 'шт';

    public function __construct(array $data)
    {
        $this->inputData = $data;
    }

    public function preparePdf(): self
    {
        $this->pdf = new Torg12PDF();
        $this->helper = new DocumentHelper();

        $this->setBaseData();
        $this->setOrganisationEntities();
        $this->setClientEntity();


        $this->setNdsEntities();
        $this->pdf->AddProducts($this->getProductsData());

        return $this;
    }

    public function stream($filename = '')
    {
        return $this->pdf->OutputPDF(self::OUTPUT_AS_STREAM);
    }

    public function download($filename = '')
    {
        return $this->pdf->OutputPDF(self::OUTPUT_AS_DOWNLOAD);
    }

    protected function setBaseData(): void
    {
        $sch_number = $this->inputData['sch_number'];
        $sch_date = $this->helper->dateToText($this->inputData['sch_date']);
        $okpo = get_if_key_exists($this->inputData, 'sch_okpo');

        $this->pdf->SetTitlePDF($sch_number.'_torg12'); // Название документа
        $this->pdf->SetOkpoEntity($okpo); // ОКПО
        $this->pdf->SetBaseValue(get_if_key_exists($this->inputData, 'sch_nazn')); // Основание

        $this->pdf->SetInvoiceNumber($sch_number);
        $this->pdf->SetInvoiceDate($sch_date);
    }

    protected function setOrganisationEntities()
    {

        $full_entity = get_if_key_exists($this->inputData, 'sch_name');
        $phone =get_if_key_exists($this->inputData, 'sch_phones');
        $address = get_if_key_exists($this->inputData, 'sch_adress');
        $inn = get_if_key_exists($this->inputData, 'sch_inn');
        $kpp = get_if_key_exists($this->inputData, 'sch_kpp');
        $fax = get_if_key_exists($this->inputData, 'sch_fax');

        // Bank requisites
        $r_schet = get_if_key_exists($this->inputData, 'sch_bankrasch');
        $bank_name = get_if_key_exists($this->inputData, 'sch_bankname');
        $bank_address = get_if_key_exists($this->inputData, 'sch_bankplace');
        $c_schet = get_if_key_exists($this->inputData, 'sch_bankkorr');
        $bik = get_if_key_exists($this->inputData, 'sch_bik');

        $director_fio = get_if_key_exists($this->inputData, 'sch_ruk');
        $accountant_fio = get_if_key_exists($this->inputData, 'sch_buh');

        $this->pdf->setFioEntity($director_fio, $accountant_fio);
        $this->pdf->SetPositionEntity('Директор');

        if ($address) $full_entity .= ', '. $address;
        if ($inn) $full_entity .= ', ИНН '. $inn;
        if ($kpp) $full_entity .= ', КПП ' . $kpp;
        if ($phone) $full_entity .= ', тел '. $phone;
        if ($fax) $full_entity .= ', факс '. $fax;

        if ($r_schet) $full_entity .= ' р/с  ' . $r_schet;
        if ($bank_name) $full_entity .= ' в ' . $bank_name;
        if ($bank_address) $full_entity .= ', ' . $bank_address;
        if ($bik) $full_entity .= ', БИК ' . $bik;
        if ($c_schet) $full_entity .= ', корр/с ' . $c_schet;

        $this->pdf->SetEntity($full_entity);
    }

    protected function setClientEntity()
    {
        $payer_entity = get_if_key_exists($this->inputData, 'sch_pokname');
        $phone =get_if_key_exists($this->inputData, 'sch_pokphones');
        $address = get_if_key_exists($this->inputData, 'sch_pokadress');
        $inn = get_if_key_exists($this->inputData, 'sch_pokinn');
        $kpp = get_if_key_exists($this->inputData, 'sch_pokkpp');

        if ($address) $payer_entity .= ', '. $address;
        if ($inn) $payer_entity .= ', ИНН '. $inn;
        if ($kpp) $payer_entity .= ', КПП ' . $kpp;
        if ($phone) $payer_entity .= ', тел '. $phone;

        $this->pdf->setPayer($payer_entity);
        $hasConsignee = !empty($this->inputData['gridRadiosGruzPol']);
        $this->pdf->SetConsignee($hasConsignee ? $this->getConsigneeEntity() : $payer_entity);
    }

    private function getConsigneeEntity(): string
    {
        $consignee_entity = get_if_key_exists($this->inputData, 'sch_gruzpolname');
        $phone =get_if_key_exists($this->inputData, 'sch_gruzpolphones');
        $address = get_if_key_exists($this->inputData, 'sch_gruzpoladress');
        $inn = get_if_key_exists($this->inputData, 'sch_gruzpolinn');
        $kpp = get_if_key_exists($this->inputData, 'sch_gruzpolkpp');

        if ($address) $consignee_entity .= ', '. $address;
        if ($inn) $consignee_entity .= ', ИНН '. $inn;
        if ($kpp) $consignee_entity .= ', КПП ' . $kpp;
        if ($phone) $consignee_entity .= ', тел '. $phone;

        return $consignee_entity;
    }


    protected function setNdsEntities(): void
    {
        $nds_calc = get_if_key_exists($this->inputData, 'nds_calc');
        $nds = get_if_key_exists($this->inputData, 'nds');
        if (in_array($nds_calc, $this->helper->getNdsCalcTypes()) && !empty($nds)) {

            $this->pdf->setNdsValues($nds, $nds_calc);
        }

    }

    protected function getProductsData(): array
    {
        $products = [];
        $tableData = get_if_key_exists($this->inputData, 'table');

        if (is_array($tableData) && count($tableData)) {
            foreach ($tableData as $product) {

                $unit = get_if_key_exists($product, 'edIzm', self::DEFAULT_OKEI_TITLE);
                $okei_code = get_if_key_exists($this->helper::OKEI_TYPES, $unit, self::DEFAULT_OKEI_CODE);

                $products[] = [
                    'name' => get_if_key_exists($product, 'gruzName'),
                    'count' => (integer) get_if_key_exists($product, 'gruzCount'),
                    'price' => (integer) get_if_key_exists($product, 'gruzPrice'),
                    'unit' => $unit,
                    'okei_code' => $okei_code,
                    'package_type' => get_if_key_exists($product, 'package_type'),
                    'package_v_odnom_m' => get_if_key_exists($product, 'package_v_odnom_m'),
                    'package_m_sht' => get_if_key_exists($product, 'package_m_sht'),
                    'brutto' => get_if_key_exists($product, 'brutto'),
//                    'netto' => get_if_key_exists($product, 'netto'),
                ];
            }
        }
        return $products;
    }

}
