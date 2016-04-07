<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class InitController extends Controller {

    /**
     * @Route("/init", name="init")
     */
    public function initAction(Request $request) {

	chdir('./../');

	exec('php ./bin/console cache:clear --env=prod');
	exec('php ./bin/console cache:clear --env=dev');
	echo('Cache geleert ');

	exec('php ./bin/console doctrine:database:drop --force');
	echo('Datenbank geloescht ');

	exec('php ./bin/console doctrine:database:create');
	echo('Datenbank erzeugt ');

	exec('php ./bin/console doctrine:schema:create');
	echo('Datenbankschema erzeugt ');

	exec('php ./bin/console doctrine:fixtures:load --no-interaction');
	echo('Fixtures geladen ');

	return new Response("<body></body>");
    }

}
