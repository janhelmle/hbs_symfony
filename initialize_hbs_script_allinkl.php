<?php
shell_exec("/usr/bin/php56 bin/console doctrine:database:drop --force");
shell_exec("/usr/bin/php56 bin/console doctrine:database:create");
shell_exec("/usr/bin/php56 bin/console doctrine:schema:create");
shell_exec("/usr/bin/php56 bin/console doctrine:fixtures:load --no-interaction");
shell_exec("/usr/bin/php56 bin/console cache:clear --env=prod");
shell_exec("/usr/bin/php56 bin/console cache:clear --env=dev");
