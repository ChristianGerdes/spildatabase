<?php

namespace App\Http\Controllers;

use App\Models\Contributor;

class ContributorsController extends Controller
{
    public function show(Contributor $contributor)
    {
        $contributor->load('credits')->loadCount('credits');

        return view('contributors.show', compact('contributor'));
    }
}
