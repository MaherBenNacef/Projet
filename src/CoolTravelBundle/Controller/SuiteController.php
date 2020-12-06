<?php

namespace CoolTravelBundle\Controller;

use CoolTravelBundle\Entity\Suite;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Suite controller.
 *
 * @Route("suite")
 */
class SuiteController extends Controller
{
    /**
     * Lists all suite entities.
     *
     * @Route("/", name="suite_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $suites = $em->getRepository('CoolTravelBundle:Suite')->findAll();

        return $this->render('suite/index.html.twig', array(
            'suites' => $suites,
        ));
    }

    /**
     * Creates a new suite entity.
     *
     * @Route("/new", name="suite_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $suite = new Suite();
        $form = $this->createForm('CoolTravelBundle\Form\SuiteType', $suite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($suite);
            $em->flush();

            return $this->redirectToRoute('suite_show', array('id' => $suite->getId()));
        }

        return $this->render('suite/new.html.twig', array(
            'suite' => $suite,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a suite entity.
     *
     * @Route("/{id}", name="suite_show")
     * @Method("GET")
     */
    public function showAction(Suite $suite)
    {
        $deleteForm = $this->createDeleteForm($suite);

        return $this->render('suite/show.html.twig', array(
            'suite' => $suite,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing suite entity.
     *
     * @Route("/{id}/edit", name="suite_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Suite $suite)
    {
        $deleteForm = $this->createDeleteForm($suite);
        $editForm = $this->createForm('CoolTravelBundle\Form\SuiteType', $suite);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('suite_edit', array('id' => $suite->getId()));
        }

        return $this->render('suite/edit.html.twig', array(
            'suite' => $suite,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a suite entity.
     *
     * @Route("/{id}", name="suite_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Suite $suite)
    {
        $form = $this->createDeleteForm($suite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($suite);
            $em->flush();
        }

        return $this->redirectToRoute('suite_index');
    }

    /**
     * Creates a form to delete a suite entity.
     *
     * @param Suite $suite The suite entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Suite $suite)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('suite_delete', array('id' => $suite->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
