<?php
shell_exec("php bin/console doctrine:database:drop --force");
shell_exec("php bin/console doctrine:database:create");
shell_exec("php bin/console doctrine:schema:create");
shell_exec("php bin/console doctrine:fixtures:load --no-interaction");
shell_exec("php bin/console cache:clear --env=prod");
shell_exec("php bin/console cache:clear --env=dev");


