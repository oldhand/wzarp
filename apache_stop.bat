@echo off
taskkill /f /IM httpd.exe
set currdir=%cd%
del /q %currdir%\apache\logs\*.* 