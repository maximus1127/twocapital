<?php

namespace App\Exports;

use App\Investment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class InvestmentsExport implements FromView
{
    public function __construct($id){

        $this->id = $id;
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
      {
          return view('exports.investments', [
              'investments' => Investment::where('listing_id', $this->id)->get()
          ]);
      }
}
