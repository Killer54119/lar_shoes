<?php
/**
 * Model for Keywords
 * 
 * @version $Id$
 */

class AbstractModel extends Eloquent {
    
    protected $prefix = 'tbl_';
    
    protected $tbl;
    
    protected $searchFields;
    
    protected $sortFields;
    
    protected $perPage = 20;
    
    public function createSQL($select, $params) {
        $andWhere = array();
        $orWhere  = array();
        foreach ($params as $field => $value) {
            if ($field === 'col'){
                $andWhere[] = str_replace('{{param}}', addslashes(trim($params['kw'])), $this->searchFields[$value]);
            }
            elseif ($field !== 'kw' && $value !== 'none'){
                if(isset($this->searchFields[$field])){
                    $orWhere[] = str_replace('{{param}}', $params[$field], $this->searchFields[$field]);
                } elseif(isset($this->sortFields[$field])){
                    $select->orderBy($this->sortFields[$field], $value);
                }
            }
        }
        if(count($andWhere)) {
            $select->whereRaw(implode(' AND ',$andWhere));
        }

        if(count($orWhere)) {
            $select->whereRaw(implode(' OR ',$orWhere));
        }

        return $select;
    }

}

