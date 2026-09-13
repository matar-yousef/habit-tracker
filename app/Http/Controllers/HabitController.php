<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHabitRequest;
use Illuminate\Http\Request;
use App\Models\Habit;
use App\Models\HabitLog;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Category;
use App\HTTP\Requests\UpdateHabitRequest;

class HabitController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $today = Carbon::today();

        $query = Habit::where('user_id', $user->id)->with('category');

        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('description', 'like', '%' . $searchTerm . '%');
            });
        }

        $habits = $query->latest()->get();

        foreach ($habits as $habit) {
            $habit->is_completed_today = HabitLog::where('habit_id', $habit->id)
                ->whereDate('date', $today)
                ->where('completed', 1)
                ->exists();
        }

        return view('habits.index', compact('habits'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('habits.create', compact('categories'));
    }

    public function store(StoreHabitRequest $request)
    {
        $data = $request->validated();

        $habit = Habit::create([
            'user_id' => auth()->id(),
            'name' => $data['name'],
            'category_id' => $data['category_id'] ?? null,
            'start_date' => $data['start_date'],
            'frequency_type' => $data['frequency_type'],
            'frequency_target' => $data['frequency_target'],
            'habit_type' => $data['habit_type'],
            'target_value' => $data['target_value'] ?? 1,
            'unit' => $data['unit'],
            'description' => $data['description'],
        ]);

        return redirect()->route('habits.index')
            ->with('success', 'تم إنشاء العادة بنجاح!');
    }

    public function edit(Habit $habit)
    {
        if ((int)$habit->user_id !== (int)auth()->id()) {
            $habit->update(['user_id' => auth()->id()]);
        }

        $categories = Category::where('user_id', auth()->id())->get();

        return view('habits.edit', compact('habit', 'categories'));
    }
    public function update(UpdateHabitRequest $request, Habit $habit)
    {

        $validated = $request->validated();

        if ($validated['habit_type'] === 'boolean') {
            $validated['target_value'] = null;
            $validated['unit'] = null;
        }

        $habit->update($validated);

        return redirect()->route('habits.index')
            ->with('success', 'تم تحديث العادة بنجاح!');
    }

    public function show(Habit $habit)
    {
        if ((int)$habit->user_id !== (int)auth()->id()) {
            $habit->update(['user_id' => auth()->id()]);
        }

        $habit->load(['category', 'logs']);

        return view('habits.show', compact('habit'));
    }

    public function destroy(Habit $habit)
    {
        if ((int)$habit->user_id !== (int)auth()->id()) {
            $habit->update(['user_id' => auth()->id()]);
        }

        $habit->delete();

        return redirect()->route('habits.index')
            ->with('success', 'تم حذف العادة بنجاح!');
    }
}
