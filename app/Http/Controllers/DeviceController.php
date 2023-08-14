<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Validator;

class DeviceController extends Controller
{
    //
    public function list() {
        return Device::all();
    }
    public function singleList($id = null)
    {
        return $id ? Device::find($id) : Device::all();
    }
    public function add(Request $req)
    {
        $device = new Device();
        $device->name = $req->name;
        $device->member_id = $req->member_id;
        $result = $device->save();

        if ($result) {
            return ['Result' => 'Data has been saved'];

        } else {
            return ['Result' => 'Data not saved'];
        }

    }
    public function update(Request $req)
    {
        $device = Device::find($req->id);
        $device->name = $req->name;
        $device->member_id = $req->member_id;
        $result = $device->save();

        if ($result) {
            return ['Result' => 'Data has been updated'];

        } else {
            return ['Result' => 'Data not updated'];
        }

    }
    public function delete($id)
    {
        $device = Device::find($id);

        $result = $device->delete();

        if ($result) {
            return ['Result' => 'Data has been deleted.'];

        } else {
            return ['Result' => 'Data not deleted.'];
        }
    }
    public function search($name)
    {
        $result = Device::where('name', 'like', '%' . $name . '%')->get();
        if (sizeof($result) == 0) {
            return "There are no Match";
        } else {
            return $result;
        }
    }
    public function testData(Request $req)
    {
        $rules = array(
            'name' => 'required',
            'member_id' => 'required|min:2|max:4',
        );
        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        } else {

            $device = new Device();
            $device->name = $req->name;
            $device->member_id = $req->member_id;
            $result = $device->save();

            if ($result) {
                return ['Result' => 'Data has been saved'];

            } else {
                return ['Result' => 'Data not saved'];
            }
        }
    }
}
