<?php

/**
 * Model: SellerInvoice
 * Date: 2013-10-31 10:07
 *
 */
class SellerInvoice extends AbstractModel
{

    /**
     * Table name (without prefix)
     */
    protected $table = 'seller_invoice';

    /**
     * Primary key
     */
    protected $primaryKey = 'invoice_id';

    /**
     * Three listed attributes won't be mass-assignable
     */
    protected $guarded = array();

    /**
     * Validation
     */
    public $rules = array(
        'seller_id' => 'required|integer',
        'image' => '',
        'quality' => 'integer',
        'cost_price' => 'integer',
        'selling_price' => 'integer',
        'profits' => 'integer|min:0',
        'payment' => 'integer',
        'debt_total' => 'integer',
        'invoice_note' => '',
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
            'invoice_id' => "{$this->tbl}.invoice_id = '{{param}}'",
            'seller_id' => "{$this->tbl}.seller_id = '{{param}}'",
            'quality' => "{$this->tbl}.quality = '{{param}}'",
            'cost_price' => "{$this->tbl}.cost_price = '{{param}}'",
            'selling_price' => "{$this->tbl}.selling_price = '{{param}}'",
            'profits' => "{$this->tbl}.profits = '{{param}}'",
            'payment' => "{$this->tbl}.payment = '{{param}}'",
            'debt_total' => "{$this->tbl}.debt_total = '{{param}}'",
            'invoice_note' => "{$this->tbl}.invoice_note LIKE '%{{param}}%'",
            'created_at' => "{$this->tbl}.created_at LIKE '%{{param}}%'",
            'updated_at' => "{$this->tbl}.updated_at LIKE '%{{param}}%'",
        );

        /* Define fields to sort */
        $this->sortFields = array(
            'invoice_id_Sort' => "{$this->table}.invoice_id",
            'seller_id_Sort' => "{$this->table}.seller_id",
            'quality_Sort' => "{$this->table}.quality",
            'cost_price_Sort' => "{$this->table}.cost_price",
            'selling_price_Sort' => "{$this->table}.selling_price",
            'profits_Sort' => "{$this->table}.profits",
            'payment_Sort' => "{$this->table}.payment",
            'debt_total_Sort' => "{$this->table}.debt_total",
            'invoice_note_Sort' => "{$this->table}.invoice_note",
            'created_at_Sort' => "{$this->table}.created_at",
            'updated_at_Sort' => "{$this->table}.updated_at",
        );
    }

    /**
     * Query get all data in table tbl_seller_invoice
     * @param array $params
     * @return object
     */
    public function getAll($params)
    {
        $_select = DB::table($this->table);
        $select = $this->createSQL($_select, $params);
        $select->join('seller', 'seller.seller_id', '=', 'seller_invoice.seller_id');
        $select->select($this->table . '.*', 'seller_name');
        $select->orderBy('created_at', 'desc');
        return $select->paginate($this->perPage);
    }

	/**
     * Query get all data in table tbl_seller_invoice
     * @param array $params
     * @return object
     */
    public function getAllReturn($params)
    {
        $_select = DB::table($this->table)->where('quality', '<', '0');
        $select = $this->createSQL($_select, $params);
        $select->join('seller', 'seller.seller_id', '=', 'seller_invoice.seller_id');
        $select->select($this->table . '.*', 'seller_name');
        $select->orderBy('created_at', 'desc');
        return $select->paginate($this->perPage);
    }
	
	
	
	public function reportSeller(){
		$sql = 'SELECT
					MONTH(tbl_seller_invoice.created_at) as mon,
					tbl_seller.seller_id,
					seller_name,
					SUM(quality) as quality,
					AVG(profits) as profits_avg,
					SUM(quality * profits) as profits,
					SUM(payment) as payment,
					tbl_seller.debt_total,
					tbl_seller.debt_other_total
				FROM
					tbl_seller_invoice
				INNER JOIN tbl_seller ON tbl_seller_invoice.seller_id = tbl_seller.seller_id
				WHERE YEAR(tbl_seller_invoice.created_at) = YEAR(CURDATE())
				GROUP BY tbl_seller.seller_id, MONTH(tbl_seller_invoice.created_at)
				ORDER BY MONTH(tbl_seller_invoice.created_at) DESC';
		return DB::select($sql);
	}
	
	public function reportShareHolder(){
		$sql = 'SELECT
					MONTH(tbl_seller_invoice.created_at) as mon,
					SUM(quality) as quality,
					AVG(profits) as profits_avg,
					SUM(quality * profits) as profits,
					SUM(IF(is_return, quality * cost_price, 0)) as total_return,
					SUM(IF((quality > 0) AND (is_return = 0), 0, quality * cost_price)) as total_not_return,
					SUM(IF((quality > 0),quality * cost_price, 0)) as paymentToFactory,
					SUM(payment) as payment,
					SUM(DISTINCT tbl_seller.debt_total) as debt_total,
					SUM(DISTINCT tbl_seller.debt_other_total) as debt_other_total
				FROM
					tbl_seller_invoice
				INNER JOIN tbl_seller ON tbl_seller_invoice.seller_id = tbl_seller.seller_id
				WHERE YEAR(tbl_seller_invoice.created_at) = YEAR(CURDATE())
				GROUP BY MONTH(tbl_seller_invoice.created_at)
				ORDER BY MONTH(tbl_seller_invoice.created_at) DESC';
		$one = DB::select($sql);
		$newOne = array();
		foreach($one as $v){
			$v->cost = 0;
			$newOne[$v->mon] = $v;
		}
		
		$sql2 = 'SELECT
					MONTH(created_at) AS mon,
					SUM(cost) as cost
				FROM
					tbl_share_holder_cost
				WHERE YEAR(created_at) = YEAR(CURDATE())
				GROUP BY MONTH(created_at)
				ORDER BY MONTH(created_at) DESC';
		$two = DB::select($sql2);
		$newTwo = array();
		foreach($two as $v){
			$newOne[$v->mon]->cost = $v->cost;
		}
		return $newOne;
	}
	
}

