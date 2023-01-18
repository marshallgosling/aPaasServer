<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\ApiController;
use App\Models\Address\ChinaArea;
use App\Models\Ecommerce\Address;
use Exception;
use Illuminate\Http\Request;

class AddressController extends ApiController
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except'=>['country', 'province', 'city', 'district']]);
    }

    public function list()
    {
        $account = auth()->user();

        $list = Address::getByAccount($account->id)->toArray();

        foreach ($list as &$address)
        {
            $address['provice'] = ChinaArea::findByCode($address['province_id'])->name;
            $address['city'] = ChinaArea::findByCode($address['city_id'])->name;
            $address['disctrict'] = ChinaArea::findByCode($address['district_id'])->name;
        }
        return $this->succ(
            [
                'address' => $list,
                'pagesize' => 15,
                'total' => count($list)
            ]
        );
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $account = auth()->user();
        $data['user_id'] = $account->id;

        try {
            Address::create($data);
            return $this->succ(['address'=>$data]);
        }
        catch (Exception $err)
        {
            return $this->err('500', 'create error', 404);
        }
    }

    public function country()
    {
        $data = ChinaArea::getByParentId(0, ChinaArea::FIELDS)->toArray();

        return $this->succ(
            ["country" =>$data]
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