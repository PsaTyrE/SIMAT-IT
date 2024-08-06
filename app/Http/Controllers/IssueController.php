<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Http\Requests\StoreIssueRequest;
use App\Http\Requests\UpdateIssueRequest;
use App\Models\Departemen;
use App\Models\Hardware;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $issue = Issue::with(['departemen', 'teknisi', 'hardware'])
            ->where('status', 'complete')
            ->when($request->input('nama'), function ($query, $nama) {
                return $query->where('nama', 'like', '%' . $nama . '%');
            })
            ->when($request->input('created_at'), function ($query, $created_at) {
                return $query->where('created_at', 'like', '%' . $created_at . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('pages.issue.issue', compact('issue'));
    }

    public function issueToday(Request $request)
    {
        $today = Carbon::now()->format('Y-m-d');
        $issue = Issue::with(['departemen', 'teknisi', 'hardware'])
            ->where(function ($query) use ($today) {
                $query->whereDate('created_at', $today)
                    ->orWhere(function ($query) use ($today) {
                        $query->whereDate('created_at', '<', $today)
                            ->where(function ($query) {
                                $query->where('status', 'open')
                                    ->orWhere('status', 'onhold');
                            });
                    });
            })
            ->when($request->input('nama'), function ($query, $nama) {
                return $query->where('nama', 'like', '%' . $nama . '%');
            })
            ->when($request->input('created_at'), function ($query, $created_at) {
                return $query->where('created_at', 'like', '%' . $created_at . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('pages.issue.issue-today', compact('issue'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departemen = Departemen::select('id', 'nama_departemen')->get();
        $hardware = Hardware::select('id', 'nama_hardware')->get();

        return view('pages.issue.create', compact('departemen', 'hardware'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIssueRequest $request)
    {
        $validatedData = $request->validated();
        $issue = Issue::create($validatedData);

        if ($issue) {
            $hardwareID = $request->input('hardwareID', []);
            $issue->hardware()->sync($hardwareID);
        }

        // dd($issue);

        return redirect()->route('issueToday')->with('success', 'Data berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Issue $issue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Issue $issue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIssueRequest $request, Issue $issue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Issue $issue)
    {
        //
    }
}
