<?php

namespace App\Controller;

use App\Dto\BugInput;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class BugInputController extends AbstractController
{
    public function __construct(
        private readonly SerializerInterface $serializer,
    ) {}

    public function __invoke(Request $request): Response
    {
        $input = $this->serializer->deserialize($request->getContent(), BugInput::class, 'json');

        return new JsonResponse($input);
    }
}
