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



    ////////////////////////////////////////
    //Clients reserved in my hotel
    /**
     *
     *
     * @Route("/fidele", name="client_fidele")
     * @Method({"GET", "POST"})
     */
    public function fibeleAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        if (($request)->getMethod("POST"))
        {
            $motcle=$this->getUser()->getId();
            $query=$em->createQuery(
                "SELECT c FROM CoolTravelBundle:Client c, CoolTravelBundle:Chambre ch , CoolTravelBundle:Reservation r , CoolTravelBundle:Hotel h 
                  WHERE h.id_responsable_hotel= '".$motcle."%' and ch.id_hotel=h.id and ch.id_reservation=r.id and c.id=r.client"
            );

            $query2=$em->createQuery(
                "SELECT r FROM CoolTravelBundle:Reservation r"
            );

            $clients=$query->getResult();
            $resrevations=$query2->getResult();
        }
        $max=0;
        $c=null;
        foreach ($clients as $client)
        {
            $nb=0;
            foreach ($resrevations as $resrevation)
            {
                if ($resrevation->getClient()->getId()==$client->getId())
                {
                    $nb+=1;
                }
            }
            if ($nb>$max){
                $max=$nb;
                $c=$client;
            }
        }
        return $this->render('client/fidele.html.twig', array(
            'client'=>$c
        ));
    }
////////////////////////////////////////




/////////////////////////////////////////
    /**
     *
     *
     * @Route("/list", name="responsable_list")
     * @Method({"GET", "POST"})
     */
    public function listAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        if (($request)->getMethod("POST"))
        {
            $motcle="ROLE_RESPONSABLE";
            $query=$em->createQuery(
                "SELECT m FROM CoolTravelBundle:ResponsableHotel m WHERE m.roles like '%".$motcle."%'"
            );
            $responsableHotels=$query->getResult();
        }
        return $this->render('responsablehotel/index.html.twig', array(
            'responsableHotels'=>$responsableHotels
        ));
    }
////////////////////////////////////////

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

            return $this->redirectToRoute('responsablehotel_show', array('id' => $responsableHotel->getId()));
        }

        return $this->render('responsablehotel/new.html.twig', array(
            'responsableHotel' => $responsableHotel,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a responsableHotel entity.
     *
     * @Route("/{id}", name="responsablehotel_show")
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
     * @Route("/{id}/edit", name="responsablehotel_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ResponsableHotel $responsableHotel)
    {
        $deleteForm = $this->createDeleteForm($responsableHotel);
        $editForm = $this->createForm('CoolTravelBundle\Form\ResponsableHotelType', $responsableHotel);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('responsablehotel_edit', array('id' => $responsableHotel->getId()));
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
     * @Route("/{id}", name="responsablehotel_delete")
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
            ->setAction($this->generateUrl('responsablehotel_delete', array('id' => $responsableHotel->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
