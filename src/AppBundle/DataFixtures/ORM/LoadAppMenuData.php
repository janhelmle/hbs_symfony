<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\AppMenu;

class LoadAppMenuData implements FixtureInterface {

    public function load(ObjectManager $manager) {
        $menuRow0 = new AppMenu();
        $menuRow0->setPriority(0);
        $menuRow0->setIdentification("prototype");
        $menuRow0->setTitleDe("Prototyp");
        $menuRow0->setTitleEn("Prototype");
        $menuRow0->setDataUrl("http://bvg-wp.sportpartnersuche.eu/berliner-verkehrsbetriebe-bvg/");
        $menuRow0->setDataType("url_view");
        $menuRow0->setImageSource("content/images/news.svg");
        $menuRow0->setImageBackground("#rrggbbaa");
        $menuRow0->setEnabled(FALSE);
        $manager->persist($menuRow0);
        $manager->flush();

        $menuRow1 = new AppMenu();
        $menuRow1->setPriority(100);
        $menuRow1->setIdentification("infocontact");
        $menuRow1->setTitleDe("Info / Kontakt");
        $menuRow1->setTitleEn("");
        $menuRow1->setDataUrl("http://bvg-wp.sportpartnersuche.eu/berliner-verkehrsbetriebe-bvg/");
        $menuRow1->setDataType("url_view");
        $menuRow1->setImageSource("content/images/news.svg");
        $menuRow1->setImageBackground("#rrggbbaa");
        $menuRow1->setEnabled(1);
        $manager->persist($menuRow1);
        $manager->flush();

        $menuRow2 = new AppMenu();
        $menuRow2->setPriority(110);
        $menuRow2->setIdentification("events");
        $menuRow2->setTitleDe("Veranstaltungen");
        $menuRow2->setTitleEn("");
        $menuRow2->setDataUrl("http://bvg-wp.sportpartnersuche.eu/veranstaltungen/");
        $menuRow2->setDataType("url_view");
        $menuRow2->setImageSource("content/images/news.svg");
        $menuRow2->setImageBackground("#rrggbbaa");
        $menuRow2->setEnabled(1);
        $manager->persist($menuRow2);
        $manager->flush();

        $menuRow3 = new AppMenu();
        $menuRow3->setPriority(120);
        $menuRow3->setIdentification("news");
        $menuRow3->setTitleDe("Aktuelles");
        $menuRow3->setTitleEn("News");
        $menuRow3->setDataUrl("http://bvg-wp.sportpartnersuche.eu/news/");
        $menuRow3->setDataType("url_view");
        $menuRow3->setImageSource("content/images/news.svg");
        $menuRow3->setImageBackground("#rrggbbaa");
        $menuRow3->setEnabled(1);
        $manager->persist($menuRow3);
        $manager->flush();

        $menuRow4 = new AppMenu();
        $menuRow4->setPriority(130);
        $menuRow4->setIdentification("stressmanagement");
        $menuRow4->setTitleDe("Stressbew\u00e4ltigung - Tipps!");
        $menuRow4->setTitleEn("");
        $menuRow4->setDataUrl("http://bvg-wp.sportpartnersuche.eu/stressbewaeltigung-tipps/");
        $menuRow4->setDataType("url_view");
        $menuRow4->setImageSource("content/images/news.svg");
        $menuRow4->setImageBackground("#rrggbbaa");
        $menuRow4->setEnabled(1);
        $manager->persist($menuRow4);
        $manager->flush();

        $menuRow5 = new AppMenu();
        $menuRow5->setPriority(140);
        $menuRow5->setIdentification("burnoutprophylaxis");
        $menuRow5->setTitleDe("Burnout Prophylaxe");
        $menuRow5->setTitleEn("");
        $menuRow5->setDataUrl("http://bvg-wp.sportpartnersuche.eu/burnout-prophylaxe/");
        $menuRow5->setDataType("url_view");
        $menuRow5->setImageSource("content/images/news.svg");
        $menuRow5->setImageBackground("#rrggbbaa");
        $menuRow5->setEnabled(1);
        $manager->persist($menuRow5);
        $manager->flush();

        $menuRow6 = new AppMenu();
        $menuRow6->setPriority(150);
        $menuRow6->setIdentification("worklifebalance");
        $menuRow6->setTitleDe("Work - Life - Balance");
        $menuRow6->setTitleEn("");
        $menuRow6->setDataUrl("http://bvg-wp.sportpartnersuche.eu/work-life-balance/");
        $menuRow6->setDataType("url_view");
        $menuRow6->setImageSource("content/images/news.svg");
        $menuRow6->setImageBackground("#rrggbbaa");
        $menuRow6->setEnabled(1);
        $manager->persist($menuRow6);
        $manager->flush();

        $menuRow7 = new AppMenu();
        $menuRow7->setPriority(160);
        $menuRow7->setIdentification("healthynutrition");
        $menuRow7->setTitleDe("Gesunde Ern\u00e4hrung");
        $menuRow7->setTitleEn("");
        $menuRow7->setDataUrl("http://bvg-wp.sportpartnersuche.eu/gesunde-ernaehrung/");
        $menuRow7->setDataType("url_view");
        $menuRow7->setImageSource("content/images/news.svg");
        $menuRow7->setImageBackground("#rrggbbaa");
        $menuRow7->setEnabled(1);
        $manager->persist($menuRow7);
        $manager->flush();

        $menuRow8 = new AppMenu();
        $menuRow8->setPriority(170);
        $menuRow8->setIdentification("feelgoodweight");
        $menuRow8->setTitleDe("Zum Wohlf\u00fchlgewicht");
        $menuRow8->setTitleEn("");
        $menuRow8->setDataUrl("http://bvg-wp.sportpartnersuche.eu/wegweiser-wohlfuehlgewicht/");
        $menuRow8->setDataType("url_view");
        $menuRow8->setImageSource("content/images/news.svg");
        $menuRow8->setImageBackground("#rrggbbaa");
        $menuRow8->setEnabled(1);
        $manager->persist($menuRow8);
        $manager->flush();

        $menuRow9 = new AppMenu();
        $menuRow9->setPriority(180);
        $menuRow9->setIdentification("facebook");
        $menuRow9->setTitleDe("Facebook");
        $menuRow9->setTitleEn("");
        $menuRow9->setDataUrl("https://www.facebook.com/weilwirdichlieben/");
        $menuRow9->setDataType("url_view");
        $menuRow9->setImageSource("content/images/news.svg");
        $menuRow9->setImageBackground("#rrggbbaa");
        $menuRow9->setEnabled(1);
        $manager->persist($menuRow9);
        $manager->flush();

        $menuRow10 = new AppMenu();
        $menuRow10->setPriority(190);
        $menuRow10->setIdentification("twitter");
        $menuRow10->setTitleDe("Twitter");
        $menuRow10->setTitleEn("");
        $menuRow10->setDataUrl("https://mobile.twitter.com/bvg_ubahn");
        $menuRow10->setDataType("url_view");
        $menuRow10->setImageSource("content/images/news.svg");
        $menuRow10->setImageBackground("#rrggbbaa");
        $menuRow10->setEnabled(1);
        $manager->persist($menuRow10);
        $manager->flush();

        $menuRow11 = new AppMenu();
        $menuRow11->setPriority(200);
        $menuRow11->setIdentification("youtube");
        $menuRow11->setTitleDe("Youtube");
        $menuRow11->setTitleEn("");
        $menuRow11->setDataUrl("https://www.youtube.com/channel/UCUWE7apeDoepJixzxyjP9vg");
        $menuRow11->setDataType("url_view");
        $menuRow11->setImageSource("content/images/news.svg");
        $menuRow11->setImageBackground("#rrggbbaa");
        $menuRow11->setEnabled(1);
        $manager->persist($menuRow11);
        $manager->flush();

        $menuRow12 = new AppMenu();
        $menuRow12->setPriority(210);
        $menuRow12->setIdentification("legal");
        $menuRow12->setTitleDe("Allgemeine Hinweise");
        $menuRow12->setTitleEn("");
        $menuRow12->setDataUrl("http://bvg-wp.sportpartnersuche.eu/allgemeine-informationen/");
        $menuRow12->setDataType("url_view");
        $menuRow12->setImageSource("content/images/news.svg");
        $menuRow12->setImageBackground("#rrggbbaa");
        $menuRow12->setEnabled(1);
        $manager->persist($menuRow12);
        $manager->flush();
    }

}
