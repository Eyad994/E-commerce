<?php

namespace App\Http\Controllers;

use App\Color;
use App\Status;

class ManagerController extends Controller
{
    public function indexColor()
    {
        $colors = Color::all();
        return view('managers.color.index', compact('colors'));
    }

    public function createColor()
    {
        return view('managers.color.create');
    }

    public function storeColor()
    {
        if (Color::create(request()->all())) {
            return redirect()->route('color.index');
        }
    }

    public function editColor($id)
    {
        return view('managers.color.index');
    }

    public function updateColor()
    {

    }

    public function destroyColor($id)
    {
        if (Color::destroy($id)) {
            return back();
        }
    }

    public function restoreColor()
    {
        $colors = Color::onlyTrashed()->get();

        return view('managers.color.restore', compact('colors'));
    }

    public function postRestoreColor($id = null)
    {
        if ($id != null) {
            Color::onlyTrashed()->where('id', $id)->restore();
        } else {
            if (isset(request()->id)) {
                Color::onlyTrashed()->whereIn('id', request()->id)->restore();
            } else {
                return back()->withStatus('Please check box to restore');
            }
        }
        return back();
    }


    // --------------------------------------------------

    public function indexStatus()
    {
        $colors = Status::all();
        return view('managers.status.index', compact('colors'));
    }

    public function createStatus()
    {
        return view('managers.status.create');
    }

    public function storeStatus()
    {
        if (Status::create(request()->all())) {
            return redirect()->route('status.index');
        }
    }

    public function editStatus($id)
    {
        return view('managers.status.index');
    }

    public function updateStatus()
    {

    }

    public function destroyStatus($id)
    {
        if (Status::destroy($id)) {
            return back();
        }
    }

}
