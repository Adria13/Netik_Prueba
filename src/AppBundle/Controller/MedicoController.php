<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Medico;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Medico controller.
 *
 * @Route("medico")
 */
class MedicoController extends Controller
{
    /**
     * Lists all medico entities.
     *
     * @Route("/", name="medico_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $medicos = $em->getRepository('AppBundle:Medico')->findAll();

        return $this->render('medico/index.html.twig', array(
            'medicos' => $medicos,
        ));
    }

    /**
     * Creates a new medico entity.
     *
     * @Route("/new", name="medico_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $medico = new Medico();
        $form = $this->createForm('AppBundle\Form\MedicoType', $medico);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($medico);
            $em->flush();

            return $this->redirectToRoute('medico_show', array('id' => $medico->getId()));
        }

        return $this->render('medico/new.html.twig', array(
            'medico' => $medico,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a medico entity.
     *
     * @Route("/{id}", name="medico_show")
     * @Method("GET")
     */
    public function showAction(Medico $medico)
    {
        $deleteForm = $this->createDeleteForm($medico);

        return $this->render('medico/show.html.twig', array(
            'medico' => $medico,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing medico entity.
     *
     * @Route("/{id}/edit", name="medico_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Medico $medico)
    {
        $deleteForm = $this->createDeleteForm($medico);
        $editForm = $this->createForm('AppBundle\Form\MedicoType', $medico);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('medico_edit', array('id' => $medico->getId()));
        }

        return $this->render('medico/edit.html.twig', array(
            'medico' => $medico,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a medico entity.
     *
     * @Route("/{id}", name="medico_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Medico $medico)
    {
        $form = $this->createDeleteForm($medico);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($medico);
            $em->flush();
        }

        return $this->redirectToRoute('medico_index');
    }

    /**
     * Creates a form to delete a medico entity.
     *
     * @param Medico $medico The medico entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Medico $medico)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('medico_delete', array('id' => $medico->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
