<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Spatie\Multitenancy\Models\Tenant;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * CustomTenant
 */
class CustomTenant extends Tenant
{
    use HasFactory, SoftDeletes;

    protected $table = 'tenants';

    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'domain', 'database'];

    protected $hidden = ['deleted_at'];

    /**
     * boot
     *
     * Creating a database and migrations
     * @return void
     */
    public static function booted () {
        static::creating (function (CustomTenant $tenant) {
            return $tenant->createDatabase($tenant);
        });

        static::created (function (CustomTenant $tenant) {
            DB::beginTransaction();
            try {
                $mail = new Mail();
                $mail->setConnection('landlord');
                $mail->transport = config('mail.mailers.smtp.transport');
                $mail->host = config('mail.mailers.smtp.host');
                $mail->port = config('mail.mailers.smtp.port');
                $mail->encryption = config('mail.mailers.smtp.encryption');
                $mail->username = config('mail.mailers.smtp.username');
                $mail->password = config('mail.mailers.smtp.password');
                $mail->tenant_id = $tenant->id;
                $mail->save();
    
                $customTenantDatabaseCount = CustomTenant::where('database', $tenant->database)->count();
                
                if ($customTenantDatabaseCount == 1) {
                    $tenant->runMigrationsSeeders($tenant);
                }
    
                DB::commit();
            } catch (\Exception $ex) {
                DB::rollBack();
            }
        });
    }

    /**
     * createDatabase
     *
     * Create a database for tenant
     * @param  mixed $tenant
     * @return void
     */
    public function createDatabase($customTenant) {
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
    public function runMigrationsSeeders($customTenant) {
        $customTenant->refresh();
        Artisan::call('tenants:artisan', [
            'artisanCommand' => 'migrate --database=tenant --seed --force',
            '--tenant' => "{$customTenant->id}",
        ]);
    }

     /**
      * setNameAttribute
      *
      * Lower case tenant name
      * @param  mixed $value
      * @return void
      */
     public function setNameAttribute ($value) {
        $this->attributes['name'] = strtolower($value);
     }

     /**
      * getNameAttribute
      *
      * Accesor uppercase tenant name
      * @param  mixed $value
      * @return void
      */
     public function getNameAttribute ($value) {
        return ucwords($value);
     }

     /**
      * setDomainAttribute
      *
      * Lower case tenant domin
      * @param  mixed $value
      * @return void
      */
    public function setDomainAttribute ($value) {
        $this->attributes['domain'] = strtolower($value);
    }

    /**
     * mail
     *
     * @return void
     */
    public function mail () {
        return $this->hasOne(Mail::class, 'tenant_id');
    }
}
