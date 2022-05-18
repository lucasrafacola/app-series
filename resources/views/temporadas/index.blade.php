<x-layout title="Temporadas de {!! $serie->nome !!}">

    <ul class="list-group">

        <?php foreach($temporadas as $temporada) { ?>

        <li class="list-group-item d-flex justify-content-between align-items-center">
                Temporada <?= $temporada->numero ?>
            <span class="badge bg-secondary">
                {{ $temporada->episodes->count() }}
            </span>
        </li>

        <?php } ?>

    </ul>

</x-layout>
