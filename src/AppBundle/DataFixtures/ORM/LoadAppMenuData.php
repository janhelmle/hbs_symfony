<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\AppMenu;

class LoadAppMenuData implements FixtureInterface {

    public function load(ObjectManager $manager) {

        $matrix = [
            [
                0,
                "prototype",
                "Prototyp",
                "",
                "http://bvg-wp.sportpartnersuche.eu/berliner-verkehrsbetriebe-bvg/",
                "url_view",
                "bundles/app/info_1024x1024.pdf",
                "#rrggbbaa",
                0
            ],
            [
                100,
                "infocontact",
                "Info / Kontakt",
                "",
                "http://bvg-wp.sportpartnersuche.eu/berliner-verkehrsbetriebe-bvg/",
                "url_view",
                "bundles/app/info_1024x1024.pdf",
                "#rrggbbaa",
                1
            ], [
                110,
                "events",
                "Veranstaltungen",
                "",
                "http://bvg-wp.sportpartnersuche.eu/veranstaltungen/",
                "url_view",
                "bundles/app/veranstaltungen_1024x1024.svg",
                "#rrggbbaa",
                1
            ], [
                120,
                "news",
                "Aktuelles",
                "News",
                "http://bvg-wp.sportpartnersuche.eu/news/",
                "url_view",
                "bundles/app/aktuelles_1024x1024.svg",
                "#rrggbbaa",
                1
            ], [
                130,
                "stressmanagement",
                "Stressbew\u00e4ltigung - Tipps!",
                "",
                "http://bvg-wp.sportpartnersuche.eu/stressbewaeltigung-tipps/",
                "url_view",
                "bundles/app/info_1024x1024.pdf",
                "#rrggbbaa",
                1
            ], [
                140,
                "burnoutprophylaxis",
                "Burnout Prophylaxe",
                "",
                "http://bvg-wp.sportpartnersuche.eu/burnout-prophylaxe/",
                "url_view",
                "bundles/app/info_1024x1024.pdf",
                "#rrggbbaa",
                1
            ], [
                150,
                "worklifebalance",
                "Work - Life - Balance",
                "",
                "http://bvg-wp.sportpartnersuche.eu/work-life-balance/",
                "url_view",
                "bundles/app/info_1024x1024.pdf",
                "#rrggbbaa",
                1
            ], [
                160,
                "healthynutrition",
                "Gesunde Ern\u00e4hrung",
                "",
                "http://bvg-wp.sportpartnersuche.eu/gesunde-ernaehrung/",
                "url_view",
                "bundles/app/info_1024x1024.pdf",
                "#rrggbbaa",
                1
            ], [
                170,
                "feelgoodweight",
                "Zum Wohlf\u00fchlgewicht",
                "",
                "http://bvg-wp.sportpartnersuche.eu/wegweiser-wohlfuehlgewicht/",
                "url_view",
                "bundles/app/info_1024x1024.pdf",
                "#rrggbbaa",
                1
            ], [
                180,
                "facebook",
                "Facebook",
                "",
                "https://www.facebook.com/weilwirdichlieben/",
                "url_view",
                "bundles/app/info_1024x1024.pdf",
                "#rrggbbaa",
                1
            ], [
                190,
                "twitter",
                "Twitter",
                "",
                "https://mobile.twitter.com/bvg_ubahn",
                "url_view",
                "bundles/app/info_1024x1024.pdf",
                "#rrggbbaa",
                1
            ], [
                200,
                "youtube",
                "Youtube",
                "",
                "https://www.youtube.com/channel/UCUWE7apeDoepJixzxyjP9vg",
                "url_view",
                "bundles/app/info_1024x1024.pdf",
                "#rrggbbaa",
                1
            ], [
                210,
                "legal",
                "Allgemeine Hinweise",
                "",
                "http://bvg-wp.sportpartnersuche.eu/allgemeine-informationen/",
                "url_view",
                "bundles/app/info_1024x1024.pdf",
                "#rrggbbaa",
                1
            ]
        ];

        foreach ($matrix as $row) {
            $entity = new AppMenu();
            $entity->setPriority($row[0]);
            $entity->setIdentification($row[1]);
            $entity->setTitleDe($row[2]);
            $entity->setTitleEn($row[3]);
            $entity->setDataUrl($row[4]);
            $entity->setDataType($row[5]);
            $entity->setImageSource($row[6]);
            $entity->setImageBackground($row[7]);
            $entity->setEnabled($row[8]);
            $manager->persist($entity);
            $manager->flush();
            unset($entity);
        } // end foreach
        unset($matrix);
    }

}
