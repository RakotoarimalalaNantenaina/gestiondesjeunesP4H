<?php

namespace MaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use MaBundle\Entity\archive;
use MaBundle\Form\archiveType;

/**
 * archive controller.
 *
 * @Route("/archive")
 */
class archiveController extends Controller
{
    /**
     * Lists all archive entities.
     *
     * @Route("/", name="archive_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $archives = $em->getRepository('MaBundle:archive')->findAll();

        return $this->render('archive/index.html.twig', array(
            'archives' => $archives,
        ));
    }

    /**
     * Creates a new archive entity.
     *
     * @Route("/new", name="archive_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $archive = new archive();
        $form = $this->createForm(new archiveType(), $archive);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($archive);
            $em->flush();

            return $this->redirectToRoute('archive_show', array('id' => $archive->getId()));
        }

        return $this->render('archive/new.html.twig', array(
            'archive' => $archive,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a archive entity.
     *
     * @Route("/{id}", name="archive_show")
     * @Method("GET")
     */
    public function showAction(archive $archive)
    {
        $deleteForm = $this->createDeleteForm($archive);

        return $this->render('archive/show.html.twig', array(
            'archive' => $archive,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing archive entity.
     *
     * @Route("/{id}/edit", name="archive_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, archive $archive)
    {
        $deleteForm = $this->createDeleteForm($archive);
        $editForm = $this->createForm(new archiveType(), $archive);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($archive);
            $em->flush();

            return $this->redirectToRoute('archive_edit', array('id' => $archive->getId()));
        }

        return $this->render('archive/edit.html.twig', array(
            'archive' => $archive,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a archive entity.
     *
     * @Route("/{id}", name="archive_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, archive $archive)
    {
        $form = $this->createDeleteForm($archive);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($archive);
            $em->flush();
        }

        return $this->redirectToRoute('archive_index');
    }

    /**
     * Creates a form to delete a archive entity.
     *
     * @param archive $archive The archive entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(archive $archive)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('archive_delete', array('id' => $archive->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
