<?php

namespace CoolTravelBundle\Controller;

use CoolTravelBundle\Entity\Hotel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Hotel controller.
 *
 * @Route("hotel")
 */
class HotelController extends Controller
{
    /**
     * Liste des hotel de responsable.
     *
     * @Route("/test", name="test")
     * @Method({"GET", "POST"})
     */
    public function listHotelAction(){
        $em = $this->getDoctrine()->getManager();
        $hotels = $em->getRepository('CoolTravelBundle:Hotel')->findAll();
        $responsable=$this->getUser()->getId();

        $query=$em->createQuery(
            "SELECT m FROM CoolTravelBundle:Hotel m WHERE m.id_responsable_hotel = '".$responsable."%'"
        );
        $hotels=$query->getResult();

        return $this->render('responsablehotel/listhotel.html.twig', array(
            'hotels'=>$hotels
        ));
    }




    //recherche
    /**
     * Recherche admin.
     *
     * @Route("/recherche", name="hotel_recherche")
     * @Method({"GET", "POST"})
     */
    public function rechercheAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $hotels = $em->getRepository('CoolTravelBundle:Hotel')->findAll();
        if (($request)->getMethod("POST"))
        {
            $motcle=$request->get('input_recherche');
            $query=$em->createQuery(
                "SELECT m FROM CoolTravelBundle:Hotel m WHERE m.nom_Hotel LIKE '".$motcle."%'"
            );
            $hotels=$query->getResult();
        }
        return $this->render('hotel/rechercheChambre.html.twig', array(
            'hotels'=>$hotels
        ));
    }




    /**
     * Lists all hotel entities.
     *
     * @Route("/", name="hotel_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $hotels = $em->getRepository('CoolTravelBundle:Hotel')->findAll();

        return $this->render('hotel/index.html.twig', array(
            'hotels' => $hotels,
        ));
    }

    /**
     * Creates a new hotel entity.
     *
     * @Route("/new", name="hotel_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $hotel = new Hotel();
        $form = $this->createForm('CoolTravelBundle\Form\HotelType', $hotel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($hotel);
            $em->flush();

            return $this->redirectToRoute('hotel_show', array('id' => $hotel->getId()));
        }

        return $this->render('hotel/new.html.twig', array(
            'hotel' => $hotel,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a hotel entity.
     *
     * @Route("/{id}", name="hotel_show")
     * @Method("GET")
     */
    public function showAction(Hotel $hotel)
    {
        $deleteForm = $this->createDeleteForm($hotel);

        return $this->render('hotel/show.html.twig', array(
            'hotel' => $hotel,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    //////////////////////////////////////
    /**
     * Finds and displays a hotel entity.
     *
     * @Route("/{id}/chambre", name="list_chamrbe")
     * @Method("GET")
     */
    public function chambreAction(Hotel $hotel)
    {
        $em = $this->getDoctrine()->getManager();
        $chambres = $em->getRepository('CoolTravelBundle:Chambre')->findAll();
        $id=$hotel->getId();
        $query=$em->createQuery(
            "SELECT m FROM CoolTravelBundle:Chambre m WHERE m.id_reservation IS NULL and m.id_hotel = '".$id."%'"
        );
        $chambres=$query->getResult();
        return $this->render('chambre/list.html.twig', array(
            'chambres'=>$chambres
        ));
    }
    /////////////////////////////////

    /**
     * Displays a form to edit an existing hotel entity.
     *
     * @Route("/{id}/edit", name="hotel_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Hotel $hotel)
    {
        $deleteForm = $this->createDeleteForm($hotel);
        $editForm = $this->createForm('CoolTravelBundle\Form\HotelType', $hotel);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('hotel_edit', array('id' => $hotel->getId()));
        }

        return $this->render('hotel/edit.html.twig', array(
            'hotel' => $hotel,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a hotel entity.
     *
     * @Route("/{id}", name="hotel_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Hotel $hotel)
    {
        $form = $this->createDeleteForm($hotel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($hotel);
            $em->flush();
        }

        return $this->redirectToRoute('hotel_index');
    }

    /**
     * Creates a form to delete a hotel entity.
     *
     * @param Hotel $hotel The hotel entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Hotel $hotel)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('hotel_delete', array('id' => $hotel->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
