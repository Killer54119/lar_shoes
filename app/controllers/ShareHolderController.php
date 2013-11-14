<?php 


/**
 * Controller: ShareHolder
 * Date: 2013-10-31 10:07
 * 
 */
class ShareHolderController extends BaseController
{

    /**
     * Contructor
     */
    public function __construct(ShareHolder $shareHolder)
    {
        $this->_model = $shareHolder;
    }

   /**
    * Function show all tbl_share_holder
    * @return list tbl_share_holder
    */
    public function index()
    {
        $viewData = array(
            'title'    => MyLang::out('List Share Holder'),
            'params'   => $this->getAllInput(),
            'keywords' => Input::get('kw',''),
            'results'  => $this->_model->getAll(Input::all())
        );
        
        return View::make('share-holder.index', $viewData);
    }

   /**
    * Add record tbl_share_holder.
    * @return view template
    */  
    public function create()
    {
        $viewData = array(
            'title' => MyLang::out('Create Share Holder')
        );
        
        return View::make('share-holder.create', $viewData);
    }

   /**
    * Add record tbl_share_holder.
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
            Notification::success('The share-holder was created.');
            return Redirect::route('share-holder.create');
        }

        return Redirect::route('share-holder.create')
                               ->withErrors($valid->errors())
                               ->withInput();
    }

   /**
    * Action to show edit page tbl_share_holder.
    * @param int $id
    * @return
    */
    public function edit($id)
    {
        $viewData = array(
            'title' => MyLang::out('Edit Share Holder'),
            'results' => $this->_model->findOrFail($id)
        );

        return View::make('share-holder.edit', $viewData);
    }

   /**
    * Action to update record (tbl_share_holder) in db
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
            Notification::success('The share-holder was updated.');
            return Redirect::route('share-holder.edit', $id);
        }

        return Redirect::route('share-holder.edit', $id)
                               ->withErrors($valid->errors())
                               ->withInput();
    }

   /**
    * Action to delete 1 record (tbl_share_holder) in db
    * @param int $id
    *
    * @return Redirect to index page
    */
    public function destroy($id)
    {
        $this->_model->find($id)->delete();
        Notification::success('The share-holder was deleted.');

        return Redirect::route('share-holder.index');
    }
}