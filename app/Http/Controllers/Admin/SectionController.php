<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Address;
use App\Models\User;
use App\Models\Section;

class SectionController extends Controller
{
    public function index()
    { 
      
      $sections = Section::with(['address', 'user'])->get();
      return view('supervisor.branches', compact('sections'));

    }

    public function create()
    {
       
    }

      public function store(Request $request)
      {
          $request->validate([
              'time_opened' => 'required|date_format:H:i',
              'time_closed' => 'required|date_format:H:i',
              'address_id' => 'required|exists:addresses,id',
              'admin_id' => 'required|exists:admins,id',
          ]);
  
          Section::create([
              'time_opened' => $request->time_opened,
              'time_closed' => $request->time_closed,
              'address_id' => $request->address_id,
              'admin_id' => $request->admin_id,
          ]);
  
          return redirect()->route('sections.index')->with('success', 'تمت إضافة الفرع بنجاح');
      }
    

    public function destroy($section)
    {
        $section->delete();

        return redirect()->route('sections.index')->with('success', 'تم حذف الفرع بنجاح');
    }
    public function edit($id)
    {
        $section = Section::find($id);
        return view('sections.edit', compact('section'));
    }
    public function update(Request $request, $id)
    {
        $section = Section::find($id);
        $request->validate([
            'time_opened' => 'required|date_format:H:i',
            'time_closed' => 'required|date_format:H:i',
            'address_id' => 'required|exists:addresses,id',
            'admin_id' => 'required|exists:admins,id',
        ]);

        $section->update([
            'time_opened' => $request->time_opened,
            'time_closed' => $request->time_closed,
            'address_id' => $request->address_id,
            'admin_id' => $request->admin_id,
        ]);

        return redirect()->route('sections.index')->with('success', 'تم تعديل الفرع بنجاح');
    }
}
