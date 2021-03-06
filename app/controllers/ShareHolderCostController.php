<?php 


/**
 * Controller: ShareHolderCost
 * Date: 2013-10-31 10:07
 * 
 */
class ShareHolderCostController extends BaseController
{

    /**
     * Contructor
     */
    public function __construct(ShareHolderCost $shareHolderCost)
    {
        $this->_model = $shareHolderCost;
    }

   /**
    * Function show all tbl_share_holder_cost
    * @return list tbl_share_holder_cost
    */
    public function index()
    {
        $viewData = array(
            'title'    => MyLang::out('List Share Holder Cost'),
            'params'   => $this->getAllInput(),
            'keywords' => Input::get('kw',''),
            'results'  => $this->_model->getAll(Input::all())
        );
        
        return View::make('share-holder-cost.index', $viewData);
    }

   /**
    * Add record tbl_share_holder_cost.
    * @return view template
    */  
    public function create()
    {
        $viewData = array(
            'title' => MyLang::out('Create Share Holder Cost')
        );
        
        return View::make('share-holder-cost.create', $viewData);
    }

   /**
    * Add record tbl_share_holder_cost.
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
            return Redirect::route('share-holder-cost.create');
        }

        return Redirect::route('share-holder-cost.create')
                               ->withErrors($valid->errors())
                               ->withInput();
    }

   /**
    * Action to show edit page tbl_share_holder_cost.
    * @param int $id
    * @return
    */
    public function edit($id)
    {
        $viewData = array(
            'title' => MyLang::out('Edit Share Holder Cost'),
            'results' => $this->_model->findOrFail($id)
        );

        return View::make('share-holder-cost.edit', $viewData);
    }

   /**
    * Action to update record (tbl_share_holder_cost) in db
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
            return Redirect::route('share-holder-cost.edit', $id);
        }

        return Redirect::route('share-holder-cost.edit', $id)
                               ->withErrors($valid->errors())
                               ->withInput();
    }

   /**
    * Action to delete 1 record (tbl_share_holder_cost) in db
    * @param int $id
    *
    * @return Redirect to index page
    */
    public function destroy($id)
    {
        $this->_model->find($id)->delete();
        Notification::success('The share-holder-cost was deleted.');

        return Redirect::route('share-holder-cost.index');
    }
}