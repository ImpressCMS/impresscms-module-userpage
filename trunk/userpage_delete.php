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
require 'header.php';
require_once ICMS_ROOT_PATH.'/header.php';

$userpage_handler =& xoops_getmodulehandler('userpage', 'userpage');
$uid = $id = 0;
$res = false;

if(is_object($xoopsUser) && $xoopsUser->isAdmin($xoopsModule->getVar('mid'))) {
	$uid = $xoopsUser->getVar('uid');
} else {
	header('Location: userpage_list.php');
	exit;
}

if(isset($_GET['id'])) {
	$id = intval($_GET['id']);
	$page = $userpage_handler->get($id);
	if(is_object($page)) {
		$res = $userpage_handler->delete($page, true);
	}
}
if($res) {
	redirect_header('index.php', 2, _USERPAGE_DB_OK);
	exit();
} else {
	redirect_header('index.php', 4, _ERRORS);
	exit();
}
require_once(ICMS_ROOT_PATH."/footer.php");
?>
