<?php

namespace App\Controller;

use League\Flysystem\FilesystemInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * @Route("/flysystem")
 */
class FlysystemController extends AbstractController
{
    protected $defaultStorage;


    public function __construct(FilesystemInterface $defaultStorage)
    {
        $this->defaultStorage = $defaultStorage;
    }

    /**
     * @Route("", name="flysystem")
     */
    public function index()
    {
        return $this->render('flysystem/index.html.twig', [
            'files'    =>  $this->defaultStorage->listContents('/', true),
        ]);
    }

    /**
     * @Route("/download", name="flysystem_download")
     */
    // public function download()
    // {
    //     $file = $this->defaultStorage->read('notes.txt');

    //     return new BinaryFileResponse($file);
    // }
}
