<?php

namespace App\Http\Controllers;

use App\Models\Asset;

use Illuminate\Http\Request;

class AssetController extends Controller
{
   /**
    * Get the task that owns the AssetController
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */

    public function store(Request $request){
        $request->validate([
            'url' => 'required',
            'description' => 'required',
        ]);

        $asset = new Asset; 
        $asset->url = $request['url'];
        $asset->description = $request['description'];
        $asset->task_id = $request['task_id'];
        $asset->save();

        return redirect()->back()->withSuccess('Asset Added Successfully');
    }

    public function update(Request $request, Task $task, Asset $asset){

        $asset->status = $request['status'];
        $asset->save();

        return redirect()->back()->withSuccess('Asset Updated Successfully');
    }

    public function delete(Asset $asset){

        $asset->delete();
        return redirect()->back()->withSuccess('Asset Deleted Successfully');

    }
}
