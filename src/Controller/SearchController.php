<?php

namespace App\Controller;

use App\Repository\MarquesRepository;
use App\Repository\VoituresRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'app_search')]
    public function index(): Response
    {
        return $this->render('search/index.html.twig', [
            'controller_name' => 'SearchController',
        ]);
    }

    public function searchBar()
    {
        $form = $this->createFormBuilder()
            ->setAction($this->generateUrl('handleSearch'))
            ->add('query', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Entrez un mot-clé'
                ]
            ])
            ->add('recherche', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ])
        ->getForm();
        return $this->render('search/searchBar.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @param Request $request
    */
    #[Route('/handleSearch', name: 'handleSearch')]
    public function handleSearch(Request $request, VoituresRepository $repoVoiture, MarquesRepository $repoMarque)
    {
        $query = $request->request->all('form')['query'];
        // dd($query);
        if($query) {
            $voitures = $repoVoiture->findVoitureByName($query);
            $marque = $repoMarque->findMarqueByName($query);
        }

        return $this->render('search/index.html.twig', [
            'voitures' => $voitures,
            // 'marque' => $marque
        ]);
    }
}
