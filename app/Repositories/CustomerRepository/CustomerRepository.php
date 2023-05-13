<?php

namespace App\Repositories\CustomerRepository;

use App\Filters\V1\CustomersFilter;
use App\Http\Resources\V1\Customer\CustomerResource;
use App\Repositories\CustomerRepository\Interfaces\CustomerRepositoryInterface;
use App\Models\Customer;


class CustomerRepository implements CustomerRepositoryInterface
{
    public function getAllCustomers($request)
    {
        $filter = new CustomersFilter();
        $filterItems = $filter->transform($request); //[['column', 'operator', 'value']]

        $includeOrders = $request->query('includeOrders');

        $customers = Customer::where($filterItems);

        if ($includeOrders) {
            $customers = $customers->with('orders');
        }

        return $customers;
    }

    public function getCustomerById($request, $customer)
    {
        $includeOrders = $request->query('includeOrders');

        if ($includeOrders) {
            return new CustomerResource($customer->loadMissing('orders'));
        }

        return $customer;
    }

    public function createCustomer($request)
    {
        return Customer::create($request);
    }

    public function updateCustomer($request, $customer)
    {
        return $customer->update($request);
    }

    public function deleteCustomer($customer)
    {
        $customer->delete();
    }
}
