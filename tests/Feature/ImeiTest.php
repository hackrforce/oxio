<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ImeiTest extends TestCase
{
    private const VALUES = [
        'success' => '358692051234567',
        'fail_length' => '35869205987654',
        'fail_numeric' => '35869205987654a',
        'fail_checksum' => '358692059876549',
        'fail_empty' => '',
    ];

    /**
     * A basic feature test: success.
     *
     * @return void
     */
    public function test_success()
    {
        $response = $this->post(route('tools.imei_validator'), [
            'imei' => static::VALUES['success'],
        ]);

        $response
            ->assertStatus(200)
            ->assertViewHas('success', true);
    }

    /**
     * A basic feature test: fail length validation.
     *
     * @return void
     */
    public function test_fail_length()
    {
        $response = $this->post(route('tools.imei_validator'), [
            'imei' => static::VALUES['fail_length'],
        ]);

        $response
            ->assertStatus(200)
            ->assertViewHas('success', false)
            ->assertViewHas('error', ['Invalid length']);
    }

    /**
     * A basic feature test: fail numeric validation.
     *
     * @return void
     */
    public function test_fail_numeric()
    {
        $response = $this->post(route('tools.imei_validator'), [
            'imei' => static::VALUES['fail_numeric'],
        ]);

        $response
            ->assertStatus(200)
            ->assertViewHas('success', false)
            ->assertViewHas('error', ['Invalid type: non-numeric']);
    }

    /**
     * A basic feature test: fail checksum validation.
     *
     * @return void
     */
    public function test_fail_checksum()
    {
        $response = $this->post(route('tools.imei_validator'), [
            'imei' => static::VALUES['fail_checksum'],
        ]);

        $response
            ->assertStatus(200)
            ->assertViewHas('success', false)
            ->assertViewHas('error', ['Invalid checksum']);
    }

    /**
     * A basic feature test: fail empty validation.
     *
     * @return void
     */
    public function test_fail_empty()
    {
        $response = $this->post(route('tools.imei_validator'), [
            'imei' => static::VALUES['fail_empty'],
        ]);

        $response
            ->assertStatus(200)
            ->assertViewHas('success', false)
            ->assertViewHas('error', ['Missing input']);
    }
}
