<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\ContactService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ContactController extends AbstractController
{
    #[Route('')]
    public function index(ContactService $contactService): Response
    {
        return $this->render('contact/index.html.twig', [
            'contactPhone' => $contactService->getContactPhone(),
            'contactEmail' => $contactService->getContactEmail(),
            'workingHours' => 'ПН-ПТ с 9:00 до 18:00',
            'address' => 'г. Москва, ул. Стандартная, д. 1',
        ]);
    }
}
