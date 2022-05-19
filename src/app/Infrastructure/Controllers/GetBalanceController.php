<?php

namespace App\Infrastructure\Controllers;

use App\Application\WalletService\WalletService;
use Barryvdh\Debugbar\Controllers\BaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Exception;

class GetBalanceController extends BaseController
{
        private WalletService $walletService;

    public function __construct(WalletService $walletService)
    {
        $this->walletService = $walletService;
    }

    public function __invoke(int $wallet_id) : JsonResponse
    {
        try {
            $balance = $this->walletService->execute($wallet_id);
        }catch (Exception $exception){
            return response()->json([
                'error' => $exception->getMessage()
            ]);
        }

        return response()->json([
            'balance_usd: '.$balance
        ], Response::HTTP_OK);
    }

}
