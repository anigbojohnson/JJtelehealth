<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MedicationController extends Controller
{
    public function search(Request $request)
    {
        $medicationName = $request->input('search');
    
        $medications = [];

        if ($medicationName) {
            $response = Http::get('https://api.fda.gov/drug/label.json', [
                'search' => "openfda.generic_name:$medicationName",
                'limit' => 10
            ]);

            if ($response->successful()) {
                $results = $response->json()['results'];
                dd( $results);

                foreach ($results as $result) {
                    $medications[] = [
                        'generic_name' => $result['openfda']['generic_name'][0] ?? 'Unknown',
                        'brand_name' => $result['openfda'][''][0] ?? 'Unknown',
                        'manufacturer_name' => $result['openfda']['manufacturer_name'][0] ?? 'Unknown',
                        'dosage_form' => $result['openfda']['dosage_form'][0] ?? 'Unknown'
                    ];
                }
                dd( $medications);
            } else {
                $medications[] = ['generic_name' => 'Error fetching data from FDA API'];
            }
        }

    }
}
?>