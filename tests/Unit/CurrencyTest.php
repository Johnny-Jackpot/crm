<?php

namespace Tests\Unit;

use App\Services\CurrencyService;
use PHPUnit\Framework\TestCase;

class CurrencyTest extends TestCase
{
    public function test_convert_usd_to_eur_successfull(): void
    {
        $this->assertEquals(98, (new CurrencyService())->convert(100, 'usd', 'eur'));
    }

    public function test_convert_usd_to_gbp_returns_zero(): void
    {
        $this->assertEquals(0, (new CurrencyService())->convert(100, 'gbp', 'eur'));
    }
}
