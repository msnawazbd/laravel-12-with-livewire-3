<?php

namespace App\Livewire;

use App\Models\Photo;
use App\Traits\HasToastNotifications;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class PhotoUpload extends Component
{
    use WithFileUploads, WithPagination, HasToastNotifications;
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

        // Using the trait for toast notifications
        $this->dispatchSuccessToast('Photo uploaded successfully!');
        $this->photo = '';

        /*session()->flash('success', 'Photo uploaded successfully!');*/

        // return redirect()->route('photoUpload');
    }

    public function download($filepath)
    {
        info($filepath);
        return response()->download(storage_path('app/public/' . $filepath));
    }

    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
        $photo->delete();

        // session()->flash('success', 'Photo deleted successfully!');

        $this->dispatchWarningToast('Photo deleted successfully!');

        // return redirect()->route('photoUpload');
    }

    public function render()
    {
        return view('livewire.photo-upload', [
            'photos' => Photo::query()
                ->where('title', 'LIKE', '%' . $this->search . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(2),
        ]);
    }
}
