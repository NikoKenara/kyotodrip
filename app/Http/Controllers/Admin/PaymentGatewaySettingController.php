<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentGatewaySettingController extends Controller
{
    function index(): View {
        return view('admin.payment_setting.index');
    }

    function paypalSettingUpdate(Request $request) {
        dd($request->all());
    }
}
