#! /usr/bin/env php
<?php
require_once('/Applications/MAMP/htdocs/pharen/lang.php');
Lexical::$scopes['phake'] = array();
require_once("path.php");
define("PHAKE_SYSTEM", realpath(dirname(__FILE__)));
define("PHAREN_SYSTEM", path_join(PHAKE_SYSTEM, "../.."));
define("PROJECT_SYSTEM", getcwd());
require_once((PHAREN_SYSTEM . "/pharen.php"));
function proj($name, $attrs){
	return "Do stuff with project info here";
}

function project_path($f){
	return PROJECT_SYSTEM . $f;
}

function not_dots($dir){
	return ("." !== $dir) and (".." !== $dir);
}

function compile_with_flag($flag, $file){
	set_flag($flag);
	compile_file($file);
	return unset_flag($flag);
}

function compile_except($excepts, $file, $output_dir=NULL){

$__condtmpvar0 = Null;
if(!(in_array($file, $excepts))){
	$__condtmpvar0 = compile_file($file);
}
else{
$__condtmpvar0 = FALSE;
}
	return $__condtmpvar0;
}

function is_phn($f){
$__listAcessTmpVar0 = pathinfo($f);
$__listAcessTmpVar1 = pathinfo($f);
	return isset($__listAcessTmpVar0["extension"]) and ($__listAcessTmpVar1["extension"] == "phn");
}

function phake__lambdafunc7($f, $__closure_id){
	$__scope_id = Lexical::init_closure("phake", 58);
	$dir =& Lexical::get_lexical_binding('phake', 57, '$dir', isset($__closure_id)?$__closure_id:0);;
	$compile_func =& Lexical::get_lexical_binding('phake', 57, '$compile_func', isset($__closure_id)?$__closure_id:0);;
	$file = path_join($dir, $f);
	Lexical::bind_lexing("phake", 58, '$file', $file);
	
	 Null;
	if((not_dots($f) and is_dir($file))){
		return compile_dir($file, $compile_func);
	}
	else if(is_phn($file)){
		return (is_string($compile_func)?$compile_func($file, dirname($file)):$compile_func[0]($file, dirname($file), $compile_func[1])) and print(("Compile: " . $file . "\n"));
	}
}

function compile_dir($dir, $compile_func="compile_file"){
	$__scope_id = Lexical::init_closure("phake", 57);
	Lexical::bind_lexing("phake", 57, '$dir', $dir);
	Lexical::bind_lexing("phake", 57, '$compile_func', $compile_func);


	return map(array("phake__lambdafunc7", Lexical::get_closure_id("phake", $__scope_id)), scandir($dir, 1));
}

compile_with_flag("executable", project_path("/lib/phake/phake.phn"));
compile_file(project_path("/phakefile"));
require(project_path("/phakefile.php"));
if((count($argv) > 1)){
	$__tmpfuncname1 = $argv[1];
	(is_string($__tmpfuncname1)?$__tmpfuncname1():$__tmpfuncname1[0]($__tmpfuncname1[1]));
}
else{
	print("Doing nothing\n");
}
