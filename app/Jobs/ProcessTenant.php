<?php

namespace App\Jobs;

use App\Models\Mail;
use App\Models\CustomStatus;
use App\Models\CustomTenant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Throwable;

class ProcessTenant implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $customTenant;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(CustomTenant $customTenant)
    {
        $this->customTenant = $customTenant;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $status = CustomStatus::where([
            ['group', 'general'],
            ['keyword', 'general-inactivo'],
        ])->first();

        $database = $this->createDatabase($this->customTenant);

        if ($database) {
            $mail = new Mail();
            $mail->setConnection('landlord');
            $mail->transport = config('mail.mailers.smtp.transport');
            $mail->host = config('mail.mailers.smtp.host');
            $mail->port = config('mail.mailers.smtp.port');
            $mail->encryption = config('mail.mailers.smtp.encryption');
            $mail->username = config('mail.mailers.smtp.username');
            $mail->password = config('mail.mailers.smtp.password');
            $mail->tenant_id = $this->customTenant->id;
            $mail->status_id = $status['id'];
            $mail->save();

            $customTenantDatabaseCount = CustomTenant::where('database', $this->customTenant->database)->count();

            if ($customTenantDatabaseCount == 1) {
                $this->runMigrationsSeeders($this->customTenant);
            }
        }
    }

    public function failed(Throwable $exception)
    {
        dump($exception);
    }

    /**
     * createDatabase
     *
     * Create a database for tenant
     * @param  mixed $tenant
     * @return void
     */
    public function createDatabase($customTenant)
    {
        $database = $customTenant->database;
        $query = "SELECT name FROM SYS.DATABASES WHERE name = ?";
        $db = DB::select($query, [$database]);

        if (empty($db)) {
            DB::connection('tenant')->statement("CREATE DATABASE {$database};");
        }

        return $database;
    }

    /**
     * runMigrationsSeeders
     *
     * Running migrations
     * @param  mixed $tenant
     * @return void
     */
    public function runMigrationsSeeders($customTenant)
    {
        $customTenant->refresh();
        Artisan::call('tenants:artisan', [
            'artisanCommand' => 'migrate --database=tenant --seed --force',
            '--tenant' => "{$customTenant->id}",
        ]);
    }
}
