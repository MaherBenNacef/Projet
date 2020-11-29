<?php

namespace CoolTravelBundle\Controller;

use CoolTravelBundle\Entity\ResponsableHotel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Responsablehotel controller.
 *
 * @Route("responsablehotel")
 */
class ResponsableHotelController extends Controller
{
    /**
     * Lists all responsableHotel entities.
     *
     * @Route("/", name="responsablehotel_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $responsableHotels = $em->getRepository('CoolTravelBundle:ResponsableHotel')->findAll();

        return $this->render('responsablehotel/index.html.twig', array(
            'responsableHotels' => $responsableHotels,
        ));
    }

    /**
     * Creates a new responsableHotel entity.
     *
     * @Route("/new", name="responsablehotel_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $responsableHotel = new Responsablehotel();
        $form = $this->createForm('CoolTravelBundle\Form\ResponsableHotelType', $responsableHotel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($responsableHotel);
            $em->flush();

            return $this->redirectToRoute('responsablehotel_show', array('Id_Responsable' => $responsableHotel->getIdResponsable()));
        }

        return $this->render('responsablehotel/new.html.twig', array(
            'responsableHotel' => $responsableHotel,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a responsableHotel entity.
     *
     * @Route("/{Id_Responsable}", name="responsablehotel_show")
     * @Method("GET")
     */
    public function showAction(ResponsableHotel $responsableHotel)
    {
        $deleteForm = $this->createDeleteForm($responsableHotel);

        return $this->render('responsablehotel/show.html.twig', array(
            'responsableHotel' => $responsableHotel,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing responsableHotel entity.
     *
     * @Route("/{Id_Responsable}/edit", name="responsablehotel_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ResponsableHotel $responsableHotel)
    {
        $deleteForm = $this->createDeleteForm($responsableHotel);
        $editForm = $this->createForm('CoolTravelBundle\Form\ResponsableHotelType', $responsableHotel);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('responsablehotel_edit', array('Id_Responsable' => $responsableHotel->getIdResponsable()));
        }

        return $this->render('responsablehotel/edit.html.twig', array(
            'responsableHotel' => $responsableHotel,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a responsableHotel entity.
     *
     * @Route("/{Id_Responsable}", name="responsablehotel_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ResponsableHotel $responsableHotel)
    {
        $form = $this->createDeleteForm($responsableHotel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($responsableHotel);
            $em->flush();
        }

        return $this->redirectToRoute('responsablehotel_index');
    }

    /**
     * Creates a form to delete a responsableHotel entity.
     *
     * @param ResponsableHotel $responsableHotel The responsableHotel entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ResponsableHotel $responsableHotel)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('responsablehotel_delete', array('Id_Responsable' => $responsableHotel->getIdResponsable())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
