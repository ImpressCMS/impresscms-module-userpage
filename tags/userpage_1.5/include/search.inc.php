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
if (!defined('XOOPS_ROOT_PATH')) {
	die("XOOPS root path not defined");
}

function userpage_search($queryarray, $andor, $limit, $offset, $userid) {
	require_once XOOPS_ROOT_PATH.'/modules/userpage/include/common.php';
	$userpage_handler =& xoops_getmodulehandler('userpage', 'userpage');
	$ret = array();

	$criteria = new CriteriaCompo();
	if ($userid != 0) {
		$criteria->add(new Criteria('up_uid', $userid,'='));
	}

	if (is_array($queryarray) && $count = count($queryarray)) {
		$tmpcrit = new CriteriaCompo(new Criteria('up_title', "%".$queryarray[0]."%",'like'));
		$tmpcrit->add(new Criteria('up_text', "%".$queryarray[0]."%",'like'),'OR');
		$criteria->add($tmpcrit);
		unset($tmpcrit);
		for($i=1;$i < $count;$i++) {
			$tmpcrit = new CriteriaCompo(new Criteria('up_title', "%".$queryarray[$i]."%",'like'));
			$tmpcrit->add(new Criteria('up_text', "%".$queryarray[$i]."%",'like'),'OR');
			$criteria->add($tmpcrit,$andor);
			unset($tmpcrit);
		}
	}

	$criteria->setOrder('DESC');
	$criteria->setSort('up_created');
	$tblpages = array();
	$tblpages = $userpage_handler->getObjects($criteria);
	$i = 0;
	foreach($tblpages as $page) {
		$ret[$i]['image'] = "images/icon.gif";
		$ret[$i]['link'] = $page->getURL(true);
		$ret[$i]['title'] = $page->getVar('up_title');
		$ret[$i]['time'] = $page->getVar('up_created');
		$ret[$i]['uid'] = $page->getVar('up_uid');
		$i++;
	}
	return $ret;
}
?>