<?php

/**
 * Model: Seller
 * Date: 2013-10-31 10:07
 *
 */
class Seller extends AbstractModel
{

    /**
     * Table name (without prefix)
     */
    protected $table = 'seller';

    /**
     * Primary key
     */
    protected $primaryKey = 'seller_id';

    /**
     * Three listed attributes won't be mass-assignable
     */
    protected $guarded = array();

    /**
     * Validation
     */
    public $rules = array(
        'seller_name' => 'required',
        'seller_address' => '',
        'seller_note' => '',
        'paid_total' => '',
        'debt_total' => '',
		'debt_other_total' => '',
		
    );

    /**
     * Contructor to define search and sort fields
     */
    public function __construct($array = array())
    {
        parent::__construct($array);
        $this->tbl = $this->prefix . $this->table;

        /* Define fields to search */
        $this->searchFields = array(
            'seller_id' => "{$this->tbl}.seller_id = '{{param}}'",
            'paid_total' => "{$this->tbl}.paid_total = '{{param}}'",
            'debt_total' => "{$this->tbl}.debt_total = '{{param}}'",
            'seller_name' => "{$this->tbl}.seller_name LIKE '%{{param}}%'",
            'seller_address' => "{$this->tbl}.seller_address LIKE '%{{param}}%'",
            'seller_note' => "{$this->tbl}.seller_note LIKE '%{{param}}%'",
            'created_at' => "{$this->tbl}.created_at LIKE '%{{param}}%'",
            'updated_at' => "{$this->tbl}.updated_at LIKE '%{{param}}%'",
        );

        /* Define fields to sort */
        $this->sortFields = array(
            'seller_id_Sort' => "{$this->table}.seller_id",
            'seller_name_Sort' => "{$this->table}.seller_name",
            'seller_address_Sort' => "{$this->table}.seller_address",
            'seller_note_Sort' => "{$this->table}.seller_note",
            'paid_total_Sort' => "{$this->table}.paid_total",
            'debt_total_Sort' => "{$this->table}.debt_total",
            'created_at_Sort' => "{$this->table}.created_at",
            'updated_at_Sort' => "{$this->table}.updated_at",
        );
    }

    /**
     * Query get all data in table tbl_seller
     * @param array $params
     * @return object
     */
    public function getAll($params)
    {
        $_select = DB::table($this->table);
        $select = $this->createSQL($_select, $params);
        $select->orderBy('seller_id', 'desc');
        return $select->paginate($this->perPage);
    }

}

