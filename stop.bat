@ECHO OFF


:: Kill all these processes
taskkill /f /IM nginx.exe
taskkill /f /IM httpd.exe  
taskkill /f /IM redis-server.exe  
taskkill /f /IM erl.exe  
taskkill /f /IM postgres.exe  

