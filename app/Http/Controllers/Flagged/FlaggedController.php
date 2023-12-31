<?php

namespace App\Http\Controllers\Flagged;

use Illuminate\Support\Facades\Schema;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use File;

use App\Models\{Flagged, Vehicle};
use Illuminate\Http\Request;

class FlaggedController extends Controller
{

     public function removeColumns($columns, $columsToBeRemove)
    {
        foreach ($columsToBeRemove as $value) {
            if (($key = array_search($value, $columns)) !== false) {
                unset($columns[$key]);
            }
        }
        return $columns;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $data = new Flagged();

        if($search != null){
            $query = Flagged::query();

            $table = $data->getTable();

            $columns = $this->removeColumns(Schema::getColumnListing($table), ['created_at', 'updated_at', 'image', 'id']);

            foreach($columns as $column){
                $query->orWhere($column, 'LIKE', '%' . $search . '%');
            }
            $data = $query->orderBy('name')->paginate(12);

            if($request->onChange == true)
            {
                return response()->json(['status' => true, 'data' => $data,'lastPage' => $data->lastPage()]);
            }

        }
        else{
            $data = $data->paginate(12);
            if ($request->onChange == true) {
                return response()->json(['status' => true, 'data' => $data, 'lastPage' => $data->lastPage()]);
            }
        }


        return view('admin.flagged.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data = null;
        return view('admin.flagged.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'comment_id' => 'required',
			'user_id' => 'required'
		]);
        $request->request->remove('_token');
        $data = $request->input();
        if ($request->hasFile('image')) {
            File::isDirectory(public_path('uploads/flagged')) or File::makeDirectory(public_path('uploads/flagged'), 0777, true, true);

            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/flagged'), $fileName);
            $data['image'] = 'uploads/flagged/'.$fileName;
        }
        Flagged::create($data);

        return redirect('admin/flagged')->with('success', 'Flagged added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $comments = Vehicle::find($id)->comments;
    return view('admin.flagged.create', compact('comments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Flagged $flagged)
    {
        $this->validate($request, [
			'comment_id' => 'required',
			'user_id' => 'required'
		]);
        $request->request->remove('_token');
        $request->request->remove('_method');
        $data = $request->input();
        if ($request->hasFile('image')) {
            File::isDirectory(public_path('uploads/flagged')) or File::makeDirectory(public_path('uploads/flagged'), 0777, true, true);
            if (File::exists(public_path($flagged->image))) {
                File::delete(public_path($flagged->image));
            }
            $fileName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/flagged'), $fileName);
            $data['image'] = 'uploads/flagged/'.$fileName;
        }
        $flagged->update($data);
        return redirect()->back()->with('success', 'Flagged Updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Flagged $flagged)
    {

        $status = $flagged->status;
        if($status == 0){
            $flagged->status = 1;
            $message = 'Deactive';
        }else{
            $flagged->status = 0;
            $message = 'Active';
        }
        $flagged->save();

        return redirect()->back()->with('success', 'Flagged '.$message);

    }
}
