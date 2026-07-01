<?php
namespace App\Services\Integrations;

use App\Models\Company;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PersonnelApiService
{
    public function getToken(Company $company): string
    {
        if ($company->token && $company->token_expires_at?->isFuture()) {
            return $company->token;
        }

        $response = Http::timeout(30)
            ->post($company->auth_url, [
                'usuario' => $company->api_user,
                'password' => $company->api_password,
            ])
            ->throw()
            ->json();

        $token = $response['token'] ?? null;

        if (!$token) {
            throw new \Exception('El servicio de autenticación no devolvió token.');
        }

        $company->update([
            'token' => $token,
            'token_expires_at' => now()->addMinutes(50),
        ]);

        return $token;
    }

    public function getPersonnel(Company $company): array
    {
        $token = $this->getToken($company);

        $response = Http::timeout(120)
            ->withToken($token)
            ->post($company->personnel_url, [
                'iddespacho' => $company->office_id,
            ])
            ->throw()
            ->json();

        return $response['data'] ?? $response;
    }
}
