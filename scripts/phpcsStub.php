#!/usr/bin/env php
<?php
Phar::mapPhar('phpcs.phar');
require_once "phar://phpcs.phar/CodeSniffer/CLI.php";

foreach ($argv as $idx => $arg)
{
    if (substr($arg, 0, 17) == "--output-charset=")
    {
        define("REPORT_OUTPUT_CHARSET", substr($arg, 17));
        unset($argv[$idx]);
        unset($_SERVER["argv"][$idx]);
        break;
    }
}
if (!defined("REPORT_OUTPUT_CHARSET"))
{
    define("REPORT_OUTPUT_CHARSET", "utf-8");
}

$cli = new PHP_CodeSniffer_CLI();
$cli->runphpcs();
__HALT_COMPILER();

# end of file
