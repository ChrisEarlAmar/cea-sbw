<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only('store', 'create', 'destory');
    }

    /**
     * Display a listing of the blogs.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::with('user:id,name,picture')->paginate(10);
        return view('blogs.index', compact('blogs'));
    }

    public function show(Blog $blog)
    {
        $blog->load('user');

        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for creating a new blog.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $blogs = $user->blogs()->paginate(10); 

        return view('blogs.create', compact('blogs'));
    }

    /**
     * Store a newly created blog in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'short' => 'required|max:255',
                'content' => 'required',
                'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image upload validation rules
            ]);
    
            // Generate a unique code for the blog
            $code = Str::random(10);
            while (Blog::where('code', $code)->exists()) {
                $code = Str::random(10); // Regenerate the code if it already exists
            }
    
            // Handle picture upload
            if ($request->hasFile('picture')) {
                $picture = $request->file('picture');
                $fileName = Str::random(20) . '.' . $picture->getClientOriginalExtension(); // Generate a unique file name
                $picture->storeAs('public/uploads', $fileName); // Store the file in the public/uploads directory
            } else {
                $fileName = 'default-blog.jpg'; // Default picture if none is uploaded
            }
    
            // Create the blog with the uploaded picture file name and unique code
            $blog = new Blog();
            $blog->title = $validatedData['title'];
            $blog->short = $validatedData['short'];
            $blog->content = $validatedData['content'];
            $blog->code = $code; // Use the generated unique code
            $blog->picture = $fileName; // Save the file name in the database
    
            // Set the user ID of the authenticated user creating the blog
            $blog->user_id = auth()->user()->id;
    
            // Save the blog to the database
            $blog->save();
    
            $blogs = $user->blogs()->paginate(10); 
            
            return redirect()->route('blogs.create')->with('success', 'Blog created successfully.');

        } catch (ValidationException $e) {
            // Handle validation errors
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Handle any other exceptions that occur during blog creation or file upload
            return back()->withInput()->withErrors(['error' => 'Blog creation failed.']);
        }
    }

    public function destroy(Blog $blog)
    {
        // Delete the associated picture if it exists
        if ($blog->picture) {
            Storage::delete('public/uploads/' . $blog->picture);
        }
    
        // Delete the blog post
        $blog->delete();
    
        return redirect()->route('blogs.create')->with('success', 'Blog deleted successfully.');
    }

    

    // Other methods like show, edit, update, destroy can be added as needed...
}
