<?php

namespace Tests\Feature;

use Tests\TestCase;

class LoginTest extends TestCase
{
    public function test_example()
    {
        $email = 'john@example.com';
        $password = 'password';

        $response = $this->post('/login', [
            'email' => $email,
            'password' => $password,
        ]);

        $response->assertStatus(200);
    }
}
