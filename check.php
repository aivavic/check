<?php
function check($string)
{
    $marks  = array(
        ')' => '(',
        ']' => '[',
        '}' => '{',
        '>' => '<'
    );
	
    $stack = array();
	
    $counter = 0;
	
    for($i=0;$i<strlen($string);$i++)
    {
        if (in_array($string{$i},array_values($marks)))
            $stack[$counter++] = $string{$i};
        else if (in_array($string{$i},array_keys($marks)))
        {
            $pair = $counter? $stack[$counter-1] : ' ';
			
            if ($pair!=$marks[$string{$i}])
                return false;
            else
                unset($stack[--$counter]);
        }
    }
    return count($stack)==0;
}


$string = "Lorem< ipsum (dolor sit amet, ){conse}ctetur adipisc[ing e]lit, s>ed";

print check($string)?"Все скобки закрыты":"Есть не закрытые скобки";
