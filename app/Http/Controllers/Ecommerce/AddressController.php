<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\ApiController;
use App\Models\Address\ChinaArea;
use App\Models\Ecommerce\Address;

class AddressController extends ApiController
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except'=>['province', 'city', 'district']]);
    }

    public function list()
    {
        $account = auth()->user();

        $list = Address::getByAccount($account->id)->toArray();

        foreach ($list as &$address)
        {
            $address['provice'] = ChinaArea::findByCode($address['province_id'])->name;
            $address['city'] = ChinaArea::findByCode($address['city_id'])->name;
            $address['disctrict'] = ChinaArea::findByCode($address['disctrict_id'])->name;
        }
        return $this->succ(
            [
                'address' => $list,
                'pagesize' => 15,
                'total' => count($list)
            ]
        );
    }

    public function province()
    {
        
        $data = ChinaArea::getByParentId(1, ChinaArea::FIELDS)->toArray();

        return $this->succ(
            ["province"=>$data]
        );
    }

    public function city($code)
    {
        $item = ChinaArea::findByCode($code);

        if (!$item) {
            return $this->err('404', 'Error code', 404);
        }

        return $this->succ(
            ['city' => $item->getChildren(ChinaArea::FIELDS)->toArray()]
        );
    }

    public function district($code)
    {
        $item = ChinaArea::findByCode($code);

        if (!$item) {
            return $this->err('404', 'Error code', 404);
        }

        return $this->succ(
            ['district' => $item->getChildren(ChinaArea::FIELDS)->toArray()]
        );
    }
}