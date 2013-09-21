<?php
/**
 *
 * YouTube Like Hash v0.2
 *
 * @author		Hayk Chamyan <hamshen@gmail.com>
 * @version		0.2
 * @copyright	2006-2013 Hayk Chamyan
 * @link		https://github.com/hayk/xpets
 * @license		GNU General Public License version 2
 */

function get_ylhash($data=null, $long=false)
{
	$trans = array
	(
		'+' => '-',
		'/' => '_',
		'=' => '',
	);

	if (is_null($data))
	{
		$data = crypt( mt_rand().uniqid() );
	}

	$data = md5($data, true);

	if(!$long)
	{
		$data = substr($data, 0, 8);
	}

	$data = strtr(base64_encode($data), $trans);

	return $data;
}
