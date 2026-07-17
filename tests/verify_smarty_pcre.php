<?php

require_once dirname(__DIR__) . '/lib/smarty/Smarty.class.php';
require_once dirname(__DIR__) . '/lib/smarty/Smarty_Compiler.class.php';

$compiler = new Smarty_Compiler();

$patterns = array(
	'Smarty_Compiler::_compile_tag' => '~^(?:(' . $compiler->_num_const_regexp . '|' . $compiler->_obj_call_regexp . '|' . $compiler->_var_regexp . '|/?' . $compiler->_reg_obj_regexp . '|/?' . $compiler->_func_regexp . ')(' . $compiler->_mod_regexp . '*))(?:\s+(.*))?$~xs',
	'Smarty_Compiler::_parse_var_props object/variable' => '~^(' . $compiler->_obj_call_regexp . '|' . $compiler->_dvar_regexp . ')(' . $compiler->_mod_regexp . '*)$~',
	'Smarty_Compiler::_parse_var_props double-quoted' => '~^' . $compiler->_db_qstr_regexp . '(?:' . $compiler->_mod_regexp . '*)$~',
	'Smarty_Compiler::_parse_var_props numeric' => '~^' . $compiler->_num_const_regexp . '(?:' . $compiler->_mod_regexp . '*)$~',
	'Smarty_Compiler::_parse_var_props single-quoted' => '~^' . $compiler->_si_qstr_regexp . '(?:' . $compiler->_mod_regexp . '*)$~',
	'Smarty_Compiler::_parse_var_props config variable' => '~^' . $compiler->_cvar_regexp . '(?:' . $compiler->_mod_regexp . '*)$~',
	'Smarty_Compiler::_parse_var_props section variable' => '~^' . $compiler->_svar_regexp . '(?:' . $compiler->_mod_regexp . '*)$~'
);

foreach ($patterns as $name => $pattern) {
	set_error_handler(function ($severity, $message) use ($name, $pattern) {
		throw new RuntimeException($name . ': ' . $message . ' Pattern: ' . $pattern);
	});
	$result = preg_match($pattern, '');
	restore_error_handler();

	if ($result === false) {
		throw new RuntimeException($name . ': preg_match returned false. Pattern: ' . $pattern);
	}

	echo "OK: {$name}\n";
}
