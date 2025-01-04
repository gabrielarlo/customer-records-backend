<?php

use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('can list customers', function (): void {
    // Create some customers
    Customer::factory()->count(3)->create();

    // Make a GET request to the customers list endpoint
    $response = $this->getJson('/api/customers');

    // Assert the response status is 200 OK
    $response->assertStatus(200);

    // Assert the response contains the customers
    $response->assertJsonCount(3);

    // Assert the response contains the customers' data
    $response->assertJsonStructure([
        '*' => [
            'id',
            'first_name',
            'last_name',
            'email',
            'contact_number',
            'address',
            'full_name',
            'created_at',
            'updated_at',
        ],
    ]);
});

test('can create a customer', function (): void {
    // Make a POST request to the customers create endpoint
    $response = $this->postJson('/api/customers', [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'gBh6M@example.com',
        'contact_number' => '09101234567',
        'address' => '123 Main St',
    ]);

    // Assert the response status is 201 Created
    $response->assertStatus(201);

    // Assert the response contains the customer data
    $response->assertJsonStructure([
        'id',
        'first_name',
        'last_name',
        'email',
        'contact_number',
        'address',
        'full_name',
        'created_at',
        'updated_at',
    ]);
});

test('can update a customer', function (): void {
    // Create a customer
    $customer = Customer::factory()->create();

    // Make a PUT request to the customers update endpoint
    $response = $this->putJson("/api/customers/{$customer->id}", [
        'first_name' => 'Jane',
        'last_name' => 'Doe',
        'email' => '0Hm4o@example.com',
        'contact_number' => '09101234568',
        'address' => '456 Elm St',
    ]);

    // Assert the response status is 200 OK
    $response->assertStatus(200);

    // Assert the response contains the updated customer data
    $response->assertJsonStructure([
        'id',
        'first_name',
        'last_name',
        'email',
        'contact_number',
        'address',
        'full_name',
        'created_at',
        'updated_at',
    ]);
});

test('can show a customer', function (): void {
    // Create a customer
    $customer = Customer::factory()->create();

    // Make a GET request to the customers show endpoint
    $response = $this->getJson("/api/customers/{$customer->id}");

    // Assert the response status is 200 OK
    $response->assertStatus(200);

    // Assert the response contains the customer data
    $response->assertJsonStructure([
        'id',
        'first_name',
        'last_name',
        'email',
        'contact_number',
        'address',
        'full_name',
        'created_at',
        'updated_at',
    ]);
});

test('can delete a customer', function (): void {
    // Create a customer
    $customer = Customer::factory()->create();

    // Make a DELETE request to the customers delete endpoint
    $response = $this->deleteJson("/api/customers/{$customer->id}");

    // Assert the response status is 204 No Content
    $response->assertStatus(204);
});
