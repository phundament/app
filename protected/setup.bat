@echo off

echo ========================
echo Phundament 3 Quick Setup
echo ========================
echo 
echo This script will do to following:
echo 1. if a valid yiic command is provided as first parameter, it will setup a Yii web application skeleton
echo 2. it will call Yii migration commands to setup the database schema
echo 3. it create appropriate folder permissions for P3Media the media manager module
echo 

echo STAGE 1
echo Currently not available under Windows;
::if [ $1 !=  ]; then
::    echo For providing an out-of-the-box running web application, we had to modify 'config/main','config/console' and 'layouts/main'.
::    echo Note: Skip '...overwrite?' for these files by hitting <enter>
::    echo     
::    pushd `dirname $1` > /dev/null
::    extYiicDir=`pwd`
::    popd  > /dev/null
::    pushd `dirname $0`/.. > /dev/null
::    appDir=`pwd`
::    popd > /dev/null
::    echo Running command: $extYiicDir/yiic webapp $appDir
::    echo     
::    $extYiicDir/yiic webapp $appDir
::else
::    echo External yiic command not specified, skipping webapp stage.;
::fi
::baseDir=`dirname $0`
::pushd $baseDir  > /dev/null

echo 
echo STAGE 2
SET /P ANSWER=Apply database migrations? (y/n)
echo You chose: %ANSWER%
if /i {%ANSWER%}=={y} (goto :yes2)
if /i {%ANSWER%}=={yes} (goto :yes2)
goto :no2

:yes2
echo You pressed yes!
	echo Applying migrations...;
    call yiic.bat migrate --migrationPath=ext.phundament.p3admin.modules-install.user.migrations --migrationTable=migration_module_user --interactive=0
    call yiic.bat migrate --migrationPath=ext.phundament.p3admin.modules-install.rights.migrations --migrationTable=migration_module_rights --interactive=0
    call yiic.bat migrate --migrationPath=ext.phundament.p3widgets.migrations --migrationTable=migration_module_p3widgets --interactive=0
    call yiic.bat migrate --migrationPath=ext.phundament.p3media.migrations --migrationTable=migration_module_p3media --interactive=0
    call yiic.bat migrate --migrationPath=ext.phundament.p3pages.migrations --migrationTable=migration_module_p3pages --interactive=0


:no2
echo 
echo STAGE 3
SET /P ANSWER=Setup permissions? (y/n)
echo You chose: %ANSWER%
if /i {%ANSWER%}=={y} (goto :yes3)
if /i {%ANSWER%}=={yes} (goto :yes3)
goto :no3

:yes3
::read choice
::if [ $choice == y ]; then
    mkdir ..\runtime
::    chmod 777 ../runtime
    mkdir data\p3media
::    chmod 777 ./data/p3media
    mkdir data\p3media-import
::    chmod 777 ./data/p3media-import
::else 
::	echo Skipped.
::fi


:no3
echo 
echo Installation complete.
echo Thank you for choosing Phundament 3.
exit /b 0
