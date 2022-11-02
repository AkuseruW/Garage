<?php

namespace App\Service;


use App\Entity\Marques;
use App\Repository\VoituresRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class VoitureService
{

    public function __construct(
        private RequestStack $requestStack,
        private VoituresRepository $voituresRepository,
        private PaginatorInterface $paginator
    )
    {

    }

    public function getPaginated(?Marques $marques = null)
    {
        $request = $this->requestStack->getMainRequest();
        $page = $request->query->getInt('page', 1);
        $limit = 2;

        $voituresQuery = $this->voituresRepository->findOrPagination($marques);

        return $this->paginator->paginate($voituresQuery, $page, $limit);
    }

}