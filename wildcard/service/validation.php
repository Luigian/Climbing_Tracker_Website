<?php
    function unset_post($str)
    {
        if (strlen($_POST[$str]) == 0)
        	unset($_POST[$str]);
    }
    
    function len_between($str, $min, $max)
    {
        if (strlen($str) >= $min && strlen($str) <= $max)
            return 1;
        else
            return 0;
    }

    function only_alpha($str)
    {
		$array = str_split($str);
		foreach ($array as $char)
		{
		    if (!(($char >= 'A' && $char <= 'Z') || ($char >= 'a' && $char <= 'z')))
                return 0;
        }
        return 1;
    }

    function only_alpha_space($str)
    {
		$array = str_split($str);
		foreach ($array as $char)
		{
		    if (!(($char >= 'A' && $char <= 'Z') || ($char >= 'a' && $char <= 'z') || $char == ' '))
                return 0;
        }
        return 1;
    }
    
    function only_alpha_num($str)
    {
		$array = str_split($str);
		foreach ($array as $char)
		{
		    if (!(($char >= 'A' && $char <= 'Z') || ($char >= 'a' && $char <= 'z') || ($char >= '0' && $char <= '9')))
                return 0;
        }
        return 1;
    }
    
    function only_alpha_space_num($str)
    {
		$array = str_split($str);
		foreach ($array as $char)
		{
			if (!(($char >= 'A' && $char <= 'Z') || ($char >= 'a' && $char <= 'z') || $char == ' ' || ($char >= '0' && $char <= '9')))
                return 0;
        }
        return 1;
    }
?>