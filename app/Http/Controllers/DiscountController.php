<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class DiscountController extends Controller
{
    public function discount()
	{
	    return URL::temporarySignedRoute(
	        'discountCode', now()->addMinutes(1)
	    );
	}
}
