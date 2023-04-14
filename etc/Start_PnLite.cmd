@echo off

cd /d %~dp0
set path=%PATH%;%~dp0bin;%~dp0php

rem Script by CRLin.
SET dirpath=%CD:~2%
SET dirpath=%dirpath:\=/%
SET /p old_dirpath=<dirpath.txt
IF "%dirpath%"=="%old_dirpath%" GOTO start
cscript replace.vbs dirpath.txt "%old_dirpath%" "%dirpath%"
cscript replace.vbs conf\httpd.conf "WEBROOT '%old_dirpath%'" "WEBROOT '%dirpath%'"

:start

call %~dp0Stop_PnLite.cmd

nircmd exec hide "~$folder.nircmd$\bin\httpd.exe" || pause && Exit
nircmd exec hide "~$folder.nircmd$\mysql\bin\mysqld.exe" --no-defaults --port=3307 || pause && Exit
Echo  # PHPnow-Lite 正在运行.
rem Pause
start http://127.1:81/
rem phpinfo.php
set JAVA_HOME=%~dp0elasticsearch-6.8.23\jdk
call %~dp0elasticsearch-6.8.23\bin\elasticsearch.bat
