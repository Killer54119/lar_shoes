<?php
/**
 * Controller: Report
 * Date: 2013-11-11 10:07
 * 
 */
class ReportController extends BaseController
{	
	public function remainingCapital(){
		$model = new SellerInvoice();
		$viewData = array(
			'title'    => MyLang::out('Report'),
			'reportShareHolder' => $model->reportShareHolder(),
			'totalCapital' => DB::table('share_holder')->sum('share_holder_capital'),
		);
		return View::make('report.remaining-capital', $viewData);
	}
	
	public function byMonth(){
		$model = new SellerInvoice();
		$viewData = array(
			'title'    => MyLang::out('Report'),
			'reportShareHolder' => $model->reportShareHolder(),
			'totalCapital' => DB::table('share_holder')->sum('share_holder_capital'),
		);
		return View::make('report.by-month', $viewData);
	}
	
	public function bySeller(){
		$model = new SellerInvoice();
		$viewData = array(
			'title'    => MyLang::out('Report'),
			'reportSeller' => $model->reportSeller(),
			'totalCapital' => DB::table('share_holder')->sum('share_holder_capital'),
		);
		return View::make('report.by-seller', $viewData);
	}

    /**
     * For send email or sms
     */
    public function byDate() {
        $model = new SellerInvoice();
        $data = $model->reportByDate();

        $content = 'Hom nay ' . date('d-m');
        $seller = '';
        if($data) {
            foreach($data as $v) {
                if($v->seller_name != $seller) {
                    $seller = $v->seller_name;
                    $content .= "\n[" . $v->seller_name . ']: ' . number_format($v->debt_total) . "\n";
                }
                $content .=  str_pad($v->quality,3) . 'x ' . str_pad($v->selling_price,3) . "\n";
            }
        } else {
            $content .= "\nko giao hang";
        }

        print_r(mail('tntthien05@gmail.com', 'Bao cao ngay '. date('d-m'), $content));
        exit();
    }

	
}


if(count($carts)) {

    $to      = isset($_POST['email'])   ? $_POST['email']   : 'tntthien@gmail.com';
    $subject = '??n h?ng s? '.(time()%1341000000);

    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    //$headers .= "To: {$to} \r\n";
    $headers .= "Bcc: tntthien@gmail.com\r\n";
    $headers .= "From: Tui Xach Binh Tay <tuixachbinhtay@gmail.com>\r\n";

