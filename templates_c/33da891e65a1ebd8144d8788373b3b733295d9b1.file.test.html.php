<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-04 16:34:23
         compiled from "application\views\test.html" */ ?>
<?php /*%%SmartyHeaderCode:1599254f6c0d2721278-01881232%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '33da891e65a1ebd8144d8788373b3b733295d9b1' => 
    array (
      0 => 'application\\views\\test.html',
      1 => 1425458062,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1599254f6c0d2721278-01881232',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54f6c0d277ee89_99247664',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54f6c0d277ee89_99247664')) {function content_54f6c0d277ee89_99247664($_smarty_tpl) {?><html>   
<head>   
<meta charset="utf-8">   
<title>{ $test.title}</title> 
  
<style type="text/css">   
</style>   
</head>   
<body>   
{$test.num|md5} 
<br>   
{$tmp}   
</body>   
</html> <?php }} ?>
