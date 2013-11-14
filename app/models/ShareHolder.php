<?php

/**
 * Model: ShareHolder
 * Date: 2013-10-31 10:07
 *
 */
class ShareHolder extends AbstractModel
{

    /**
     * Table name (without prefix)
     */
    protected $table = 'share_holder';

    /**
     * Primary key
     */
    protected $primaryKey = 'share_holder_id';

    /**
     * Three listed attributes won't be mass-assignable
     */
    protected $guarded = array();

    /**
     * Validation
     */
    public $rules = array(
        'share_holder_name' => 'required|',
        'share_holder_address' => '',
        'share_holder_note' => '',
        'share_holder_capital' => '',
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
            'share_holder_id' => "{$this->tbl}.share_holder_id = '{{param}}'",
            'share_holder_capital' => "{$this->tbl}.share_holder_capital = '{{param}}'",
            'share_holder_name' => "{$this->tbl}.share_holder_name LIKE '%{{param}}%'",
            'share_holder_address' => "{$this->tbl}.share_holder_address LIKE '%{{param}}%'",
            'share_holder_note' => "{$this->tbl}.share_holder_note LIKE '%{{param}}%'",
            'created_at' => "{$this->tbl}.created_at LIKE '%{{param}}%'",
            'updated_at' => "{$this->tbl}.updated_at LIKE '%{{param}}%'",
        );

        /* Define fields to sort */
        $this->sortFields = array(
            'share_holder_id_Sort' => "{$this->table}.share_holder_id",
            'share_holder_name_Sort' => "{$this->table}.share_holder_name",
            'share_holder_address_Sort' => "{$this->table}.share_holder_address",
            'share_holder_note_Sort' => "{$this->table}.share_holder_note",
            'share_holder_capital_Sort' => "{$this->table}.share_holder_capital",
            'created_at_Sort' => "{$this->table}.created_at",
            'updated_at_Sort' => "{$this->table}.updated_at",
        );
    }

    /**
     * Query get all data in table tbl_share_holder
     * @param array $params
     * @return object
     */
    public function getAll($params)
    {
        $_select = DB::table($this->table);
        $select = $this->createSQL($_select, $params);
        $select->orderBy('share_holder_id', 'desc');
        return $select->paginate($this->perPage);
    }

}

