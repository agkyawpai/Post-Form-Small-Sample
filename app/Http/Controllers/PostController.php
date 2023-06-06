<?php

namespace App\Http\Controllers;

use App\Post;
use App\Exports\PostsExport;
use \Mpdf\Mpdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\CommonMark\HtmlRenderer;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PostsImport;
use Illuminate\Support\Facades\View;
use App\Http\Requests\PostSaveRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $posts = Post::where('title', 'like', "%$search%")
            ->orWhere('description', 'like', "%$search%")
            ->paginate(6);
        $currentPage = request()->query('page');
        $lastPage = $posts->lastPage();
        return view('index')->with(['posts' => $posts, 'currentPage' => $currentPage, 'lastPage' => $lastPage]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $posts = Post::paginate(6);
        $lastPage = $posts->lastPage();
        return view('create', ['lastPage' => $lastPage]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostSaveRequest $request)
    {
        $title = $request->title;
        $description = $request->description;
        $file = $request->file;
        $fileExtension = $request->file->extension();
        $fileName = $request->file->getClientOriginalName();
        $fileSave = $request->file->move(public_path('upload'), $fileName);
        $post = new Post();
        $post->title = $title;
        $post->description = $description;
        $post->file = $fileName;
        $post->save();
        return back()->with('success', 'အောင်မြင်သည်။');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $currentPage = request()->query('page');
        return view('detail')->with(['post' => $post, 'currentPage' => $currentPage]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $post = Post::find($id);
        $currentPage = request()->query('page');
        return view('edit')->with(['post' => $post, 'currentPage' => $currentPage]);;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostSaveRequest $request, $id)
    {

        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->description = $request->input('description');

        if ($request->hasFile('file')) {
            $file = $request->file;
            $fileExtension = $request->file->extension();
            $fileName = $request->file->getClientOriginalName();
            $fileSave = $request->file->move(public_path('upload'), $fileName);
            $post->file = $fileName;
        }

        $post->save();

        return redirect()->route('post.create')->with('success', 'အောင်မြင်သည်။');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back()->with('success', 'ဖျက်သိမ်းမှုအောင်မြင်သည်။');
    }
    public function download($id)
    {
        // Setup a filename
        $documentFileName = "fun.pdf";

        // Create the mPDF document
        $document = new PDF([
            'mode' => 'utf-8',
            'format' => 'A4',
            'margin_header' => '3',
            'margin_top' => '20',
            'margin_bottom' => '20',
            'margin_footer' => '2',
        ]);

        // Set some header informations for output
        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $documentFileName . '"'
        ];
        $post = Post::find($id);
        $html = View::make('pdf.demo')->with('post', $post)->render();
        $document->WriteHTML($html);
        Storage::disk('public')->put($documentFileName, $document->Output($documentFileName, "D"));

        // Get file back from storage with the give header informations
        return Storage::disk('public')->download($documentFileName, 'Request', $header); //
    }

    public function downloadExcel(Request $request)
    {
        $searchQuery = $request->input('search');
        $results = Post::all();
        if ($searchQuery) {
            $searchedPosts = Post::where('title', 'like', "%$searchQuery%")
                ->orWhere('description', 'like', "%$searchQuery%")
                ->get();
            return Excel::download(new PostsExport($searchedPosts), 'postaaaaaaaaaaa.xlsx');
        }

        return Excel::download(new PostsExport($results), 'posts.xlsx');
    }
    public function showNewsfeed()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(6);
        return view('newsfeed', ['posts' => $posts]);
    }
    public function showImportForm()
    {
        return view('import');
    }
    public function import(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:xls,xlsx',
        ]);


        $file = $request->file('file');

        Excel::import(new PostsImport, $file);

        return back()->with('success', 'Posts imported successfully.');
    }
}
