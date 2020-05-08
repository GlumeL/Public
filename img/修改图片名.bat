@echo off
setlocal enabledelayedexpansion
::n为起始数字
set n=1
::*.gif 是文件类型
for /f "delims=" %%i in ('dir *.jpg /b /a-d') do (
ren %%i !n!.jpg&&call,set /a n+=1
)
pause