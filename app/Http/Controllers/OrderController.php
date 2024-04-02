<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderFormRequest;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(StoreOrderFormRequest $request, OrderService $orderService)
    {
        $orderService->create($request->first_name, $request->last_name, $request->country, $request->region,
            $request->city);

        return response()->json([
            'message' => 'Order was saved successfully'
        ], 200);
    }
}
