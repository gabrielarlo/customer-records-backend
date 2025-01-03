<?php

namespace App\Repositories;

use App\Interfaces\CustomerInterface;
use App\Models\Customer;

class CustomerRepository implements CustomerInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getCustomer(Customer $customer)
    {
        // Implement getCustomer method
    }

    public function createCustomer(array $data)
    {
        // Implement createCustomer method
    }

    public function updateCustomer(Customer $customer, array $data)
    {
        // Implement updateCustomer method
    }

    public function deleteCustomer(Customer $customer)
    {
        // Implement deleteCustomer method
    }

    public function getCustomers()
    {
        // Implement getCustomers method
    }
}
