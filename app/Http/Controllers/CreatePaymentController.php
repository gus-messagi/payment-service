<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;

final class CreatePaymentController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = $request->get("user");

        Log::info(print_r($user->name, true));
    }
}