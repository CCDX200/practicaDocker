<?php
namespace App\Livewire;

use App\Models\Libros;
use Livewire\Component;

class LibrosA extends Component
{
    public $title, $genre, $synopsis, $isbn, $publisher, $userId, $bookId;
    public $books;
    public $isModalOpen = false;
    public $isEdit = false;

    public function mount()
    {
        $this->books = Libros::all();
    }

    public function openModal($bookId = null)
    {
        if ($bookId) {
            $this->isEdit = true;
            $book = Libros::find($bookId);
            $this->bookId = $book->id;
            $this->title = $book->titulo;
            $this->genre = $book->genero;
            $this->synopsis = $book->sinopsis;
            $this->isbn = $book->isbn;
            $this->publisher = $book->editorial;
            $this->userId = $book->user_id;
        } else {
            $this->resetInputFields();
            $this->isEdit = false;
        }

        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    public function createBook()
    {
        Libros::create([
            'titulo' => $this->title,
            'genero' => $this->genre,
            'sinopsis' => $this->synopsis,
            'isbn' => $this->isbn,
            'editorial' => $this->publisher,
            'user_id' => $this->userId,
        ]);

        session()->flash('message', 'Libro creado exitosamente.');
        $this->resetInputFields();
        $this->closeModal();
        $this->books = Libros::all();
    }

    public function updateBook()
    {
        $book = Libros::find($this->bookId);
        $book->update([
            'titulo' => $this->title,
            'genero' => $this->genre,
            'sinopsis' => $this->synopsis,
            'isbn' => $this->isbn,
            'editorial' => $this->publisher,
            'user_id' => $this->userId,
        ]);

        session()->flash('message', 'Libro actualizado exitosamente.');
        $this->resetInputFields();
        $this->closeModal();
        $this->books = Libros::all();
    }

    public function deleteBook($bookId)
    {
        $book = Libros::find($bookId);
        $book->delete();
        session()->flash('message', 'Libro eliminado exitosamente.');
        $this->books = Libros::all();
    }

    private function resetInputFields()
    {
        $this->title = '';
        $this->genre = '';
        $this->synopsis = '';
        $this->isbn = '';
        $this->publisher = '';
        $this->userId = '';
    }

    public function render()
    {
        return view('livewire.libros-a');
    }
}
