<?php
/**
 * ****************************************************************************
 * userpage - MODULE FOR XOOPS
 * Copyright (c) Herv� Thouzard of Instant Zero (http://www.instant-zero.com)
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       Herv� Thouzard of Instant Zero (http://www.instant-zero.com)
 * @license         http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package         userpage
 * @author 			Herv� Thouzard of Instant Zero (http://www.instant-zero.com)
 *
 * Version : $Id:
 * ****************************************************************************
 */
if (!defined("ICMS_ROOT_PATH")) {
 	die("XOOPS root path not defined");
}

if( !defined("USERPAGE_DIRNAME") ) {
	define("USERPAGE_DIRNAME", 'userpage');
	define("USERPAGE_URL", ICMS_URL.'/modules/'.USERPAGE_DIRNAME.'/');
	define("USERPAGE_PATH", ICMS_ROOT_PATH.'/modules/'.USERPAGE_DIRNAME.'/');
	define("USERPAGE_IMAGES_URL", USERPAGE_URL.'images/');
	define("USERPAGE_IMAGES_PATH", USERPAGE_PATH.'images/');
}

// Chargement des handler et des autres classes
require_once USERPAGE_PATH.'class/userpage_utils.php';
?>