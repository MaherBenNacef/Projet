<?php

namespace CoolTravelBundle\Controller;

use CoolTravelBundle\Entity\Admin;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Admin controller.
 *
 * @Route("admin")
 */
class AdminController extends Controller
{


    /**
     * List des responsables.
     *
     * @Route("/list", name="list_responsable")
     * @Method({"GET", "POST"})
     */
    public function listAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $responsableHotels = $em->getRepository('CoolTravelBundle:ResponsableHotel')->findAll();

        return $this->render('responsablehotel/index.html.twig', array(
            'responsableHotels'=>$responsableHotels
        ));
    }


    /**
     * List des hotels.
     *
     * @Route("/hotel", name="list_hotel")
     * @Method({"GET", "POST"})
     */
    public function hotelAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $hotels = $em->getRepository('CoolTravelBundle:Hotel')->findAll();

        return $this->render('hotel/index.html.twig', array(
            'hotels'=>$hotels
        ));
    }

    /**
     * List des clients.
     *
     * @Route("/client", name="list_responsable")
     * @Method({"GET", "POST"})
     */
    public function clientsAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $clients = $em->getRepository('CoolTravelBundle:Client')->findAll();

        return $this->render('client/index.html.twig', array(
            'clients'=>$clients
        ));
    }


    //recherche
    /**
     * Recherche admin.
     *
     * @Route("/recherche", name="admin_recherche")
     * @Method({"GET", "POST"})
     */
    public function rechercheAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $admins = $em->getRepository('CoolTravelBundle:Admin')->findAll();
        if (($request)->getMethod("POST"))
        {
            $motcle=$request->get('input_recherche');
            $query=$em->createQuery(
                "SELECT m FROM CoolTravelBundle:Admin m WHERE m.username LIKE '".$motcle."%'"
            );
            $admins=$query->getResult();
        }
        return $this->render('admin/rechercheAdmin.html.twig', array(
            'admins'=>$admins
        ));
    }


    /**
     * Lists all admin entities.
     *
     * @Route("/", name="admin_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $admins = $em->getRepository('CoolTravelBundle:Admin')->findAll();

        return $this->render('admin/index.html.twig', array(
            'admins' => $admins,
        ));
    }

    /**
     * Creates a new admin entity.
     *
     * @Route("/new", name="admin_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $admin = new Admin();
        $form = $this->createForm('CoolTravelBundle\Form\AdminType', $admin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($admin);
            $em->flush();

            return $this->redirectToRoute('admin_show', array('id' => $admin->getId()));
        }

        return $this->render('admin/new.html.twig', array(
            'admin' => $admin,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a admin entity.
     *
     * @Route("/{id}", name="admin_show")
     * @Method("GET")
     */
    public function showAction(Admin $admin)
    {
        $deleteForm = $this->createDeleteForm($admin);

        return $this->render('admin/show.html.twig', array(
            'admin' => $admin,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing admin entity.
     *
     * @Route("/{id}/edit", name="admin_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Admin $admin)
    {
        $deleteForm = $this->createDeleteForm($admin);
        $editForm = $this->createForm('CoolTravelBundle\Form\AdminType', $admin);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_edit', array('id' => $admin->getId()));
        }

        return $this->render('admin/edit.html.twig', array(
            'admin' => $admin,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a admin entity.
     *
     * @Route("/{id}", name="admin_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Admin $admin)
    {
        $form = $this->createDeleteForm($admin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($admin);
            $em->flush();
        }

        return $this->redirectToRoute('admin_index');
    }

    /**
     * Creates a form to delete a admin entity.
     *
     * @param Admin $admin The admin entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Admin $admin)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_delete', array('id' => $admin->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
