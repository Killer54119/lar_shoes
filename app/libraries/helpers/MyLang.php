<?php

/**
 * Lang auto insert into general files
 */
class MyLang
{

    /**
     * Make file defaut for language
     * @param string $file file name
     * Ex: general
     */
    private static function makeEmptyFile($file)
    {
        if (!file_exists($file))
        {
            $content = "<?php\n";
            $content .= "return array(\n";
            $content .= "\n);";
            file_put_contents($file, $content);
        }
    }

    /**
     * Insert new word to language file
     * @param string $file
     * @param string $key
     */
    private static function insertLang($file, $key)
    {
        static::makeEmptyFile($file);
        $current = file_get_contents($file);
        $current = str_replace(');', '', $current);
        $current .= "        '" . str_pad("$key'", 25) . " => '$key',";
        $current .= "\n);";
        file_put_contents($file, $current);
    }

    /**
     * Return word if have no word in language filesm, sys will auto insert
     *
     * @param string $key
     * @param array $opt
     * @param string $file
     * @return string
     */
    public static function out($key, $opt = array(), $file = 'general')
    {
        if (App::environment() == 'localhost')
        {
            if (!Lang::has($file . '.' . $key))
            {
                $jnFile = app_path() . '/lang/vn/' . $file . '.php';
                static::insertLang($jnFile, $key);
                return Lang::get($key, $opt);
            }
        }
        return Lang::get($file . '.' . $key, $opt);
    }

}
