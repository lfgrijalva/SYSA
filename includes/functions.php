<?php


function display_copyright()
{
    echo " <a href=\"http://validator.w3.org/check?uri=referer\">
    <img 	style=\"width:88px;
                height:31px;\"
            src=\"http://www.w3.org/Icons/valid-xhtml10\"
            alt=\"Valid XHTML 1.0 Strict\" />
</a>
     <a href=\"http://jigsaw.w3.org/css-validator/check/referer\">
        <img 	style=\"width:88px;
                    height:31px;\"
                src=\"http://jigsaw.w3.org/css-validator/images/vcss\"
                alt=\"Valid CSS!\" />
</a>
&copy; Site name,
";
    $today = date("d/m/Y");
    echo $today;
}

function dump($arg)
{
    echo "<pre>";
    echo (is_array($arg)) ? print_r($arg) : $arg;
    echo "</pre>";
}
function num_digits($number)
{
    $digits=str_split($number);
    if (in_array(".",$digits)) {
        $pos=array_search(".", $digits);
        return $pos;
    }
    else {
        return sizeof($digits);
    }
    
}

?>

