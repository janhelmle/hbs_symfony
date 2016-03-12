<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\AppMenu;

class LoadAppMenuData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $menuRow1 = new AppMenu();
        $menuRow1->setPriority(100);
        $menuRow1->setIdentification("news");
        $menuRow1->setTitleDe("Aktuelles");
        $menuRow1->setTitleEn("News");
        $menuRow1->setDataUrl("http://bvg-wp.sportpartnersuche.eu/news/");
        $menuRow1->setDataType("url_view");
        $menuRow1->setImageSource("content/images/news.svg");
        $menuRow1->setImageBackgroundColor("#123456");
        $menuRow1->setImageBackgroundOpacity(00);
        $menuRow1->setEnabled(1);
            
        $manager->persist($menuRow1);
        $manager->flush();
    }
}


