<?php
/*
 * This Example uses a class that uses the Sass implementation and parse 
 * A SASS/SCSS string to Valid CSS.
 */
 
require 'SassImp.class.php';

$s2 = 
".special {
    p {
        color: #ccccff;
    }
}";
$s3 = 
".element-a
    color: hotpink

    .element-b
        float: left
";
$Compiler = new SassImp();              //Build Class
$Compiler->source($s2);                 //Set Source
$Compiler->syntax(true);                //Use Indented syntax : SASS.
$compiled = $Compiler->parseSCSS() ?    //Try to parse.
            $Compiler->compiled()  :    //Get Copiled Or False
            $Compiler->getLastError();  //IF Faslse than get ERROR.

var_dump($compiled);
