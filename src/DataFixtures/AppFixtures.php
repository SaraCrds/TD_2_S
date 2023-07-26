<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Category;
use App\Entity\Product;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $category1 = new Category();

        $category1->setName("Test01");
        $category1->setImage("burger_cat.jpg");
        $category1->setActive(True);
            
        $manager->persist($category1);

        $category2 = new Category();

        $category2->setName("Test02");
        $category2->setImage("pasta_cat.jpg");
        $category2->setActive(True);
            
        $manager->persist($category2);
            
        $product1 = new Product();
        $product1->setName("TestP01");
        $product1->setPrice(10.5);
        $product1->setImage("cesar_salad.jpg");
        $product1->setDescription("blablablabla test");
        $product1->setActive(True);
        $manager->persist($product1);
        $manager->flush();

        $product2 = new Product();
        $product2->setName("TestP02");
        $product2->setPrice(16);
        $product2->setImage("pizza-salmon.png");
        $product2->setDescription("blablablabla test test blablabla");
        $product2->setActive(True);
        $manager->persist($product2);
        $manager->flush();
            
        $product1->setCategory($category1);
        $product2->setCategory($category2);

        $manager->flush();
    }
}
