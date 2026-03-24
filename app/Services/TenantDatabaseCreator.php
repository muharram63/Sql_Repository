<?php

namespace App\Services;

use App\Models\Database;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class TenantDatabaseCreator
{
    public function createForUser(User $user): Database
    {
        $driver = config('database.default');
        $dbName = $this->makeDatabaseName($user->id);

        $this->createPhysicalDatabase($driver, $dbName);

        return Database::create([
            'user_id' => $user->id,
            'shop' => $dbName,
            'description' => 'Auto-created for user '.$user->id,
            'engine' => $this->normalizeEngine($driver),
        ]);
    }

    private function makeDatabaseName(int $userId): string
    {
        return 'tenant_'.$userId;
    }

    private function normalizeEngine(string $driver): string
    {
        return match ($driver) {
            'pgsql' => 'postgres',
            'mariadb', 'mysql' => 'mysql',
            'sqlite' => 'sqlite',
            default => 'mysql',
        };
    }

    private function createPhysicalDatabase(string $driver, string $dbName): void
    {
        switch ($driver) {
            case 'sqlite':
                $dir = database_path('tenants');
                if (! File::exists($dir)) {
                    File::makeDirectory($dir, 0755, true);
                }

                $path = $dir.DIRECTORY_SEPARATOR.$dbName.'.sqlite';
                if (! File::exists($path)) {
                    File::put($path, '');
                }
                break;

            case 'pgsql':
                $exists = DB::select('SELECT 1 FROM pg_database WHERE datname = ?', [$dbName]);
                if (empty($exists)) {
                    DB::statement('CREATE DATABASE "'.$dbName.'"');
                }
                break;

            case 'mariadb':
            case 'mysql':
                DB::statement('CREATE DATABASE IF NOT EXISTS `'.$dbName.'` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci');
                break;

            default:
                throw new \RuntimeException('Unsupported database driver: '.$driver);
        }
    }
}
