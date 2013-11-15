<?php
/**
 * Utilitites
 * Use: Common::explode($string);
 */
class Common
{
    static public function showName($key, $name)
    {
		$class =  array(			
			'label-success',						
			'label-info',
			'label-warning',
			'',
			'label-important',
			'label-inverse'
		);
		return '<span class="label '.$class[$key%6].'">'.$name.'</span>';
		
    }
}