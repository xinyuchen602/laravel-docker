<?php

namespace Tests\app\Infrastructure\Controller;

use App\Application\CoinDataSource\CoinDataSource;
use App\Application\WalletDataSource\WalletDataSource;
use App\Domain\Coin;
use App\Domain\Wallet;
use Mockery;
use Tests\TestCase;
use Exception;

class GetBalanceControllerTest extends TestCase
{
    private WalletDataSource $walletDataSource;

    protected function setUp(): void
    {
        parent::setUp();

        $this->walletDataSource = Mockery::mock(WalletDataSource::class);
        $this->app->bind(WalletDataSource::class, fn () => $this->walletDataSource);

        $this->coinDataSource = Mockery::mock(coinDataSource::class);
        $this->app->bind(coinDataSource::class, fn() => $this->coinDataSource);
    }

    /**
     * @test
     */
    public function walletNotFound()
    {
        $wallet_id = 1;
        $this->walletDataSource
            ->expects('get')
            ->once()
            ->with($wallet_id)
            ->andThrow(new Exception("A wallet with the specified ID was not found."));

        $response = $this->get('/api/wallet/' . $wallet_id.'/balance');
        $response->assertExactJson(['error' => 'A wallet with the specified ID was not found.']);
    }

    /**
     * @test
     */
    public function walletServiceUnavailable()
    {
        $wallet_id = 1;
        $this->walletDataSource
            ->expects('get')
            ->once()
            ->with($wallet_id)
            ->andThrow(new Exception("Service unavailable"));

        $response = $this->get('/api/wallet/' . $wallet_id.'/balance');
        $response->assertExactJson(['error' => 'Service unavailable']);
    }

    /**
     * @test
     */
    public function walletFound()
    {

        $id = '90';
        $coin2 = new Coin(1,"90","Bitcoin","bitcoin",1,"BTC",29000);
        $wallet_id = 1;
        $coin = new Coin(1,"90","Bitcoin","bitcoin",1,"BTC",29452);
        $wallet = new Wallet($wallet_id,[$coin]);

        $this->coinDataSource
            ->expects('findByCoinId')
            ->with($id)
            ->once()
            ->andReturn($coin2);

        $this->walletDataSource
            ->expects('get')
            ->once()
            ->with($wallet_id)
            ->andReturn($wallet);


        $response = $this->get('/api/wallet/' . $wallet_id.'/balance');

        $response->assertExactJson([
            "balance_usd: -452"
        ]);
    }


}
