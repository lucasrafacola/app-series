<x-layout title="Nova Série">

    <form action="{{ route('series.store') }}" method="post">
        @csrf

        <div class="row mb-3">
            <div class="col-8">
                <label for="nome" class="form-label">Nome:</label>
                <input autofocus type="text" id="nome" name="nome" class="form-control" value="{{ old('nome') }}">
            </div>
            <div class="col-2">
                <label for="temporadas" class="form-label">Nº Temporadas:</label>
                <input type="text" id="temporadas" name="temporadas" class="form-control" value="{{ old('temporadas') }}">
            </div>
            <div class="col-2">
                <label for="episodios" class="form-label">Nº Episódios por Temp:</label>
                <input type="text" id="episodios" name="episodios" class="form-control" value="{{ old('episodios') }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>

</x-layout>
