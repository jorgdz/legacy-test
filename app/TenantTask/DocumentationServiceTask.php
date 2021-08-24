<?php

namespace App\TenantTask;

use App\Models\CustomTenant;
use Spatie\Multitenancy\Models\Tenant;
use Spatie\Multitenancy\Tasks\SwitchTenantTask;

/**
 * DocumentationServiceTask
 */
class DocumentationServiceTask implements SwitchTenantTask
{

    /**
     * makeCurrent
     *
     * @param  mixed $tenant
     * @return void
     */
    public function makeCurrent(Tenant $tenant): void {
        $this->setDocumentationService($tenant);
    }

    /**
     * forgetCurrent
     *
     * @return void
     */
    public function forgetCurrent(): void {
        //$this->setDocumentationService(null);
    }

    /**
     * setDocumentationService
     *
     * @param  mixed $tenant
     * @return void
     */
    protected function setDocumentationService(?CustomTenant $tenant): void {
        config()->set('l5-swagger.defaults.constants.L5_SWAGGER_CONST_HOST', $tenant->domain);
    }
}
