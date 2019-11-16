@echo off
taskkill /f /IM httpd.exe
set currdir=%cd%
del /q %currdir%\apache\logs\*.* 
echo Diese Eingabeforderung nicht waehrend des Running beenden
echo Bitte erst bei einem gewollten Shutdown schliessen
echo Please close this command only for Shutdown
echo Apache 2 is starting ...

%currdir%\apache\bin\httpd.exe

if errorlevel 255 goto finish
if errorlevel 1 goto error
goto finish

:error
echo.
echo Apache konnte nicht gestartet werden
echo Apache could not be started
pause

:finish
