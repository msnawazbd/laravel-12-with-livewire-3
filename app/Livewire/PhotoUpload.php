<?php

namespace App\Livewire;

use App\Models\Photo;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class PhotoUpload extends Component
{
    use WithFileUploads, WithPagination;
    public $photo;

    #[Url] // http://127.0.0.1:8000/photo-upload?search=455351204
    public $search;

    protected $paginationTheme = 'bootstrap';

    public function store()
    {
        $this->validate([
            'photo' => 'required|image|max:5120', // 5MB Max
        ]);

        $filepath = $this->photo->store('photos', 'public');

        Photo::query()->create([
            'title' => $this->photo->getClientOriginalName(),
            'filepath' => $filepath,
        ]);

        session()->flash('success', 'Photo uploaded successfully!');

        return redirect()->route('photoUpload');
    }

    public function download($filepath)
    {
        info($filepath);
        return response()->download(storage_path('app/public/' . $filepath));
    }

    public function render()
    {
        return view('livewire.photo-upload', [
            'photos' => Photo::query()
                ->where('title', 'LIKE', '%' . $this->search . '%')
                ->paginate(2),
        ]);
    }
}
