<?php

namespace Sampic\LaravelAdorableAvatars\Tests\Unit;

use Mockery;
use Sampic\LaravelAdorableAvatars\AdorableAvatars;

/**
 * Class AdorableAvatarsTest
 * @package Sampic\LaravelAdorableAvatars\Tests\Unit
 */
class AdorableAvatarsTest extends \Orchestra\Testbench\TestCase
{
    /** @test */
    public function it_can_override_the_size_of_an_existing_adorableavatars()
    {
        $config = $this->getConfig('512', true, true);
        $adorableAvatars = new AdorableAvatars($config);
        $this->assertStringContainsString('/80/', $adorableAvatars->src('test', 80));
    }

    /** @test */
    public function it_can_check_the_true_secure_url_adorableavatars()
    {
        $config = $this->getConfig('512', true, true);
        $adorableAvatars = new AdorableAvatars($config);
        $this->assertStringNotContainsString('http://', $adorableAvatars->src('test', 512));
    }

    /** @test */
    public function it_can_check_the_false_secure_url_adorableavatars()
    {
        $config = $this->getConfig('512', true, false);
        $adorableAvatars = new AdorableAvatars($config);
        $this->assertStringNotContainsString('https://', $adorableAvatars->src('test', 512));
    }

    /** @test */
    public function it_can_check_the_hash_string_disabled_adorableavatars()
    {
        $config = $this->getConfig('512', false, true);
        $adorableAvatars = new AdorableAvatars($config);
        $this->assertStringContainsString('test', $adorableAvatars->src('test', 512));
    }

    /** @test */
    public function it_can_check_the_hash_string_enabled_adorableavatars()
    {
        $config = $this->getConfig('512', true, true);
        $adorableAvatars = new AdorableAvatars($config);
        $this->assertStringNotContainsString('test', $adorableAvatars->src('test', 512));
    }

    /**
     * @param $size
     * @param $hash_string
     * @param $secure_url
     * @return Mockery\MockInterface|Illuminate\Contracts\Config\Repository
     */
    private function getConfig($size, $hash_string, $secure_url)
    {
        $config = Mockery::mock('Illuminate\Contracts\Config\Repository');
        $config->shouldReceive('get')->with('adorableavatars.size')->andReturn($size);
        $config->shouldReceive('get')->with('adorableavatars.hash_string')->andReturn($hash_string);
        $config->shouldReceive('get')->with('adorableavatars.secure_url')->andReturn($secure_url);
        return $config;
    }
}
