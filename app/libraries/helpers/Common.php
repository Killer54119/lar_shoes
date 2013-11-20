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

    static public function backupDatabase() {
        $opt = Config::get('database.connections.mysql');
        $path = app_path() .'/database/shoes_' . date('d_m_Y_H_i_s') . '.sql';
        $command = "mysqldump --user={$opt['username']} --password={$opt['password']} --host={$opt['host']} {$opt['database']}";
        shell_exec("$command > $path");
        return $path;
    }

}