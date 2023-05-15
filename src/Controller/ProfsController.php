<?php

namespace App\Controller;

use App\Entity\Profs;
use App\Form\ProfsType;
use App\Repository\ProfsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profs")
 */
class ProfsController extends AbstractController
{
    /**
     * @Route("/", name="app_profs_index", methods={"GET"})
     */
    public function index(ProfsRepository $profsRepository): Response
    {
        return $this->render('profs/index.html.twig', [
            'profs' => $profsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_profs_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ProfsRepository $profsRepository): Response
    {
        $prof = new Profs();
        $form = $this->createForm(ProfsType::class, $prof);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profsRepository->add($prof, true);

            return $this->redirectToRoute('app_profs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('profs/new.html.twig', [
            'prof' => $prof,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_profs_show", methods={"GET"})
     */
    public function show(Profs $prof): Response
    {
        return $this->render('profs/show.html.twig', [
            'prof' => $prof,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_profs_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Profs $prof, ProfsRepository $profsRepository): Response
    {
        $form = $this->createForm(ProfsType::class, $prof);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profsRepository->add($prof, true);

            return $this->redirectToRoute('app_profs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('profs/edit.html.twig', [
            'prof' => $prof,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_profs_delete", methods={"POST"})
     */
    public function delete(Request $request, Profs $prof, ProfsRepository $profsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$prof->getId(), $request->request->get('_token'))) {
            $profsRepository->remove($prof, true);
        }

        return $this->redirectToRoute('app_profs_index', [], Response::HTTP_SEE_OTHER);
    }
}
