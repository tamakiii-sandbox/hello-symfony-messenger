<?php
namespace App\Controller;

use App\Message\RequestNotification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    public function __construct(
        private MessageBusInterface $bus,
    ) {}

    #[Route('/')]
    public function index(Request $request): Response
    {
        $type = $request->request->getInt('type');
        $notification = new RequestNotification($type, uniqid());
        $this->bus->dispatch($notification);

        return new JsonResponse([
            'messageId' => $notification->getId(),
            'success' => true
        ]);
    }
}
