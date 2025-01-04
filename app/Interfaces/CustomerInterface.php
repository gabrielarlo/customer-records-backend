<?php

namespace App\Interfaces;

use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface CustomerInterface
{
    public function getCustomer(Customer $id): JsonResponse;

    public function createCustomer(array $data): JsonResponse;

    public function updateCustomer(Customer $customer, array $data): JsonResponse;

    public function deleteCustomer(Customer $customer): JsonResponse;

    public function getCustomers(Request $request): JsonResponse;

    public function getCounts(): JsonResponse;
}
