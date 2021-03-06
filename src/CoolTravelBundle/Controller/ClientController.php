<?php

namespace CoolTravelBundle\Controller;

use CoolTravelBundle\Entity\Client;
use Doctrine\ORM\Mapping\Id;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Client controller.
 *
 * @Route("client")
 */
class ClientController extends Controller
{
    /////////////////////////////////////////
    /**
     *
     *
     * @Route("/listReservation", name="reservation_list")
     * @Method({"GET", "POST"})
     */
    public function listReservationAction(){
        $em = $this->getDoctrine()->getManager();

            $motcle=$this->getUser()->getId();
            $query=$em->createQuery(
                "SELECT m FROM CoolTravelBundle:Reservation m WHERE m.id like '%".$motcle."%'"
            );
            $reservations=$query->getResult();

        return $this->render('reservation/index.html.twig', array(
            'reservations'=>$reservations
        ));
    }
////////////////////////////////////////



    /////////////////////////////////////////
    /**
     *
     *
     * @Route("/listClient", name="client_list")
     * @Method({"GET", "POST"})
     */
    public function listAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        if (($request)->getMethod("POST"))
        {
            $motcle="ROLE_CLIENT";
            $query=$em->createQuery(
                "SELECT m FROM CoolTravelBundle:ResponsableHotel m WHERE m.roles like '%".$motcle."%'"
            );
            $clients=$query->getResult();
        }
        return $this->render('client/index.html.twig', array(
            'clients'=>$clients
        ));
    }
////////////////////////////////////////



    /**
     * Reservation de client.
     *
     * @Route("/list", name="client_reservation")
     * @Method({"GET", "POST"})
     */
    public function reservationAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $reservations = $em->getRepository('CoolTravelBundle:Reservation')->findAll();

            $motcle=$this->getUser()->getId();
            $query=$em->createQuery(
                "SELECT m FROM CoolTravelBundle:Reservation m WHERE m.client = '".$motcle."%'"
            );
        $reservations=$query->getResult();

        return $this->render('reservation/index.html.twig', array(
            'reservations'=>$reservations
        ));
    }




    //recherche
    /**
     * Recherche client.
     *
     * @Route("/recherche", name="client_recherche")
     * @Method({"GET", "POST"})
     */
    public function rechercheAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $clients = $em->getRepository('CoolTravelBundle:Client')->findAll();
        if (($request)->getMethod("POST"))
        {
            $motcle=$request->get('input_recherche');
            $query=$em->createQuery(
                "SELECT m FROM CoolTravelBundle:Client m WHERE m.username LIKE '".$motcle."%'"
            );
            $clients=$query->getResult();
        }
        return $this->render('client/rechercheClient.html.twig', array(
            'clients'=>$clients
        ));
    }




    /**
     * Lists all client entities.
     *
     * @Route("/", name="client_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $clients = $em->getRepository('CoolTravelBundle:Client')->findAll();

        return $this->render('client/index.html.twig', array(
            'clients' => $clients,
        ));
    }

    /**
     * Creates a new client entity.
     *
     * @Route("/new", name="client_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $client = new Client();
        $form = $this->createForm('CoolTravelBundle\Form\ClientType', $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($client);
            $em->flush();

            return $this->redirectToRoute('client_show', array('id' => $client->getId()));
        }

        return $this->render('client/new.html.twig', array(
            'client' => $client,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a client entity.
     *
     * @Route("/{id}", name="client_show")
     * @Method("GET")
     */
    public function showAction(Client $client)
    {
        $deleteForm = $this->createDeleteForm($client);

        return $this->render('client/show.html.twig', array(
            'client' => $client,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing client entity.
     *
     * @Route("/{id}/edit", name="client_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Client $client)
    {
        $deleteForm = $this->createDeleteForm($client);
        $editForm = $this->createForm('CoolTravelBundle\Form\ClientType', $client);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('client_edit', array('id' => $client->getId()));
        }

        return $this->render('client/edit.html.twig', array(
            'client' => $client,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a client entity.
     *
     * @Route("/{id}", name="client_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Client $client)
    {
        $form = $this->createDeleteForm($client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($client);
            $em->flush();
        }

        return $this->redirectToRoute('client_index');
    }

    /**
     * Creates a form to delete a client entity.
     *
     * @param Client $client The client entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Client $client)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('client_delete', array('id' => $client->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
