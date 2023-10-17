<?php

namespace App\Controllers;

use App\Models\Brand;
use App\Models\Bid;
use App\Models\Ask;

class AddContainer extends BaseController
{
  public static function index()
  {
    $brands = Brand::getAll();

    self::loadView('/add/index', [
      'brands' => $brands
    ]);
  }

  public function add()
  {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $brand_id = $_POST['brand_id'];
    $image = $_POST['image'];


    $askModel = new Ask();
    $askModel->add([
      'title' => $title,
      'description' => $description,
      'brand_id' => $brand_id,
      'image' => $image
    ]);

    header('Location: /');
  }

  public function addBid()
  {
    $bid = $_POST['bid'];
    $sneaker_id = $_POST['sneaker_id'];

    $bidModel = new Bid();
    $bidModel->addBidDetail([
      'bid' => $bid,
      'sneaker_id' => $sneaker_id
    ]);
    header('Location: /sneaker/' . $sneaker_id);
  }
}
