<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Http\Requests\StoreIssueRequest;
use App\Http\Requests\UpdateIssueRequest;
use App\Models\Departemen;
use App\Models\Hardware;
use App\Models\Teknisi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Telegram\Bot\Api;

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

            $this->sendTelegramNotif($issue);
        }

        // Redirect to the issueToday route
        return redirect()->route('issueToday')->with('success', 'Data berhasil ditambahkan');
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
        $issue = Issue::with(['departemen', 'teknisi', 'hardware'])->findOrFail($issue->id);
        $departemen = Departemen::all('id', 'nama_departemen');
        $hardware = Hardware::all('id', 'nama_hardware');
        $teknisi = Teknisi::all('id', 'nama_teknisi');

        $updatedAt = $issue->updated_at;
        $updatedAtDate = $updatedAt->format('Y-m-d');
        $updatedAtTime = $updatedAt->format('H:i');

        return view('pages.issue.edit', compact('issue', 'departemen', 'hardware', 'teknisi', 'updatedAtDate', 'updatedAtTime'));
    }

    public function update(UpdateIssueRequest $request, Issue $issue)
    {
        $validatedData = $request->validated();

        // dd($validatedData);

        // Buat timestamp dari tanggal dan waktu
        $updatedAt = Carbon::createFromFormat('Y-m-d H:i', "{$validatedData['updated_at_date']} {$validatedData['updated_at_time']}");

        // Perbarui data issue dengan nilai baru, termasuk timestamp updated_at
        $issue->update(array_merge($validatedData, ['updated_at' => $updatedAt]));

        // dd($issue);

        // Redirect dengan pesan sukses
        return redirect()->route('issueToday')->with('success', 'Data berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Issue $issue)
    {
        $deletedissue = Issue::findOrFail($issue->id);
        $deletedissue->delete();

        return redirect()->route('issue.index')->with('success', 'Data berhasil Dihapus');
    }

    public function deletedList(Request $request)
    {
        $deletedIssue = Issue::onlyTrashed()
            ->when($request->input('nama'), function ($query, $nama) {
                return $query->where('nama', 'like', '%' . $nama . '%');
            })
            ->when($request->input('created_at'), function ($query, $created_at) {
                return $query->where('created_at', 'like', '%' . $created_at . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        // Debug the result to see if hardware data is included
        // dd($deletedIssue);

        return view('pages.issue.deleted-list', compact('deletedIssue'));
    }


    public function restore($id)
    {
        $issue = Issue::withTrashed()->findOrFail($id);
        $issue->restore();

        // dd($issue);

        return redirect()->route('deletedList')->with('success', 'Issue successfully restored.');
    }

    public function sendTelegramNotif(Issue $issue)
    {
        $telegram = new Api(env('TELEGRAM_BOT_TOKEN'));
        $chatID = env('TELEGRAM_CHAT_ID');

        $message = "[SIMAT]\n" .
            "Nama: " . $issue->nama . "\n" .
            "Deskripsi: " . strip_tags($issue->deskripsi) . "\n" .
            "Status: " . $issue->status . "\n" .
            "Departemen: " . $issue->departemen->nama_departemen . "\n" .
            "Hardware Problem: ";

        foreach ($issue->hardware as $item) {
            $message .= $item->nama_hardware;
        }

        $telegram->sendMessage([
            'chat_id' => $chatID,
            'text' => $message,
        ]);
    }
}
