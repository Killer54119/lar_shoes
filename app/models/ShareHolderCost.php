<?php

/**
 * Model: ShareHolderCost
 * Date: 2013-10-31 10:07
 *
 */
class ShareHolderCost extends AbstractModel
{

    /**
     * Table name (without prefix)
     */
    protected $table = 'share_holder_cost';

    /**
     * Primary key
     */
    protected $primaryKey = 'cost_id';

    /**
     * Three listed attributes won't be mass-assignable
     */
    protected $guarded = array();

    /**
     * Validation
     */
    public $rules = array(
        'cost_for' => 'required|',
        'cost' => 'required|',
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
            'cost_id' => "{$this->tbl}.cost_id = '{{param}}'",
            'cost' => "{$this->tbl}.cost = '{{param}}'",
            'cost_for' => "{$this->tbl}.cost_for LIKE '%{{param}}%'",
            'created_at' => "{$this->tbl}.created_at LIKE '%{{param}}%'",
            'updated_at' => "{$this->tbl}.updated_at LIKE '%{{param}}%'",
        );

        /* Define fields to sort */
        $this->sortFields = array(
            'cost_id_Sort' => "{$this->table}.cost_id",
            'cost_for_Sort' => "{$this->table}.cost_for",
            'cost_Sort' => "{$this->table}.cost",
            'created_at_Sort' => "{$this->table}.created_at",
            'updated_at_Sort' => "{$this->table}.updated_at",
        );
    }

    /**
     * Query get all data in table tbl_share_holder_cost
     * @param array $params
     * @return object
     */
    public function getAll($params)
    {
        $_select = DB::table($this->table);
        $select = $this->createSQL($_select, $params);
        $select->orderBy('cost_id', 'desc');
        return $select->paginate($this->perPage);
    }

}

