<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Interfaces\CustomerInterface;
use App\Models\Customer;
use Illuminate\Http\JsonResponse;

class CustomerController extends Controller
{
    public function __construct(protected CustomerInterface $customerInterface) {}

    public function list(): JsonResponse
    {
        return $this->customerInterface->getCustomers();
    }

    public function create(CreateCustomerRequest $request): JsonResponse
    {
        $validated = $request->validated();

        return $this->customerInterface->createCustomer($validated);
    }

    public function show(Customer $customer)
    {
        return $this->customerInterface->getCustomer($customer);
    }

    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $validated = $request->validated();

        return $this->customerInterface->updateCustomer($customer, $validated);
    }

    public function destroy(Customer $customer)
    {
        return $this->customerInterface->deleteCustomer($customer);
    }
}
