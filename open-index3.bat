@echo off
setlocal
cd /d "%~dp0"

where php >nul 2>nul
if errorlevel 1 (
  echo PHP is not installed or not in PATH.
  echo Install PHP, then run this file again.
  pause
  exit /b 1
)

set "PORT=8080"
echo Starting local server at http://localhost:%PORT%/
start "" "http://localhost:%PORT%/index3.html"
php -S localhost:%PORT%
