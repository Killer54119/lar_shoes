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

        echo file_exists($path) ? 'Backup successful' : 'Backup fail';
        echo '<hr>' . file_get_contents($path);
        exit();
	}
	
}