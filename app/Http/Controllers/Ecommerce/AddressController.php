<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\ApiController;
use App\Models\Address\ChinaArea;

class AddressController extends ApiController
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }


    public function province()
    {
        $data = ChinaArea::getByParentId(1, ChinaArea::FIELDS)->toArray();

        return $this->succ(
            ["province"=>$data]
        );
    }

    public function city($id)
    {
        $item = ChinaArea::find($id);

        if (!$item) {
            return $this->err('404', 'Error id', 404);
        }

        return $this->succ(
            ['city' => $item->getChildren(ChinaArea::FIELDS)->toArray()]
        );
    }

    public function district($id)
    {
        $item = ChinaArea::find($id);

        if (!$item) {
            return $this->err('404', 'Error id', 404);
        }

        return $this->succ(
            ['district' => $item->getChildren(ChinaArea::FIELDS)->toArray()]
        );
    }
}