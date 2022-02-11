<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function indexstore(Product $model, )
    {
        return view('welcome', ['products' => $model->paginate(15)]);
    }

    public function getImage($filename)
    {
      // obtener imagen avatar
      $file = Storage::disk('imgproducts')->get($filename);
      return new Response($file, 200);
    }

}
