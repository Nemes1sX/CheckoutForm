<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderFormRequest;
use App\Jobs\SendCheckoutFormInfoJob;
use App\Services\OrderItemService;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(StoreOrderFormRequest $request, OrderService $orderService, OrderItemService $orderItemService)
    {
       $order = $orderService->create($request->first_name, $request->last_name, $request->country, $request->region,
            $request->address);

       $orderItemService->create($order, $request->cart);

        SendCheckoutFormInfoJob::dispatch($request->first_name, $request->last_name, $request->country, $request->region,
            $request->address, $request->cart)->delay(now()->addMinutes(5));

        return response()->json([
            'message' => 'Order was saved successfully'
        ], 200);
    }
}
