<?php 
namespace App\Services;

use App\Repositories\Contracts\ClientRepositoryInterface;

class ClientService
{
    protected $clienteRepository;

    public function __construct(ClientRepositoryInterface $clienteRepository)
    {
      $this->clienteRepository = $clienteRepository;
    }

    public function createNewClient(array $data){
        return $this->clienteRepository->createNewClient($data);
    }
}