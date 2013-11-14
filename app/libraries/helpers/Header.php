<?php
/**
 * Hepler use make table header
 */
class Header {

    /**
     *
     * @param string $field
     * @param string $title
     * @return html
     */
    public static function out($field, $title) {
        // Make url
        $kw = Input::get('kw', null);
        $col = Input::get('col', null);
        $url = Request::url() . ($kw ? "?kw={$kw}&col={$col}&" : '?') . "{$field}_Sort=";

        $sortHtml = '<div class="icon-sort" style="position:absolute; right:0px; top:0px; width:15px;">
                        <a class="icon-chevron-up" href="' . $url . 'desc"></a>
                        <a class="icon-chevron-down" href="' . $url . 'asc"></a>
                    </div>';

        return '<th style="position:relative;">' . MyLang::out($title) . $sortHtml . '</th>';
    }
}

