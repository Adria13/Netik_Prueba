<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CentroMedico;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Centromedico controller.
 *
 * @Route("centromedico")
 */
class CentroMedicoController extends Controller
{
    /**
     * Lists all centroMedico entities.
     *
     * @Route("/", name="centromedico_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $centroMedicos = $em->getRepository('AppBundle:CentroMedico')->findAll();

        return $this->render('centromedico/index.html.twig', array(
            'centroMedicos' => $centroMedicos,
        ));
    }

    /**
     * Creates a new centroMedico entity.
     *
     * @Route("/new", name="centromedico_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $centroMedico = new Centromedico();
        $form = $this->createForm('AppBundle\Form\CentroMedicoType', $centroMedico);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($centroMedico);
            $em->flush();

            return $this->redirectToRoute('centromedico_show', array('id' => $centroMedico->getId()));
        }

        return $this->render('centromedico/new.html.twig', array(
            'centroMedico' => $centroMedico,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a centroMedico entity.
     *
     * @Route("/{id}", name="centromedico_show")
     * @Method("GET")
     */
    public function showAction(CentroMedico $centroMedico)
    {
        $deleteForm = $this->createDeleteForm($centroMedico);

        return $this->render('centromedico/show.html.twig', array(
            'centroMedico' => $centroMedico,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing centroMedico entity.
     *
     * @Route("/{id}/edit", name="centromedico_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CentroMedico $centroMedico)
    {
        $deleteForm = $this->createDeleteForm($centroMedico);
        $editForm = $this->createForm('AppBundle\Form\CentroMedicoType', $centroMedico);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('centromedico_edit', array('id' => $centroMedico->getId()));
        }

        return $this->render('centromedico/edit.html.twig', array(
            'centroMedico' => $centroMedico,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a centroMedico entity.
     *
     * @Route("/{id}", name="centromedico_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CentroMedico $centroMedico)
    {
        $form = $this->createDeleteForm($centroMedico);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($centroMedico);
            $em->flush();
        }

        return $this->redirectToRoute('centromedico_index');
    }

    /**
     * Creates a form to delete a centroMedico entity.
     *
     * @param CentroMedico $centroMedico The centroMedico entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CentroMedico $centroMedico)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('centromedico_delete', array('id' => $centroMedico->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
