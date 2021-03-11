<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;

class AnnouncementController extends Controller
{
    /**
     *
     * 
     *  Admin Restriction
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];

        $data['announcements'] = Announcement::all();

        return view('Admin.announcement.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Admin.announcement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [];

        $file = $request->file('image_cover');
        $extension = $request->file('image_cover')->getClientOriginalExtension();
        $filename = rand(11111, 99999) . '.' . $extension;
        $destinationPath = 'announcements';
        $file->move($destinationPath, $filename);

        $data['type'] = $request->get('type');
        $data['title'] = $request->get('title');
        $data['start_date'] = $request->get('start_date');
        $data['end_date'] = $request->get('end_date');
        $data['content'] = $request->get('content');
        $data['image_cover'] = $filename;

        Announcement::create($data);

        return redirect('/admin-announcement')->with('status', 'Announcement successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [];
        $data['announcement'] = Announcement::firstWhere('id', '=', $id);

        return view('Admin.announcement.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [];
        $data['announcement'] = Announcement::firstWhere('id', '=', $id);

        return view('Admin.announcement.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = [];
        $announcement = Announcement::find($id);

        $data['type'] = empty($request->input('type')) ? $announcement->type : $request->input('type');
        $data['title'] = empty($request->input('title')) ? $announcement->title : $request->input('title');
        $data['start_date'] = empty($request->input('start_date')) ? $announcement->start_date : $request->input('start_date');
        $data['end_date'] = empty($request->input('end_date')) ? $announcement->end_date : $request->input('end_date');
        $data['content'] = empty($request->input('content')) ? $announcement->content : $request->input('content');

        if ($request->file('image_cover')) {
            $file = $request->file('image_cover');
            $extension = $request->file('image_cover')->getClientOriginalExtension();
            $filename = rand(11111, 99999) . '.' . $extension;
            $destinationPath = 'announcements';
            $file->move($destinationPath, $filename);

            $data['image_cover'] = $filename;
        } else {
            $data['image_cover'] = $announcement->image_cover;
        }

        $announcement->update($data);

        return redirect('/admin-announcement')->with('status', 'Announcement successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $announcement = Announcement::findOrFail($id);
        $announcement->delete();

        return redirect('/admin-announcement')->with('status', 'Announcement successfully deleted!');
    }
}
