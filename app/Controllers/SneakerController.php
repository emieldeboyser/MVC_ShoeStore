<?php

namespace App\Controllers;

use App\Models\Sneaker;
use App\Models\Brand;
use App\Models\Bid;

class SneakerController extends BaseController
{

    public static function index($brand_slug = null)
    {
        $search = $_GET['search'] ?? null;
        $brand_id = null;
        if ($brand_slug) {
            $brand = Brand::findBySlug($brand_slug);
            $brand_id = $brand->id;
        }

        // Check if a search query is provided
        if (!empty($search)) {
            $sneakers = Sneaker::search($brand_id);
        } else {
            $sneakers = Sneaker::get($brand_id);
        }


        $brands = Brand::getAll();

        self::loadView('/sneaker/index', [
            'sneakers' => $sneakers,
            'brands' => $brands,
            'current_brand' => $brand ?? null,
        ]);
    }


    public static function detail($id)
    {
        $sneaker = Sneaker::findById($id);
        $brands = Brand::getAll();
        $bids = Bid::getBids($id);

        self::loadView('/sneaker/detail', [
            'sneaker' => $sneaker,
            'brands' => $brands,
            'bids' => $bids
        ]);
    }
}
