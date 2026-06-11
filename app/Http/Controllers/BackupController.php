<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Backup;

class BackupController extends Controller
{
    
    public function create()
    {
        return view('backups.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'backup_type'     => 'required|string',
            'backup_datetime' => 'required',
            'image'           => 'required|image|mimes:jpeg,png,jpg|max:2048', 
        ]);

    $imageName = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            
            $imageName = time() . '_' . strtolower($request->backup_type) . '.' . $file->getClientOriginalExtension();
            
            $file->storeAs('public/backups', $imageName);
        }

        Backup::create([
            'backup_type'     => $request->backup_type,
            'backup_datetime' => $request->backup_datetime,
            'image'           => $imageName, 
            'created_by'      => auth()->user()->name, 
        ]);

        return redirect()->back()->with('success', 'Backup record logged successfully!');
}
}
