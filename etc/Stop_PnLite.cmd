@echo off

rem ����ʱҪдȫ·������ɱ��
nircmd killprocess "~$folder.nircmd$\bin\httpd.exe"
if errorlevel 0 Echo  # httpd.exe �ѱ��ر�. && goto killmy
taskkill /F /IM mysqld.exe 
rem Echo  # httpd.exe û������.
:killmy
nircmd killprocess "~$folder.nircmd$\mysql\bin\mysqld.exe"
if errorlevel 0 Echo  # mysqld-nt.exe �ѱ��ر�. && goto end
rem Echo  # mysqld-nt.exe û������.
taskkill /F /IM httpd.exe 
rem pause
:end

