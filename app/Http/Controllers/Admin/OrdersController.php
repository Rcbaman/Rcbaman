<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOrderRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\CustomerDetail;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrdersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::with(['transaction', 'customers', 'ordertakenbies'])->get();

        $transactions = Transaction::get();

        $customer_details = CustomerDetail::get();

        $users = User::get();

        return view('admin.orders.index', compact('orders', 'transactions', 'customer_details', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transactions = Transaction::pluck('amount', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customers = CustomerDetail::pluck('first_name', 'id');

        $ordertakenbies = User::pluck('name', 'id');

        return view('admin.orders.create', compact('transactions', 'customers', 'ordertakenbies'));
    }

    public function store(StoreOrderRequest $request)
    {
        $order = Order::create($request->all());
        $order->customers()->sync($request->input('customers', []));
        $order->ordertakenbies()->sync($request->input('ordertakenbies', []));

        return redirect()->route('admin.orders.index');
    }

    public function edit(Order $order)
    {
        abort_if(Gate::denies('order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transactions = Transaction::pluck('amount', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customers = CustomerDetail::pluck('first_name', 'id');

        $ordertakenbies = User::pluck('name', 'id');

        $order->load('transaction', 'customers', 'ordertakenbies');

        return view('admin.orders.edit', compact('transactions', 'customers', 'ordertakenbies', 'order'));
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->all());
        $order->customers()->sync($request->input('customers', []));
        $order->ordertakenbies()->sync($request->input('ordertakenbies', []));

        return redirect()->route('admin.orders.index');
    }

    public function show(Order $order)
    {
        abort_if(Gate::denies('order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->load('transaction', 'customers', 'ordertakenbies');

        return view('admin.orders.show', compact('order'));
    }

    public function destroy(Order $order)
    {
        abort_if(Gate::denies('order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->delete();

        return back();
    }

    public function massDestroy(MassDestroyOrderRequest $request)
    {
        Order::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
