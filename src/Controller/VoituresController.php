<?php

namespace App\Controller;

use App\Entity\Voitures;
use App\Form\VoituresType;
use App\Entity\ImagesVoitures;
use App\Service\VoitureService;
use App\Repository\MarquesRepository;
use App\Repository\VoituresRepository;
use App\Repository\ImagesVoituresRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/voitures')]
class VoituresController extends AbstractController
{
    #[Route('/', name: 'voitures_index', methods: ['GET'])]
    public function index(MarquesRepository $marques, VoitureService $voitureService): Response
    {
        return $this->render('voitures/index.html.twig', [
            'marques' => $marques->findAll(),
            'voitures' => $voitureService->getPaginated(),
        ]);
    }

    #[Route('/new', name: 'voitures_create', methods: ['GET', 'POST'])]
    #[IsGranted("ROLE_USER")]
    public function new(Request $request, VoituresRepository $voituresRepository): Response
    {
        $voiture = new Voitures();
        $form = $this->createForm(VoituresType::class, $voiture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // ? upload de l'image //
            $images = $form->get('images')->getData();
            
            foreach($images as $image){
                // ? modification du nom du fichier et deplacement dans le dossier images //
                $file = md5(uniqid()) . '.' .$image->guessExtension();
                $image->move(
                    $this->getParameter('images_directory'),
                    $file
                );
                // ! enregistrement de l'image dans la table Image et link avec la voiture associe //
                $img = new ImagesVoitures();
                $img->setImageName($file);
                $voiture->addImagesVoiture($img);
            }
            // ! link avec le user connecte et enregistrement de la voiture via le repo //
            $voiture->setUser($this->getUser());
            $voituresRepository->save($voiture, true);

            $this->addFlash(
                'success',
                "La voiture <strong>{$voiture->getMarques()} {$voiture->getModelName()}</strong> a bien été ajoutée"
            );
            return $this->redirectToRoute('voitures_index', [], Response::HTTP_SEE_OTHER);
        }
        
        
        return $this->renderForm('voitures/new.html.twig', [
            'voiture' => $voiture,
            'form' => $form,
        ]);
    }

    #[Route('/{slug}', name: 'voiture_show', methods: ['GET'])]
    public function voitureShow(Voitures $voitures): Response
    {
        return $this->render('voitures/show.html.twig', [
            'voiture' => $voitures
        ]);
        
    }

    #[Route('/{slug}/edit', name: 'voitures_edit', methods: ['GET', 'POST'])]
    #[Security("(is_granted('ROLE_USER') and user === voiture.getUser()) or is_granted('ROLE_ADMIN')", message:"Cette annonce ne vous appartient pas, vous ne pouvez pas la modifier")]
    public function edit(Request $request, Voitures $voiture, VoituresRepository $voituresRepository): Response
    {
        $form = $this->createForm(VoituresType::class, $voiture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // ? verification et upload des images //
            $images = $form->get('images')->getData();
            foreach($images as $image){
                // ? modification du nom du fichier et deplacement dans le dossier images //
                $file = md5(uniqid()) . '.' .$image->guessExtension();
                $image->move(
                    $this->getParameter('images_directory'),
                    $file
                );

                // ! enregistrement de l'image dans la table Image et link avec la voiture associe //
                $img = new ImagesVoitures();
                $img->setImageName($file);
                $voiture->addImagesVoiture($img);
            }

            // ! enregistrement de la voiture via le repo //
            $voituresRepository->save($voiture, true);
            return $this->redirectToRoute('voitures_index', [], Response::HTTP_SEE_OTHER);
        }

        $this->addFlash(
            'success',
            "La voiture <strong>{$voiture->getMarques()} {$voiture->getModelName()}</strong> a bien été modifiée"
        );
        return $this->renderForm('voitures/edit.html.twig', [
            'voiture' => $voiture,
            'form' => $form,
        ]);
    }

    #[Route('delete/{id}', name: 'voitures_delete', methods: ['POST'])]
    #[Security("(is_granted('ROLE_USER') and user === voiture.getUser()) or is_granted('ROLE_ADMIN')", message:"Cette annonce ne vous appartient pas, vous ne pouvez pas la modifier")]
    public function delete(Request $request, Voitures $voiture, VoituresRepository $voituresRepository): Response
    {
        // ! recuperation du token et verification de la validite //
        if ($this->isCsrfTokenValid('delete'.$voiture->getId(), $request->request->get('_token'))) {
            // ! recuperation de l'element via l'id et suppression //
            $voituresRepository->remove($voiture, true);
        }

        // redirection sur la meme page //
        $referer = $request->headers->get('referer');
        return new RedirectResponse($referer);
    }

    
    #[Route('deleteImage/{id}', name: 'voitures_delete_img', methods: ['GET','POST'])]
    // #[Security("(is_granted('ROLE_USER') and user === voiture.getUser()) or is_granted('ROLE_ADMIN')", message:"Cette annonce ne vous appartient pas, vous ne pouvez pas la modifier")]
    public function deleteImage(ImagesVoitures $image, Request $request, ImagesVoituresRepository $imagesVoituresRepository){
        // $data = json_decode($request->getContent(), true);
        // $data = json_decode($request->getContent(), true);
        
        // ! recuperation du token et verification de la validite //
        if($this->isCsrfTokenValid('delete'.$image->getId(), $request->request->get('_token'))){
            // ! recuperation du nom de l'image et supprssion du dossier image //
            $nom = $image->getImageName();
            unlink($this->getParameter('images_directory').'/'.$nom);
            
            // ! supprime l'entrée de la base //
            $imagesVoituresRepository->remove($image, true);  
            
            //redirection sur la meme page //
            $referer = $request->headers->get('referer');
            return new RedirectResponse($referer);
            
        }else{
            dd($request->request->get('_token'));
            // return new JsonResponse(['error' => 'Token Invalide'], 400);
        }
    }
    
}
