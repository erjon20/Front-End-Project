<?php

namespace App\Http\Controllers;

use App\Models\card_details;
use App\Models\Image;
use App\Models\Order;
use Illuminate\Http\Request;

class ImageDetailsController extends Controller
{
    public function index(Image $image)
    {
        $card = card_details::get();


        return view('pages.artdetail', [
            'image' => $image,

        ])->with('card', $card);
    }

    public function store(Request $request, Image $image)
    {
        // purchase 

        Order::where('user_id', auth()->user()->id)->create([
            'user_id' => auth()->user()->id,
            'image_id' => $image->id,
            'price' => $image->price,
            'id' => $request->id
        ]);

        // updatim stock-u per imazhin i cili blihet

        Image::where('id', $image->id)->update([
            'stock' => $image->stock - 1,
        ]);


        return back();
    }
}
