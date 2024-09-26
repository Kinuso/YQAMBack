<?php

namespace App\Controller\Api;

use App\Manager\UpVoteManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api')]
class UpVoteController extends AbstractController
{
    public function __construct(
        private UpVoteManager $upVoteManager
    ) {}

    #[Route('/upVote', name: 'app_api_upVote_recipes')]
    public function upVote(Request $request): JsonResponse
    {
        try {

            $data = json_decode($request->getContent(), true);
            $this->upVoteManager->upVote($data);

            return $this->json(['status' => 'success'], Response::HTTP_OK);
        } catch (\Exception $e) {
            return $this->json(['status' => 'error', 'message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    #[Route('/removeUpVote', name: 'app_api_removeUpVote_recipes')]
    public function removeUpVote(Request $request): JsonResponse
    {
        try {

            $data = json_decode($request->getContent(), true);
            $this->upVoteManager->removeUpVote($data);

            return $this->json(['status' => 'success'], Response::HTTP_OK);
        } catch (\Exception $e) {
            return $this->json(['status' => 'error', 'message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    #[Route('/isUpVotedByUser', name: 'app_api_isUpVotedByUser_recipes')]
    public function isUpVotedByUser(Request $request): JsonResponse
    {
        try {

            $data = json_decode($request->getContent(), true);
            $isUpvoted = $this->upVoteManager->isUpVotedByUser($data);

            return $this->json(['status' => 'success', 'result' => $isUpvoted], Response::HTTP_OK);
        } catch (\Exception $e) {
            return $this->json(['status' => 'error', 'message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}
