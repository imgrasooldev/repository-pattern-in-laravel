<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\V1\Customer\{StoreCustomerRequest, UpdateCustomerRequest};
use App\Http\Resources\V1\Customer\{CustomerCollection, CustomerResource};
use App\Repositories\CustomerRepository\Interfaces\CustomerRepositoryInterface;

class CustomerController extends BaseController
{
    private CustomerRepositoryInterface $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $customers = $this->customerRepository->getAllCustomers($request);
        $success = new CustomerCollection($customers->paginate()->appends($request->query()));
        return $this->sendResponse($success, 'Customers retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request): JsonResponse
    {
        $success = new CustomerResource($this->customerRepository->createCustomer($request->all()));
        return $this->sendResponse($success, 'Customer stored successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Customer $customer): JsonResponse
    {
        $success = new CustomerResource($this->customerRepository->getCustomerById($request, $customer));
        return $this->sendResponse($success, 'Customer retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Customer $customer): JsonResponse
    {
        $this->customerRepository->updateCustomer($request->all(), $customer);
        $success = new CustomerResource($customer);
        return $this->sendResponse($success, 'Customer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer): JsonResponse
    {
        $this->customerRepository->deleteCustomer($customer);
        return $this->sendResponse([], 'Customer deleted successfully.');
    }
}
