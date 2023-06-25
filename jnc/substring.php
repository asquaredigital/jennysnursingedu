<?php

$str="1993-05-11";

if($str=="")
{

}
else
{
    $str=substr($str,8,9)."-".substr($str,5,2)."-".substr($str,0,4);
}
?>