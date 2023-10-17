<?php

namespace App\Controllers;

use App\Models\Sneaker;
use App\Models\Brand;
use App\Models\Bid;

class AuthController extends BaseController
{
  public static function index()
  {
    $brands = Brand::getAll();

    self::loadView('/auth/index', [
      'brands' => $brands
    ]);
  }
}
