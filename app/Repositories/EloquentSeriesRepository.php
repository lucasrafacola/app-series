<?php

namespace App\Repositories;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Serie;
use Illuminate\Support\Facades\DB;

class EloquentSeriesRepository implements SeriesRepository
{
    public function add(SeriesFormRequest $request): Serie
    {
        return DB::transaction(function () use ($request) {
            $serie = Serie::create($request->all());
            $temporadas = [];

            for ($i = 1; $i <= $request->temporadas; $i++) {
                $temporadas[] = [
                    'serie_id' => $serie->id,
                    'numero' => $i
                ];
            }
            Season::insert($temporadas);

            $episodios = [];

            foreach ($serie->temporadas as $temporada) {
                for ($j = 1; $j <= $request->episodios; $j++) {
                    $episodios[] = [
                        'season_id' => $temporada->id,
                        'numero' => $j
                    ];
                }
            }
            Episode::insert($episodios);

            return $serie;
        });
    }
}
