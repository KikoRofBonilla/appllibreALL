<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $fiction = Category::create([
            'name' => 'Ciència-ficció',
            'description' => 'Novel·les de futur, distopies i imaginació.',
        ]);

        $thriller = Category::create([
            'name' => 'Thriller',
            'description' => 'Suspens, misteri i tensió.',
        ]);

        $history = Category::create([
            'name' => 'Novel·la històrica',
            'description' => 'Històries ambientades en altres èpoques.',
        ]);

        User::create([
            'name' => 'Administrador',
            'email' => 'admin@appllibre.local',
            'password' => Hash::make('Admin123!'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Usuari Demo',
            'email' => 'usuari@appllibre.local',
            'password' => Hash::make('Usuari123!'),
            'role' => 'user',
        ]);

        Book::create([
            'category_id' => $fiction->id,
            'title' => '1984',
            'author' => 'George Orwell',
            'isbn' => '9780451524935',
            'publisher' => 'Secker & Warburg',
            'pages' => 328,
            'synopsis' => 'Distopia política sobre control social i vigilància totalitària.',
            'published_at' => '1949-06-08',
            'total_copies' => 3,
            'available_copies' => 3,
            'cover' => 'images/1984_GeorgeOrwell.jpg',
        ]);

        Book::create([
            'category_id' => $thriller->id,
            'title' => 'No tengas miedo',
            'author' => 'Stephen King',
            'isbn' => '9780306406157',
            'publisher' => 'Plaza & Janés',
            'pages' => 608,
            'synopsis' => 'Thriller amb amenaces, investigació i molta tensió.',
            'published_at' => '2025-01-01',
            'total_copies' => 2,
            'available_copies' => 2,
            'cover' => 'images/StephenKingNoTengasMiedo.webp',
        ]);

        Book::create([
            'category_id' => $history->id,
            'title' => 'Persiguiendo las estrellas',
            'author' => 'Sarah Lark',
            'isbn' => '9788491297659',
            'publisher' => 'Ediciones B',
            'pages' => 576,
            'synopsis' => 'Història de quatre joves en una escola femenina a Escòcia al segle XIX.',
            'published_at' => '2025-01-15',
            'total_copies' => 4,
            'available_copies' => 4,
            'cover' => 'images/sarahPark_persiguiendoLaEstrellas.webp',
        ]);

        $extraBooks = [
            [$fiction->id, 'Dune', 'Frank Herbert', 'Ace Books'],
            [$fiction->id, 'Fahrenheit 451', 'Ray Bradbury', 'Ballantine Books'],
            [$fiction->id, 'Un món feliç', 'Aldous Huxley', 'Chatto & Windus'],
            [$thriller->id, 'El silenci dels anyells', 'Thomas Harris', "St. Martin's Press"],
            [$thriller->id, 'La noia del tren', 'Paula Hawkins', 'Riverhead Books'],
            [$thriller->id, 'Sherlock Holmes', 'Arthur Conan Doyle', 'George Newnes'],
            [$history->id, 'Jo, Claudi', 'Robert Graves', 'Arthur Barker'],
            [$history->id, 'La sombra del viento', 'Carlos Ruiz Zafón', 'Planeta'],
            [$history->id, 'El nom de la rosa', 'Umberto Eco', 'Bompiani'],
        ];

        foreach ($extraBooks as [$categoryId, $title, $author, $publisher]) {
            Book::create([
                'category_id' => $categoryId,
                'title' => $title,
                'author' => $author,
                'publisher' => $publisher,
                'pages' => 300,
                'synopsis' => 'Llibre de demostració del catàleg AppLlibre.',
                'total_copies' => 2,
                'available_copies' => 2,
            ]);
        }
    }
}
