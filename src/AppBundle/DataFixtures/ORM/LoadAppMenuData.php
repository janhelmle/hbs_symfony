<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\AppMenu;

class LoadAppMenuData implements FixtureInterface {

    public function load(ObjectManager $manager) {

	// echo(getcwd());
//        $matrix = [
//            [
//                0,
//                "prototype",
//                "Prototyp",
//                "",
//                "http://dev-wp.mam-hbs.de/berliner-verkehrsbetriebe-bvg/",
//                "url_view",
//                "bundles/app/info_1024x1024.pdf",
//                "#rrggbbaa",
//                0
//            ],
//            [
//                100,
//                "infocontact",
//                "Info / Kontakt",
//                "",
//                "http://dev-wp.mam-hbs.de/berliner-verkehrsbetriebe-bvg/",
//                "url_view",
//                "bundles/app/info_1024x1024.pdf",
//                "#001122ff",
//                1
//            ], [
//                110,
//                "events",
//                "Veranstaltungen",
//                "",
//                "http://dev-wp.mam-hbs.de/veranstaltungen/",
//                "url_view",
//                "bundles/app/veranstaltungen_1024x1024.svg",
//                "#00112233",
//                1
//            ], [
//                120,
//                "news",
//                "Aktuelles",
//                "News",
//                "http://dev-wp.mam-hbs.de/news/",
//                "url_view",
//                "bundles/app/aktuelles_1024x1024.svg",
//                "#00112233",
//                1
//            ], [
//                130,
//                "stressmanagement",
//                "Stressbew\u00e4ltigung - Tipps!",
//                "",
//                "http://dev-wp.mam-hbs.de/stressbewaeltigung-tipps/",
//                "url_view",
//                "bundles/app/info_1024x1024.pdf",
//                "#00112233",
//                1
//            ], [
//                140,
//                "burnoutprophylaxis",
//                "Burnout Prophylaxe",
//                "",
//                "http://dev-wp.mam-hbs.de/burnout-prophylaxe/",
//                "url_view",
//                "bundles/app/info_1024x1024.pdf",
//                "#00112233",
//                1
//            ], [
//                150,
//                "worklifebalance",
//                "Work - Life - Balance",
//                "",
//                "http://dev-wp.mam-hbs.de/work-life-balance/",
//                "url_view",
//                "bundles/app/info_1024x1024.pdf",
//                "#00112233",
//                1
//            ], [
//                160,
//                "healthynutrition",
//                "Gesunde Ern\u00e4hrung",
//                "",
//                "http://dev-wp.mam-hbs.de/gesunde-ernaehrung/",
//                "url_view",
//                "bundles/app/info_1024x1024.pdf",
//                "#00112233",
//                1
//            ], [
//                170,
//                "feelgoodweight",
//                "Zum Wohlf\u00fchlgewicht",
//                "",
//                "http://dev-wp.mam-hbs.de/wegweiser-wohlfuehlgewicht/",
//                "url_view",
//                "bundles/app/info_1024x1024.pdf",
//                "#00112233",
//                1
//            ], [
//                180,
//                "facebook",
//                "Facebook",
//                "",
//                "https://www.facebook.com/weilwirdichlieben/",
//                "url_view",
//                "bundles/app/info_1024x1024.pdf",
//                "#00112233",
//                1
//            ], [
//                190,
//                "twitter",
//                "Twitter",
//                "",
//                "https://mobile.twitter.com/bvg_ubahn",
//                "url_view",
//                "bundles/app/info_1024x1024.pdf",
//                "#00112233",
//                1
//            ], [
//                200,
//                "youtube",
//                "Youtube",
//                "",
//                "https://www.youtube.com/channel/UCUWE7apeDoepJixzxyjP9vg",
//                "url_view",
//                "bundles/app/info_1024x1024.pdf",
//                "#00112233",
//                1
//            ], [
//                210,
//                "legal",
//                "Allgemeine Hinweise",
//                "",
//                "http://dev-wp.mam-hbs.de/allgemeine-informationen/",
//                "url_view",
//                "bundles/app/info_1024x1024.pdf",
//                "#00112233",
//                1
//            ]
//        ];
//        foreach ($matrix as $row) {
//            $entity = new AppMenu();
//            $entity->setPriority($row[0]);
//            $entity->setIdentification($row[1]);
//            $entity->setTitleDe($row[2]);
//            $entity->setTitleEn($row[3]);
//            $entity->setDataUrl($row[4]);
//            $entity->setDataType($row[5]);
//            $entity->setImageSource($row[6]);
//            $entity->setImageBackground($row[7]);
//            $entity->setEnabled($row[8]);
//            $manager->persist($entity);
//            $manager->flush();
//            unset($entity);
//        } // end foreach
//        unset($matrix);

	$ini = parse_ini_file('hbs.ini', true);

	foreach ($ini['app_menu']['row'] as $row) {
	    $rowasarray = explode(',', $row);
	    $rowasarray = str_replace('"', '', $rowasarray);
	    $entity = new AppMenu();
	    $entity->setPriority($rowasarray[0]);
	    $entity->setIdentification($rowasarray[1]);
	    $entity->setTitleDe($rowasarray[2]);
	    $entity->setTitleEn($rowasarray[3]);
	    $entity->setDataUrl($rowasarray[4]);
	    $entity->setDataType($rowasarray[5]);
	    $entity->setImageSource($rowasarray[6]);
	    $entity->setImageBackground($rowasarray[7]);
	    $entity->setEnabled($rowasarray[8]);
	    $manager->persist($entity);
	    $manager->flush();
	    unset($entity);
	}
	unset($ini);
    }

}
