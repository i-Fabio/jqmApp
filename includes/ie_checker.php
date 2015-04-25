<?php
// Detects which version of Internet Explorer browser the user is using.
function iever($compare=false, $to=NULL){
    if(!preg_match('/MSIE (.*?);/', $_SERVER['HTTP_USER_AGENT'], $m)
     || preg_match('#Opera#', $_SERVER['HTTP_USER_AGENT']))
        return false === $compare ? false : NULL;
 
    if(false !== $compare
        && in_array($compare, array('<', '>', '<=', '>=', '==', '!='))
        && in_array((int)$to, array(5,6,7,8,9,10))){
        return eval('return ('.$m[1].$compare.$to.');');
    }
    else{
        return (int)$m[1];
    }
}
/*
if(iever('==', 5)){ echo 'Why are you using that old classic, upgrade damn you.'; }
if(iever('==', 6)){ echo 'What are doing using this horrible thing ?'; }
if(iever('<=', 6)){ echo 'This browser is way to old to display anything.'; }
if(iever('>=', 6)){ echo 'I feel a disturbance in on the Web.'; }
if(iever('==', 7)){ echo 'This browser is Internet Explorer 7.'; }
if(iever('<=', 7)){ echo 'This browser is Internet Explorer 7 or below.'; }
if(iever('>=', 7)){ echo 'This browser is Internet Explorer 7 or above.'; }
if(iever('==', 8)){ echo 'This browser is Internet Explorer 8.'; }
if(iever('<=', 8)){ echo 'This browser is Internet Explorer 8 or below.'; }
if(iever('>=', 8)){ echo 'This browser is Internet Explorer 8 or above.'; }
if(iever('==', 9)){ echo 'This browser is Internet Explorer 9.'; }
if(iever('<=', 9)){ echo 'This browser is Internet Explorer 9 or below.'; }
if(iever('>=', 9)){ echo 'This browser is Internet Explorer 9 or above.'; }
if(iever('==', 10)){ echo 'This browser is Internet Explorer 10.'; }
if(iever('<=', 10)){ echo 'This browser is Internet Explorer 10 or below.'; }
if(iever('>=', 10)){ echo 'This browser is Internet Explorer 10 or above.'; }*/


?>
