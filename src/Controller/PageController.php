<?php

namespace App\Controller;

use App\Form\ContactFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArtistRepository;
use App\Repository\CategoryRepository;
use App\Repository\CommandeRepository;
use App\Repository\ContactRepository;
use App\Repository\DetailRepository;
use App\Repository\DiscRepository;
use App\Repository\ProductRepository;
use App\Repository\UserRepository;

class PageController extends AbstractController
{

    // REPOSITORIES
    private $artistrepo;
    private $categoryrepo;
    private $commanderepo;
    private $contactrepo;
    private $detailrepo;
    private $discrepo;
    private $productrepo;
    private $userrepo;

    public function __construct(ArtistRepository $artistrepo, CategoryRepository $categoryrepo, CommandeRepository $commanderepo, ContactRepository $contactrepo,
    DetailRepository $detailrepo, DiscRepository $discrepo, ProductRepository $productrepo, UserRepository $userrepo)
    {
        $this->categoryrepo = $categoryrepo;
        $this->productrepo = $productrepo;
        $this->discrepo = $discrepo;
    }

    // INDEX

    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        $category = $this->categoryrepo->findAll();
        $product = $this->productrepo->findBy(array(), null, 6, null);
        return $this->render('page/index.html.twig', [
            'controller_name' => 'PageController',
            // variable qui stocke un tableau d'objet;
            'categorys' => $category ,
            'products' => $product
        ]);
    }

    // CATEGORY

    #[Route('/category', name: 'app_category')]
    public function category(): Response
    {
        $category = $this->categoryrepo->findAll();
        $product_all = $this->productrepo->findAll();
        return $this->render('page/category.html.twig', [
            'controller_name' => 'PageController',
            // variable qui stocke un tableau d'objet;
            'categorys' => $category ,
            'products_all' => $product_all ,
        ]);
    }

    // CONTACT
    #[Route('/contact', name: 'app_contact')]
    public function contact(Request $request): Response
    {
        $form = $this->createForm(ContactFormType::class);

        return $this->render('page/contact.html.twig', [
                'form' => $form
        ]);
}
}