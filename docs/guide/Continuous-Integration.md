Jenkins Sample Shell Script
---------------------------

    export PATH=/opt/local/bin:/opt/bin:$PATH
    php composer.phar install --prefer-dist
    cp app/config/local-dist.php app/config/local.php
    app/yiic migrate --connectionID=dbTest --interactive=0
    chmod 777 app/data/test.db
    sed -i '.orig' 's|ENTER_YOUR_PHUNDAMENT_URL_HERE|localhost/jenkins/jobs/p3-git/workspace/www|' "app/tests/codeception/acceptance.suite.yml"
    codecept.phar run -c`pwd`