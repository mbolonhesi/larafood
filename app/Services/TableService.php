<?php 

namespace App\Services;

use App\Repositories\Contracts\TableRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;

class TableService
{
    protected $tenantRepository, $tableRepository;
    public function __construct(TenantRepositoryInterface $tenantRepository, TableRepositoryInterface $tableRepository)
    {
        $this->tableRepository = $tableRepository;
        $this->tenantRepository = $tenantRepository;
    }
    public function getTablesByUuid(string $uuid)
    {
        $tenant = $this->tenantRepository->getTenantByUuid($uuid);

        return $this->tableRepository->getTablesByTenantId($tenant->id);
    }

    public function getTableByUuid(string $identify)
    {
        return $this->tableRepository->getTableByUuid($identify);
    }

}