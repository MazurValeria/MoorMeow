<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $coupons = Coupon::paginate(10);
        return response()->view('auth.coupons.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return response()->view('auth.coupons.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CouponRequest $request)
    {
        $params = $request->all();
        foreach (['type', 'only_once'] as $fieldName) {
            if (isset($params[$fieldName])) {
                $params[$fieldName] = 1;
            }
        }

        if (!$request->has('type')) {
            unset($params['currency_id']);
        }

        Coupon::create($params);
        return redirect()->route('coupons.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Coupon $coupon
     * @return Response
     */
    public function show(Coupon $coupon)
    {
        return response()->view('auth.coupons.show', compact('coupon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Coupon $coupon
     * @return Response
     */
    public function edit(Coupon $coupon)
    {
        return response()->view('auth.coupons.form', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CouponRequest  $request
     * @param Coupon $coupon
     * @return void
     */
    public function update(CouponRequest $request, Coupon $coupon)
    {
        $params = $request->all();
        foreach (['type', 'only_once'] as $fieldName) {
            if (isset($params[$fieldName])) {
                $params[$fieldName] = 1;
            } else {
                $params[$fieldName] = 0;
            }
        }

        if (!$request->has('type')) {
            $params['currency_id'] = null;
        }

        $coupon->update($params);
        return response()->redirect()->route('coupons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Coupon $coupon
     * @return Response
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->route('coupons.index');
    }
}
