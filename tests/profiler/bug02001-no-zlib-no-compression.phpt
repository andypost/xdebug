--TEST--
Test for bug #2001: no zlib, use_compression=0
--SKIPIF--
<?php
require __DIR__ . '/../utils.inc';
check_reqs('!ext-flag compression; !win');
?>
--INI--
xdebug.mode=profile
xdebug.start_with_request=default
xdebug.use_compression=0
xdebug.profiler_output_name=cachegrind.out.%R.end
--FILE--
<?php
$file = xdebug_get_profiler_filename();
var_dump($file);
if ($file) {
	unlink($file);
}
?>
--EXPECTF--
string(%d) "%send"
