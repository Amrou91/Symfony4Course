<?php

namespace App\Controller;

use App\Entity\Asignaturas;
use App\Form\AsignaturasType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/asignaturas")
 */
class AsignaturasController extends AbstractController
{
    /**
     * @Route("/", name="asignaturas_index", methods="GET")
     */
    public function index(): Response
    {
        $asignaturas = $this->getDoctrine()
            ->getRepository(Asignaturas::class)
            ->findAll();

        return $this->render('asignaturas/index.html.twig', ['asignaturas' => $asignaturas]);
    }

    /**
     * @Route("/new", name="asignaturas_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $asignatura = new Asignaturas();
        $form = $this->createForm(AsignaturasType::class, $asignatura);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($asignatura);
            $em->flush();

            return $this->redirectToRoute('asignaturas_index');
        }

        return $this->render('asignaturas/new.html.twig', [
            'asignatura' => $asignatura,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="asignaturas_show", methods="GET")
     */
    public function show(Asignaturas $asignatura): Response
    {
        return $this->render('asignaturas/show.html.twig', ['asignatura' => $asignatura]);
    }

    /**
     * @Route("/{id}/edit", name="asignaturas_edit", methods="GET|POST")
     */
    public function edit(Request $request, Asignaturas $asignatura): Response
    {
        $form = $this->createForm(AsignaturasType::class, $asignatura);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('asignaturas_index', ['id' => $asignatura->getId()]);
        }

        return $this->render('asignaturas/edit.html.twig', [
            'asignatura' => $asignatura,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="asignaturas_delete", methods="DELETE")
     */
    public function delete(Request $request, Asignaturas $asignatura): Response
    {
        if ($this->isCsrfTokenValid('delete'.$asignatura->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($asignatura);
            $em->flush();
        }

        return $this->redirectToRoute('asignaturas_index');
    }
}
