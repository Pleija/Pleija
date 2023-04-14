@echo off

rem 启动时要写全路径才能杀掉
nircmd killprocess "~$folder.nircmd$\bin\httpd.exe"
if errorlevel 0 Echo  # httpd.exe 已被关闭. && goto killmy
taskkill /F /IM mysqld.exe 
rem Echo  # httpd.exe 没有运行.
:killmy
nircmd killprocess "~$folder.nircmd$\mysql\bin\mysqld.exe"
if errorlevel 0 Echo  # mysqld-nt.exe 已被关闭. && goto end
rem Echo  # mysqld-nt.exe 没有运行.
taskkill /F /IM httpd.exe 
rem pause
:end

