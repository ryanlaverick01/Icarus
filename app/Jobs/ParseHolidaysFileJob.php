<?php

namespace App\Jobs;

use App\Models\Category;
use App\Models\City;
use App\Models\Climate;
use App\Models\Continent;
use App\Models\Country;
use App\Models\Holiday;
use App\Models\Hotel;
use App\Models\Location;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ParseHolidaysFileJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $file;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($file)
    {
        $this->file = $file;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $fileContents = $this->getFileContents();
        $explodedFile = array_map('str_getcsv', explode("\n", $fileContents));

        $explodedFile[0] = [];
        foreach($explodedFile as $row) {
            if(count($row) <= 1) continue;

            Holiday::create([
                'hotel_id' => $this->getHotel($row[1]),
                'city_id' => $row[2] ? $this->getCity($row[2]) : null,
                'continent_id' => $this->getContinent($row[3]),
                'country_id' => $this->getCountry($row[4]),
                'category_id' => $this->getCategory($row[5]),
                'star_rating' => $row[6],
                'climate_id' =>$this->getClimate($row[7]) ,
                'location_id' => $this->getLocation($row[8]),
                'price_per_night' => $row[9],
            ]);
        }
    }

    protected function getHotel($name)
    {
        return Hotel::firstOrCreate([
            'name' => $name
        ])->id;
    }

    protected function getContinent($name)
    {
        return Continent::firstOrCreate([
            'name' => $name
        ])->id;
    }

    protected function getCountry($name)
    {
        return Country::firstOrCreate([
            'name' => $name
        ])->id;
    }

    protected function getCity($name)
    {
        return City::firstOrCreate([
            'name' => $name
        ])->id;
    }

    protected function getCategory($name)
    {
        return Category::firstOrCreate([
            'name' => $name
        ])->id;
    }

    protected function getClimate($name)
    {
        return Climate::firstOrCreate([
            'name' => $name
        ])->id;
    }

    protected function getLocation($name)
    {
        return Location::firstOrCreate([
            'name' => $name
        ])->id;
    }

    protected function getFileContents(): ?string
    {
        try {
            return Storage::disk('local')->get($this->file);
        } catch (FileNotFoundException $ex) {
            return $ex->getMessage();
        }
    }
}
