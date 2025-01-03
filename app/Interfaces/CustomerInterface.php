<?php

namespace App\Interfaces;

use App\Models\Customer;

interface CustomerInterface
{
    public function getCustomer(Customer $id);

    public function createCustomer(array $data);

    public function updateCustomer(Customer $customer, array $data);

    public function deleteCustomer(Customer $customer);

    public function getCustomers();
}
