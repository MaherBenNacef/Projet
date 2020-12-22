<?php

namespace CoolTravelBundle\Controller;

use CoolTravelBundle\CoolTravelBundle;
use CoolTravelBundle\Entity\Client;
use CoolTravelBundle\Entity\Reservation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Reservation controller.
 *
 * @Route("reservation")
 */
class ReservationController extends Controller
{

    ////////////////////////////////////////
    //List reservation in my hotel
    /**
     *
     *
     * @Route("/list", name="list_reservation")
     * @Method({"GET", "POST"})
     */
    public function clientsAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        if (($request)->getMethod("POST"))
        {
            $motcle=$this->getUser()->getId();
            $query=$em->createQuery(
                "SELECT r FROM CoolTravelBundle:Client c, CoolTravelBundle:Chambre ch , CoolTravelBundle:Reservation r , CoolTravelBundle:Hotel h 
                  WHERE h.id_responsable_hotel= '".$motcle."%' and ch.id_hotel=h.id and ch.id_reservation=r.id and c.id=r.client"
            );

            $reservations=$query->getResult();
        }
        return $this->render('reservation/index.html.twig', array(
            'reservations'=>$reservations
        ));
    }
////////////////////////////////////////


    ////////////////////////////////////////
    //Clients reserved in my hotel
    /**
     *
     *
     * @Route("/listClient", name="list_client")
     * @Method({"GET", "POST"})
     */
    public function reservationAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        if (($request)->getMethod("POST"))
        {
            $motcle=$this->getUser()->getId();
            $query=$em->createQuery(
                "SELECT c FROM CoolTravelBundle:Client c, CoolTravelBundle:Chambre ch , CoolTravelBundle:Reservation r , CoolTravelBundle:Hotel h 
                  WHERE h.id_responsable_hotel= '".$motcle."%' and ch.id_hotel=h.id and ch.id_reservation=r.id and c.id=r.client"
            );

            $clients=$query->getResult();
        }
        return $this->render('client/index.html.twig', array(
            'clients'=>$clients
        ));
    }
////////////////////////////////////////


    /////////////////////////////////////////////
    /**
     * Displays a form to edit an existing reservation entity.
     *
     * @Route("/facture/{id}", name="reservation_facture")
     * @Method({"GET", "POST"})
     */
    public function factureAction(Request $request, Reservation $res){
        $somme=(double)0.0;
        $em = $this->getDoctrine()->getManager();
        $chambres = $em->getRepository('CoolTravelBundle:Chambre')->findAll();
        $reservations = $em->getRepository('CoolTravelBundle:Reservation')->findAll();
        if (($request)->getMethod("POST"))
        {
            $motcle=$res->getId();
            #$motcle=$request->get('input_recherche');
            #$motcle=(int)$motcle;
            $query2=$em->createQuery(
                "SELECT r  FROM CoolTravelBundle:Chambre c , CoolTravelBundle:Reservation r,CoolTravelBundle:Client cl
                 WHERE c.id_reservation= '".$motcle."%' and r.id=c.id_reservation and r.client=cl.id"
            );
            $query=$em->createQuery(
                "SELECT c  FROM CoolTravelBundle:Chambre c , CoolTravelBundle:Reservation r,CoolTravelBundle:Client cl
                 WHERE c.id_reservation= '".$motcle."%' and r.id=c.id_reservation and r.client=cl.id"
            );
            $chambres=$query->getResult();
            $reservations=$query2->getResult();
        }
        foreach ($chambres as $chambre) {
            foreach ($reservations as $reservation)
            {
                $dure = date_diff($reservation->getDateCheckOut(), $reservation->getDateCheckIn());
                $dure= $dure->format('%d');
                break;
            }
            $somme += ($chambre->getPrix()) * $dure;
        }
        return $this->render('reservation/facture.html.twig', array(
            'chambres'=>$chambres,'somme'=>$somme
        ));
    }
    ////////////////////////////////////////////



    /**
     * Lists all reservation entities.
     *
     * @Route("/", name="reservation_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reservations = $em->getRepository('CoolTravelBundle:Reservation')->findAll();

        return $this->render('reservation/index.html.twig', array(
            'reservations' => $reservations,
        ));
    }

    /**
     * Creates a new reservation entity.
     *
     * @Route("/new", name="reservation_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $reservation = new Reservation();
        $form = $this->createForm('CoolTravelBundle\Form\ReservationType', $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reservation);
            $em->flush();

            return $this->redirectToRoute('reservation_show', array('id' => $reservation->getId()));
        }

        return $this->render('reservation/new.html.twig', array(
            'reservation' => $reservation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a reservation entity.
     *
     * @Route("/{id}", name="reservation_show")
     * @Method("GET")
     */
    public function showAction(Reservation $reservation)
    {
        $deleteForm = $this->createDeleteForm($reservation);

        return $this->render('reservation/show.html.twig', array(
            'reservation' => $reservation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing reservation entity.
     *
     * @Route("/{id}/edit", name="reservation_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Reservation $reservation)
    {
        $deleteForm = $this->createDeleteForm($reservation);
        $editForm = $this->createForm('CoolTravelBundle\Form\ReservationType', $reservation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reservation_edit', array('id' => $reservation->getId()));
        }

        return $this->render('reservation/edit.html.twig', array(
            'reservation' => $reservation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a reservation entity.
     *
     * @Route("/{id}", name="reservation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Reservation $reservation)
    {
        $form = $this->createDeleteForm($reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($reservation);
            $em->flush();
        }

        return $this->redirectToRoute('reservation_index');
    }

    /**
     * Creates a form to delete a reservation entity.
     *
     * @param Reservation $reservation The reservation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Reservation $reservation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reservation_delete', array('id' => $reservation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
