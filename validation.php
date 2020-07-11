<?php
    function len_between($str, $min, $max)
    {
		if (strlen($str) >= 3 && strlen($str) <= 10)
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

    function only_alphanum($str)
    {
		$array = str_split($str);
		foreach ($array as $char)
		{
			if (!(($char >= 'A' && $char <= 'Z') || ($char >= 'a' && $char <= 'z') || ($char >= '0' && $char <= '9')))
                return 0;
        }
        return 1;
    }
?>