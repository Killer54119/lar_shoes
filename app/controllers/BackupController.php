<?php
/**
 * Controller: Report
 * Date: 2013-11-11 10:07
 * 
 */
class BackupController extends BaseController
{
    /**
     * Backup database manual
     */
    public function database(){
        $path = Common::backupDatabase();

        echo file_exists($path) ? 'Sao lưu thành công' : 'Sao lưu ko được';
        echo '<hr>' . file_get_contents($path);
        exit();
	}
	
}