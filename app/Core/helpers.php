<?php

if (! function_exists('array_last_value')) {

    function array_last_value($string,$delimiter,$last = true)
    {
        $result = explode($delimiter,$string);

        if($last){
            return array_last($result);
        }else{
            return array_first($result);
        }
    }
}

if (! function_exists('mask')){
    function mask($val, $mask)
    {
        $maskared = '';
        $k = 0;
        for($i = 0; $i<=strlen($mask)-1; $i++)
        {
            if($mask[$i] == '#')
            {
                if(isset($val[$k]))
                    $maskared .= $val[$k++];
            }
            else
            {
                if(isset($mask[$i]))
                    $maskared .= $mask[$i];
            }
        }
        return $maskared;
    }
}

if (! function_exists('selected')){
    function selected($base, $relation)
    {
        if($base==$relation){
            return ' selected';
        }
        return null;
    }
}

if (! function_exists('title_ucwords')){
    function title_ucwords($string, $delimiters = [" "], $exceptions = ["a","o","e","da","é","ó","das", "de", "do", "das", "dos"])
    {
        $string = mb_convert_case($string, MB_CASE_TITLE, "UTF-8");
        foreach ($delimiters as $dlnr => $delimiter) {
            $words = explode($delimiter, $string);
            $newwords = [];
            foreach ($words as $wordnr => $word) {
                if (in_array(mb_strtoupper($word, "UTF-8"), $exceptions)) {
                    // check exceptions list for any words that should be in upper case
                    $word = mb_strtoupper($word, "UTF-8");
                } elseif (in_array(mb_strtolower($word, "UTF-8"), $exceptions)) {
                    // check exceptions list for any words that should be in upper case
                    $word = mb_strtolower($word, "UTF-8");
                } elseif (!in_array($word, $exceptions)) {
                    // convert to uppercase (non-utf8 only)
                    $word = ucfirst($word);
                }
                array_push($newwords, $word);
            }
            $string = join($delimiter, $newwords);
        }//foreach
        return $string;
    }
}

if (! function_exists('counter')){
    function counter($var){
        if(count($var) >= 1){
            return true;
        }
    }
}
