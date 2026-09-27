# Guia curta per defensar el projecte

## Per què Laravel?
Laravel em dona una estructura clara per a rutes, models, validació, autenticació i base de dades.

## Per què Livewire?
Per a les pàgines que canvien dades: cerca, filtres i CRUD. Així puc fer interaccions dinàmiques escrivint principalment PHP i Blade.

## Per què Alpine?
Per a interaccions que no necessiten servidor, com obrir el menú mòbil o mostrar/amagar una contrasenya.

## Per què Tailwind?
Perquè puc construir el disseny directament amb classes utilitàries i fer-lo responsive sense una fulla CSS gran.

## Relacions
- Una categoria té molts llibres: `Category::hasMany(Book::class)`.
- Un llibre pertany a una categoria: `Book::belongsTo(Category::class)`.
- Un usuari pot guardar molts llibres i un llibre pot estar als preferits de molts usuaris: `belongsToMany()` amb la taula `wishlists`.

## On hi ha el CRUD?
- `app/Livewire/Pages/Admin/Books.php`
- `app/Livewire/Pages/Admin/Categories.php`
- `app/Livewire/Pages/Admin/Users.php`

Els formularis estan dins de les seves vistes Blade, per tant les operacions són accessibles des del frontend.

## On hi ha la validació?
Als components Livewire amb `#[Validate(...)]` o amb `$this->validate(...)`.

## On hi ha els rols?
El camp `role` de `users` pot ser `user` o `admin`. El middleware `AdminOnly` protegeix les rutes `/admin/*`.

## On hi ha el multi-filtre?
A `Catalog.php`: text, categoria i disponibilitat.

## Com funciona la cerca?
`wire:model.live.debounce.400ms` actualitza la propietat `search`; Livewire torna a executar la consulta i només actualitza la part necessària de la pàgina.
