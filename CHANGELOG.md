## dmstr/phd

### 4.3.0-dev

- fixed `APP_CONFIG_FILE` support
- backend sidebar view cleanup
- updated backend access tests
- updated Docker test & build process
- updated docker-compose configuration to v2 format
- added tests and test-groups
- updated ENV defaults
- fixed travis test path
- updated backend dashboard
- added adminPermission for user module access
- updated user root/admin check (compatibility with yii2-user 0.9.5, 0.9.6)
- backend sidebar view cleanup, added "backend" root node support
- updated asset config
- updated hostnames in testing to use lowercase values, see https://github.com/docker/docker/issues/21169
- updated PHP base image
- removed `config/bootstrap.php`; moved content to main config
- removed application params 'appName' and 'supportEmail', removed ENV variable `APP_SUPPORT_EMAIL`, `BUILD_APP_VOLUME`
- moved `giiant-batch.sh` to `yii batch`

### 4.2.0 (11.3.2016)

- removed application params `appName` and `supportEmail`
- removed ENV variable `APP_SUPPORT_EMAIL`, `BUILD_APP_VOLUME`
- moved `giiant-batch.sh` to `yii batch`
- updated backend footer

### 4.2.0-rc2 (7.3.2016)

- removed relative setup script paths (container usage)

### 4.2.0-rc1 (4.3.2016)

- moved application scripts to `/app/src/bin` folder
- moved `composer.sh` to base-images
- updated `YII_ENV` settings for acceptance tests
- fixed unit test application mocking
- moved prototype module to separate extension

### 4.1.0 (28.2.2016)

- :arrow_up: composer packages
- :arrow_up: base image
- updated CI config
- fixed path in test
- moved version file to src
- simplified build variables, combined BUILD_PREFIX/BUILD_IMAGE_PREFIX
- removed hardcoded IMAGE_NAME from CI config
- removed unused .gitkeep files
- removed constant from sourcePath
- added legacy test for PHP 5.5
- removed unused form
- updated build with Dockerfile linting; don't run build jobs on tag
- fixed stack name when branch has a slash '/' in its name
- hardened docker-compose version check
- updated & enabled access tests
- just ouput IDs when checking requirements
- hardened docker-compose version check, see https://github.com/docker/compose/issues/2733
- hardened testing; moved lint to test_pre to combine all allow_failure tests
- improved CI stack isolation for tags
- added docker daemon check
- do not clean-test in target clean, since it may conflict with initial builds
- fixed startup order in makefile target all
- removed docs module configuration from main.php
  
### 4.0.2 (8.1.2016)

- added make diagnose target to lint job
- added docker daemon check
- do not clean-test in target clean, since it may conflict with initial builds
- fixed startup in makefile target all
- removed docs module configuration from main.php
- enhanced asset path detection

### 4.0.1 (7.1.2016)

- fixed docker-compose requirements check

### 4.0.0 (5.1.2016)

- stable release
- added protoype module

------------------------------------------------

### 4.0.0-rc16

- updated docs
- improved startup scripts
- refactored navbar

### 4.0.0-rc12

- codeception requirement to 2.1

### 4.0.0-beta12

- updated default configuration (schmunk42)

### 4.0.0-beta11

- refactored Docker setup (schmunk42)
- updated template views and style (schmunk42)

### 4.0.0-beta10

- build fixes

### 4.0.0-beta9

- fixed Vagrant shared folder issues (schmunk42)

### 4.0.0-beta1

- basic development