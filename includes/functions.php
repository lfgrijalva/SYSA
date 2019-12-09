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

function display_phone_number($number)
{
//     //eliminate every char except 0-9
//     $justNums = preg_replace("/[^0-9]/", '', $number);

// //eliminate leading 1 if its there
//     if (strlen($justNums) == 11) {
//         $justNums = preg_replace("/^1/", '', $justNums);
//     }

// //if we have 10 digits left, it's probably valid.
//     if (strlen($justNums) == 10) {
//         $isPhoneNum = true;
//     }
    $result="";
    if (is_numeric($number))
    {
        $digits=str_split($number);
        if (sizeof($digits)==PHONE_NUMBER_LENGTH)
        {
            $result="(".$digits[0].$digits[1].$digits[2].")".$digits[3].$digits[4].$digits[5]."-".$digits[6].$digits[7].$digits[8].$digits[9];
            return $result;
        }
        else if (sizeof($digits)>PHONE_NUMBER_LENGTH)
        {
            if (sizeof($digits==PHONE_EXT_LENGTH)) {
                $result="(".$digits[0].$digits[1].$digits[2].")".$digits[3].$digits[4].$digits[5]."-".$digits[6].$digits[7].$digits[8].$digits[9]." ext. ".$digits[10].$digits[11].$digits[12].$digits[13];
                return $result;
            }
            else{
                $result="Length of the number is higher than ".PHONE_EXT_LENGTH;
                return $result;
            }
        }
        else {
            $result="Length of the number is lower than ".PHONE_NUMBER_LENGTH;
            return $result;
        }
    }

}

function num_digits($number)
{
    $digits=str_split($number);
    return sizeof($digits);
}

?>

