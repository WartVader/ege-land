<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{
    public function index() {
        $data = [
            'galleries' => Gallery::all()
        ];
        return view('gallery', $data);
    }

    /**
     * Method that create new gallery record
     * @param Request $request
     */
    public function create(Request $request)
    {
        $response = ['success' => false, 'status' => 500];

        try {
            $gallery = new Gallery();

            $imageName = time().'.png';
            $path = public_path('uploads/').$imageName;
            Image::make($request->image)->save($path);

            $gallery->name = $imageName;
            $gallery->link = "uploads/$imageName";
            $gallery->save();

            $response['success'] = true;
            $response['status'] = 200;
        } catch (\Exception $e) {
            $response['msg'] = $e->getMessage();
        }

        return response()->json($response, $response['status']);
    }
}

