#/bin/bash
../vendor/bin/phpunit --colors=auto  --bootstrap ../vendor/autoload.php  --testdox db/DomainDbTest.php
../vendor/bin/phpunit --colors=auto  --bootstrap ../vendor/autoload.php  --testdox db/SslDbTest.php
../vendor/bin/phpunit --colors=auto  --bootstrap ../vendor/autoload.php  --testdox db/MarkDbTest.php
../vendor/bin/phpunit --colors=auto  --bootstrap ../vendor/autoload.php  --testdox lib/ChangesTest.php
../vendor/bin/phpunit --colors=auto  --bootstrap ../vendor/autoload.php  --testdox lib/DomainUpdatesTest.php
../vendor/bin/phpunit --colors=auto  --bootstrap ../vendor/autoload.php  --testdox lib/DomainTest.php
../vendor/bin/phpunit --colors=auto  --bootstrap ../vendor/autoload.php  --testdox lib/ApiPropertiesTest.php
../vendor/bin/phpunit --colors=auto  --bootstrap ../vendor/autoload.php  --testdox db/DbModelBaseTest.php
../vendor/bin/phpunit --colors=auto  --bootstrap ../vendor/autoload.php  --testdox lib/DbBaseTest.php
../vendor/bin/phpunit --colors=auto  --bootstrap ../vendor/autoload.php  --testdox lib/LocksTest.php
../vendor/bin/phpunit --colors=auto  --bootstrap ../vendor/autoload.php  --testdox logic/SyncPayloadTest.php