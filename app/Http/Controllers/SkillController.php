<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Skill;
use App\Http\Requests\SkillRequest;

class SkillController extends Controller
{
    public function create()
    {
        $categories = Category::all();

        return view('skills.create')
            ->with(['categories' => $categories]);
    }

    public function store(SkillRequest $request)
    {
        $skill = new Skill();
        $skill->name = $request->name;
        $skill->category_id = $request->id;
        $skill->save();

        return redirect()
            ->route('index');
    }

    public function edit(Skill $skill)
    {
        $categories = Category::all();

        return view('skills.edit')
            ->with([
                'categories' => $categories,
                'skill' => $skill,
            ]);
    }

    public function update(SkillRequest $request, Skill $skill)
    {
        $skill->name = $request->name;
        $skill->category_id = $request->id;
        $skill->save();

        return redirect()
            ->route('index');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()
            ->route('index');
    }

    public function register(Request $request)
    {
        $skills = Skill::all();
        $ids = $request->id;

        foreach ($skills as $skill) {
            $skill->is_experience = false;
            $skill->save();
        }

        if ($ids) {
            foreach ($ids as  $id) {
                $skill = Skill::find($id);

                $skill->is_experience = true;
                $skill->save();
            }
        }

        return redirect()
            ->route('index');
    }
}
