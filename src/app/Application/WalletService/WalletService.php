<?php

namespace App\Application\WalletService;

use App\Application\CoinService\CoinService;
use App\Application\WalletDataSource\WalletDataSource;
use App\Domain\Wallet;
use App\Domain\Coin;
use EXception;

class WalletService
{

    private WalletDataSource $walletRepository;
    private CoinService $coinService;

    /**
     * @param WalletDataSource $walletRepository
     * @param CoinService $coinService
     */
    public function __construct(WalletDataSource $walletRepository, CoinService $coinService)
    {
        $this->walletRepository = $walletRepository;
        $this->coinService = $coinService;
    }


    /**
     * @throws Exception
     */
    public function execute(int $wallet_id): int
    {
        $balance=0;
        try {
            $wallet = $this->walletRepository->get($wallet_id);
            $coins = $wallet->getCoins();
            foreach($coins as $coin){
                $amount = $coin->getAmount();
                $auxcoin = $this->coinService->execute($coin->getCoinId());
                $balance += ($amount * $auxcoin->getValueUsd()) - ($amount * $coin->getValueUsd());
            }
        } catch (Exception $exception)  {
            throw new Exception($exception->getMessage(),$exception->getCode());
        }

        return $balance;
    }
}
