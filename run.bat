@ECHO OFF

set currdir=%cd%
:: Kill all these processes
taskkill /f /IM httpd.exe  
taskkill /f /IM redis-server.exe 

del /q %currdir%\apache\logs\httpd.pid 
del /q %currdir%\dump.rdb


:: Start redis
RunHiddenConsole redis\redis-server.exe  

:: Start the nginx server
:: start nginx

:: Start the apache server
%currdir%\RunHiddenConsole %currdir%\apache\bin\setApacheConf.exe
%currdir%\RunHiddenConsole %currdir%\apache\bin\httpd.exe



taskkill /f /IM erl.exe 

del %currdir%\erlang\bin\erl.ini 

set binddir=%currdir:\=/%
echo [erlang] >> %currdir%\erlang\bin\erl.ini 
echo Bindir=%binddir%/erlang/erts-9.3/bin  >> %currdir%\erlang\bin\erl.ini 
echo Progname=erl >> %currdir%\erlang\bin\erl.ini 
echo Rootdir=%binddir%/erlang >> %currdir%\erlang\bin\erl.ini


set ERLANG_HOME=%currdir%\erlang
set PATH=%PATH%;%currdir%\erlang\bin

:: Start the erlang server
cd %currdir%/tezancloud 
%currdir%\tezancloud\RunHiddenConsole %currdir%\erlang\bin\erl  -sname tezan  +P 500000 +A 200 -pa ebin  -eval "application:start(tezan)."

:: Start the mq client
cd %currdir%/starcloud/mqc
%currdir%\tezancloud\RunHiddenConsole %currdir%\erlang\bin\erl  -sname mqc  +P 500000 +A 200 -pa ebin  -eval "application:start(mqc)."

:: Start the mq server
cd %currdir%/tezancloud/rabbitmq
%currdir%\tezancloud\RunHiddenConsole  run.bat

cd %currdir%
::EXIT