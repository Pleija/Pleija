<?php
header('Content-Type: text/plain; charset=utf-8');

error_reporting(error_reporting() & ~E_NOTICE);
//error_reporting(0);

ignore_user_abort(true);
set_time_limit(0);

echo shell_exec("git fetch --all 2>&1") . PHP_EOL;
echo shell_exec("git reset --hard origin/master 2>&1") . PHP_EOL;

echo "finish" . PHP_EOL;

