<?php
/**
 * Controller: Seller
 * Date: 2013-10-31 10:07
 * 
 */
class SellerController extends BaseController
{

    /**
     * Contructor
     */
    public function __construct(Seller $seller)
    {
        $this->_model = $seller;
    }

   /**
    * Function show all tbl_seller
    * @return list tbl_seller
    */
    public function index()
    {
        $viewData = array(
            'title'    => MyLang::out('List Seller'),
            'params'   => $this->getAllInput(),
            'keywords' => Input::get('kw',''),
            'results'  => $this->_model->getAll(Input::all())
        );
        
        return View::make('seller.index', $viewData);
    }

   /**
    * Add record tbl_seller.
    * @return view template
    */  
    public function create()
    {
        $viewData = array(
            'title' => MyLang::out('Create Seller')
        );
        
        return View::make('seller.create', $viewData);
    }

   /**
    * Add record tbl_seller.
    * @param array $postData
    *
    * @return Redirect to add page again and show message success or errors
    */
    public function store()
    {
        $input = $this->getAllInput();
        $valid = Validator::make($input, $this->_model->rules);

        if ($valid->passes())
        {
            $this->_model->create($input);			
             Notification::success(MyLang::out('Saved at ').date('d-m'));
            return Redirect::route('seller.create');
        }

        return Redirect::route('seller.create')
                               ->withErrors($valid->errors())
                               ->withInput();
    }

   /**
    * Action to show edit page tbl_seller.
    * @param int $id
    * @return
    */
    public function edit($id)
    {
        $viewData = array(
            'title' => MyLang::out('Edit Seller'),
            'results' => $this->_model->findOrFail($id)
        );

        return View::make('seller.edit', $viewData);
    }

   /**
    * Action to update record (tbl_seller) in db
    * @param int $id
    *
    * @return Redirect to edit page again and show message success or errors
    */
    public function update($id)
    {
        $input = $this->getAllInput();
        $valid = Validator::make($input, $this->_model->rules);

        if ($valid->passes())
        {
            $row = $this->_model->find($id);
            $row->update($input);
            Notification::success(MyLang::out('Saved at ').date('d-m'));
            return Redirect::route('seller.edit', $id);
        }

        return Redirect::route('seller.edit', $id)
                               ->withErrors($valid->errors())
                               ->withInput();
    }
	
	/* Get information in field by ajax*/
    public function get()
    {
		$id  = Input::get('id', null);
		$field = Input::get('field', null);
		if($id && $field) {
			$row = $this->_model->find($id);
			echo $row->$field;
			exit();
		}
		exit('ERROR');
	}	
	
}