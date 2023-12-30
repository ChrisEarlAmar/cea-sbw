<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Image;
use App\Models\Blog;
use GuzzleHttp\Client;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index() 
    {    
        $saved_images = Image::all();

        return view('photos.index', compact('saved_images'));

    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $client = new Client();
        $response = $client->request('GET', 'https://api.unsplash.com/search/photos', [
            'query' => [
                'query' => $query,
                'client_id' => env('UNSPLASH_ACCESS_KEY'),
            ],
        ]);
        $data = json_decode($response->getBody(), true);
        $images = $data['results'];

        $saved_images = Image::all();
    
        return view('photos.index', compact('images', 'saved_images'));
    }
    

    public function store(Request $request)
    {
        $data = $request->only(['unsplash_id', 'url', 'description']);
        Image::create($data);

        return redirect()->back()->with('success', 'Image saved successfully.');
    }

    public function destroy(Request $request, $id)
    {
        $image = Image::findOrFail($id);
        $image->delete();

        return redirect()->back()->with('success', 'Image deleted successfully');
    }
}
