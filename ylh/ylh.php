<?php
/**
 *
 * YouTube Like Hash v0.1
 * Copyright (c) 2006 Hayk Chamyan <hayk@mail.ru>
 * https://github.com/hayk/xpets
 * GNU General Public License version 2
 */

function get_ylhash($data=null, $long=false)
{
	if (is_null($data))
	{
		if ( substr(PHP_VERSION, 0, 1) == '5')
		{   // PHP5
			$data = md5(uniqid(rand(), true), true);
		}
		else
		{   // < PHP5
			$data = md5(uniqid(rand(), true));
			$data = pack('H*', $data);
		}
	}

	if (!$long)
	{
		$data = substr($data, 0, 8);
	}

	$alphabet = '0123456789_abcdefghijklmnopqrstuvwxyz-ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$result = '';
	$m = $a = 0;
	for ($i=0, $len=strlen($data); $i<$len; $i++)
	{
		$c = ord($data{$i});
		$result .= $alphabet{($c << $m | $a) & 63};
		$a = $c >> (6-$m);
		$m += 2;
		if ( ($m==6) || ($i==$len-1) )
		{
			$result .= $alphabet{$a};
			$m = $a = 0;
		}
	}

	return $result;
}
