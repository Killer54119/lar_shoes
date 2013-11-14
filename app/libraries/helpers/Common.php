<?php
/**
 * Utilitites
 * Use: Common::explode($string);
 */
class Common
{
    /**
     * Explode
     *
     * @param string $string
     * @return array
     */
    static public function explode($string)
    {
         $breaks = array("\r\n", "\n", "\r");
         $text = str_replace($breaks, "\n", trim($string));
         $newtext = preg_replace('/\n+/', "\n", $text);
         return explode("\n", $newtext);
    }
    
    /**
     * Array 2 csv
     *
     * @param int $array
     * @return csv
     */
    static public function array2csv($array)
    {
        if (count($array) == 0)
        {
            return null;
        }
        ob_start();
        $df = fopen("php://output", 'w');
        fputcsv($df, array_keys(reset($array)));
        foreach ($array as $row)
        {
            fputcsv($df, $row);
        }
        fclose($df);
        return ob_get_clean();
    }

    /**
     * Set header
     *
     * @param int $filename
     * @return Set header
     */
    static public function setDownloadHeaders($filename)
    {
        // disable caching
        $now = gmdate("D, d M Y H:i:s");
        header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
        header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
        header("Last-Modified: {$now} GMT");

        // Set http header to shift-JIS
        header('Content-Encoding: UFT-8');
        header('Content-Type: text/csv; charset=UFT-8');

        // force download
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");

        // disposition / encoding on response body
        header("Content-Disposition: attachment;filename={$filename}");
        header("Content-Transfer-Encoding: binary");
    }
    
    /**
     * Generate salt with lenght default is 3
     *
     * @param int $length
	 * @return string
     */
    static public function generateCode($length=3){
        $string   = "";
        $possible = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        for($i=0;$i < $length;$i++) {
            $char = $possible[mt_rand(0, strlen($possible)-1)];
            $string .= $char;
        }
        return $string;
    }

}