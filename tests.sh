#/bin/bash
./vendor/bin/phpunit --colors=auto  --bootstrap vendor/autoload.php  --testdox tests/db/TestDomainDb.php
./vendor/bin/phpunit --colors=auto  --bootstrap vendor/autoload.php  --testdox tests/db/TestSslDb.php
./vendor/bin/phpunit --colors=auto  --bootstrap vendor/autoload.php  --testdox tests/db/TestMarkDb.php
./vendor/bin/phpunit --colors=auto  --bootstrap vendor/autoload.php  --testdox tests/lib/TestChanges.php
./vendor/bin/phpunit --colors=auto  --bootstrap vendor/autoload.php  --testdox tests/lib/TestDomainUpdates.php
./vendor/bin/phpunit --colors=auto  --bootstrap vendor/autoload.php  --testdox tests/lib/TestDomain.php
./vendor/bin/phpunit --colors=auto  --bootstrap vendor/autoload.php  --testdox tests/lib/TestApiProperties.php
./vendor/bin/phpunit --colors=auto  --bootstrap vendor/autoload.php  --testdox tests/db/TestDbModelBase.php
./vendor/bin/phpunit --colors=auto  --bootstrap vendor/autoload.php  --testdox tests/lib/TestDbBase.php
