#/bin/bash
vendor/bin/phpunit --colors=auto  --testdox --testsuite Db
vendor/bin/phpunit --colors=auto  --testdox --testsuite Lib
vendor/bin/phpunit --colors=auto  --testdox --testsuite Logic
