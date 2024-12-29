<?php

namespace App\Imports;

use App\Models\Lead;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Carbon\Carbon;

class LeadsImport implements ToCollection, WithHeadingRow, WithCustomCsvSettings, WithValidation
{
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';',
            'enclosure' => '"',
            'input_encoding' => 'UTF-8',
        ];
    }

    public function collection($rows)
    {
        foreach ($rows as $row) {
            $postalCode = trim($row['plz'], '="');

            $coordinates = $this->extractCoordinates($row['geo_koordinaten_des_objekts']);
            
            $additionalInfo = trim($row['sonstige_informationen'], '="');

            $lead = new Lead();
            $lead->created_by = auth()->id();
            $lead->date = $this->parseGermanDate($row['datum']);
            $lead->request_id = $row['anfragen_id'];
            $lead->title = $row['anrede'];
            $lead->first_name = $row['vorname'];
            $lead->last_name = $row['nachname'];
            $lead->company = $row['firma'];
            $lead->street_address = $row['strasse_und_hausnummer'];
            $lead->postal_code = $postalCode;
            $lead->city = $row['ort'];
            $lead->latitude = $coordinates['latitude'];
            $lead->longitude = $coordinates['longitude'];
            $lead->contact_number = $row['kontaktnummer'];
            $lead->additional_number = $row['zusatznummer'];
            $lead->email = $row['e_mail'];
            $lead->interest_in = $row['interesse_an'];
            $lead->installation_location = $row['worauf_soll_die_solaranlage_installiert_werden'];
            $lead->surface_orientation = $row['ausrichtung_der_flache'];
            // $lead->ownership_status = $row['eigentumsverhatnis'];
            $lead->surface_age = $row['alter_der_flache'];
            $lead->power_consumption = (int) $row['stromverbrauch'];
            $lead->sunny_area_sqm = (float) $row['sonnige_flache_in_qm'];
            $lead->storage_interest = $row['sind_sie_an_einem_stromspeicher_interessiert'] === 'Ja';
            $lead->surface_inclination = $row['neigung_der_flache'];
            $lead->purchase_type = $row['art_des_erwerbs'];
            $lead->additional_interests = $row['ausserdem_interessiert_an'];
            $lead->additional_information = $additionalInfo;
            $lead->save();
        }
    }

    private function parseGermanDate($date)
    {
        return Carbon::createFromFormat('d.m.Y', $date)->format('Y-m-d');
    }

    private function extractCoordinates($url)
    {
        preg_match('/q=(-?\d+\.\d+),(-?\d+\.\d+)/', $url, $matches);
        return [
            'latitude' => $matches[1] ?? null,
            'longitude' => $matches[2] ?? null,
        ];
    }

    public function rules(): array
    {
        return [
            'datum' => 'required|date',
            'anfragen_id' => 'required',
            'anrede' => 'required',
            'vorname' => 'required',
            'nachname' => 'required',
            'strasse_und_hausnummer' => 'required',
            'plz' => 'required',
            'ort' => 'required',
            'geo_koordinaten_des_objekts' => 'required',
            'kontaktnummer' => 'required',
            'e_mail' => 'required|email',
            'interesse_an' => 'required',
            'worauf_soll_die_solaranlage_installiert_werden' => 'required',
            'ausrichtung_der_flache' => 'required',
            // 'eigentumsverhatnis' => 'required',
            'alter_der_flache' => 'required',
            'stromverbrauch' => 'required|integer',
            'sonnige_flache_in_qm' => 'required|numeric',
            'sind_sie_an_einem_stromspeicher_interessiert' => 'required',
            'neigung_der_flache' => 'required',
            'art_des_erwerbs' => 'required',
        ];
    }
}
