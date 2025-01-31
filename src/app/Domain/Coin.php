<?php

namespace App\Domain;

class Coin
{
    public float $amount;
    public string $coin_id;
    public string $name;
    public string $name_id;
    public int $rank;
    public string $symbol;
    public float $value_usd;

    /**
     * @param float $amount
     * @param string $coin_id
     * @param string $name
     * @param string $name_id
     * @param int $rank
     * @param string $symbol
     * @param float $value_usd
     */
    public function __construct(float $amount, string $coin_id, string $name, string $name_id, int $rank, string $symbol, float $value_usd)
    {
        $this->amount = $amount;
        $this->coin_id = $coin_id;
        $this->name = $name;
        $this->name_id = $name_id;
        $this->rank = $rank;
        $this->symbol = $symbol;
        $this->value_usd = $value_usd;
    }


    /**
     * @return string
     */
    public function getNameId(): string
    {
        return $this->name_id;
    }

    /**
     * @param string $name_id
     */
    public function setNameId(string $name_id): void
    {
        $this->name_id = $name_id;
    }

    /**
     * @return int
     */
    public function getRank(): int
    {
        return $this->rank;
    }

    /**
     * @param int $rank
     */
    public function setRank(int $rank): void
    {
        $this->rank = $rank;
    }




    /**
     * @return string
     */
    public function getCoinId(): string
    {
        return $this->coin_id;
    }

    /**
     * @param string $coin_id
     */
    public function setCoinId(string $coin_id): void
    {
        $this->coin_id = $coin_id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSymbol(): string
    {
        return $this->symbol;
    }

    /**
     * @param string $symbol
     */
    public function setSymbol(string $symbol): void
    {
        $this->symbol = $symbol;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return float
     */
    public function getValueUsd(): float
    {
        return $this->value_usd;
    }

    /**
     * @param float $value_usd
     */
    public function setValueUsd(float $value_usd): void
    {
        $this->value_usd = $value_usd;
    }



}
