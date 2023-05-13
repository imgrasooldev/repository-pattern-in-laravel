<?php

namespace App\Repositories\CustomerRepository\Interfaces;

interface CustomerRepositoryInterface
{
    public function getAllCustomers($request);
    public function getCustomerById($request, $customer);
    public function deleteCustomer($customer);
    public function createCustomer($request);
    public function updateCustomer($request, $customer);
}
