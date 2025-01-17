<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\UpdateRequest;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class UpdateController extends Controller
{
    /**
     * @param UpdateRequest $request
     * @param Tag $tag
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function __invoke(UpdateRequest $request, Tag $tag)
    {
        $data = $request->validated();
        $tag->update($data);

        return view('tag.show', compact('tag'));
    }
}
