<?php

namespace App\Repositories;

use App\Http\Resources\CustomerResource;
use App\Interfaces\CustomerInterface;
use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CustomerRepository implements CustomerInterface
{
    public function __construct()
    {
        //
    }

    /**
     * Retrieve the specified customer and return it as a JSON response.
     *
     * @param  Customer  $customer  The customer instance to be retrieved.
     * @return JsonResponse The JSON response containing the customer data.
     */
    public function getCustomer(Customer $customer): JsonResponse
    {
        return response()->json(new CustomerResource($customer));
    }

    /**
     * Create a new customer and return it as a JSON response.
     *
     * @param  array<string, mixed>  $data  The customer data to be stored.
     * @return JsonResponse The JSON response containing the customer data.
     */
    public function createCustomer(array $data): JsonResponse
    {
        $customer = Customer::create($data);

        return response()->json(new CustomerResource($customer), 201);
    }

    /**
     * Update the specified customer and return it as a JSON response.
     *
     * @param  Customer  $customer  The customer instance to be updated.
     * @param  array<string, mixed>  $data  The customer data to be updated.
     * @return JsonResponse The JSON response containing the updated customer data.
     */
    public function updateCustomer(Customer $customer, array $data): JsonResponse
    {
        $customer->update($data);

        return response()->json(new CustomerResource($customer));
    }

    /**
     * Delete the specified customer and return a JSON response.
     *
     * @param  Customer  $customer  The customer instance to be deleted.
     * @return JsonResponse The JSON response containing the deletion message.
     */
    public function deleteCustomer(Customer $customer): JsonResponse
    {
        $customer->delete();

        return response()->json(['message' => 'Customer deleted successfully'], 204);
    }

    /**
     * Retrieve all customers and return them as a JSON response.
     *
     * @return JsonResponse The JSON response containing all customers data.
     */
    public function getCustomers(Request $request): JsonResponse
    {
        $search = $request->input('search', '');
        $list = Customer::where('name', 'like', '%'.$search.'%')->orWhere('email', 'like', '%'.$search.'%')->get();

        return response()->json(CustomerResource::collection($list));
    }

    public function getCounts(): JsonResponse
    {
        $total = Customer::count();
        $newly = Customer::where('created_at', 'like', now()->format('Y-m-d ').'%')->count();

        return response()->json(compact('total', 'newly'));
    }
}
