<?php 


/**
 * Controller: SellerInvoice
 * Date: 2013-10-31 10:07
 * 
 */
class SellerInvoiceController extends BaseController
{

    /**
     * Contructor
     */
    public function __construct(SellerInvoice $sellerInvoice)
    {
        $this->_model = $sellerInvoice;
    }

   /**
    * Function show all tbl_seller_invoice
    * @return list tbl_seller_invoice
    */
    public function index()
    {
        $viewData = array(
            'title'    => MyLang::out('List Seller Invoice'),
            'params'   => $this->getAllInput(),
            'keywords' => Input::get('kw',''),
            'results'  => $this->_model->getAll(Input::all())
        );
        
        return View::make('seller-invoice.index', $viewData);
    }

   /**
    * Function show all tbl_seller_invoice
    * @return list tbl_seller_invoice
    */
    public function productReturn()
    {
        $viewData = array(
            'title'    => MyLang::out('List Seller Invoice Return'),
            'params'   => $this->getAllInput(),
            'keywords' => Input::get('kw',''),
            'results'  => $this->_model->getAllReturn(Input::all())
        );
        
        return View::make('seller-invoice.return', $viewData);
    }
	
   /**
    * Add record tbl_seller_invoice.
    * @return view template
    */  
    public function create()
    {
        $viewData = array(
            'title' => MyLang::out('Create Seller Invoice')
        );
        
        return View::make('seller-invoice.create', $viewData);
    }

   /**
    * Add record tbl_seller_invoice.
    * @param array $postData
    *
    * @return Redirect to add page again and show message success or errors
    */
    public function store()
    {
        $input = $this->getAllInput();
		$input['profits'] = $input['selling_price'] - $input['cost_price'];			
        $valid = Validator::make($input, $this->_model->rules);

        if ($valid->passes())
        {
			/*Calculate data*/
			$debtToday = $input['quality'] * $input['selling_price'];
			$input['debt_total'] += $debtToday - $input['payment'];
			
			/*Image*/
			if(Input::hasFile('image')) {
				$input['image'] = time() . '_' . Input::file('image')->getClientOriginalName();
				$path = base_path() . '/assets/products';
				Input::file('image')->move($path . '/large', $input['image']);
				
				$image = new Image($path . '/large/' . $input['image']);
				$image->resize(150,150);
				$image->save($input['image'], $path . '/small');
			}
			
			$input['created_at'] = strtotime($input['created_at']);
            $this->_model->create($input);
			
			/* Update debt_total on selller */
			$seller = Seller::find($input['seller_id']);
            $seller->update(array(
				'paid_total' => $seller->paid_total + $input['payment'],
				'debt_total' => $input['debt_total'])				
			);
			
            Notification::success(MyLang::out('Saved at ').date('d-m'));
            return Redirect::route('seller-invoice.create');
        }

        return Redirect::route('seller-invoice.create')
                               ->withErrors($valid->errors())
                               ->withInput();
    }

}