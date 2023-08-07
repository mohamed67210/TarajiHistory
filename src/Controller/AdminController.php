<?php

namespace App\Controller;

use App\Entity\EvenementHistorique;
use App\Form\EventType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/admin', name: 'admin_')]
class AdminController extends AbstractController
{
    // #[Route('/', name: 'app_admin')]
    // public function index(): Response
    // {
    //     return $this->render('admin/index.html.twig', [
    //         'controller_name' => 'AdminController',
    //     ]);
    // }
    #[Route('/', name: 'app_admin')]
    public function addEvent(ManagerRegistry $doctrine,Request $request,SluggerInterface $slugger,EvenementHistorique $evenementHistorique= null): Response
    {
        $evenementHistorique = new EvenementHistorique;
        dump($evenementHistorique);
        $form = $this->createForm(EventType::class,$evenementHistorique);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            // upload video et miniature
            $uploadedFile = $form['video']->getData();
            // dd($uploadedFile);
            if ($uploadedFile) {
                $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $uploadedFile->guessExtension();
                // dd($newFilename);
                   // Move the file to the directory where Programme images are stored
                   try {
                    $uploadedFile->move(
                        $this->getParameter('eventVideo_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }
                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
                $evenementHistorique->setVideo(
                    $newFilename
                );
            }
            $event = $form->getData();
            $entityManager = $doctrine->getManager();
            $entityManager->persist($event);
            $entityManager->flush();
            dump($event);
            return $this->redirectToRoute('admin_app_admin');
        }
        return $this->render('admin/index.html.twig', [
            'formEvent' => $form->createView()
        ]);
    }
}
