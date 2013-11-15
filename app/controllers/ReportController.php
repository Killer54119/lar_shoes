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

	
}