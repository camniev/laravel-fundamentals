<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;

class ImportExcelController extends Controller
{
    function index() {
        $data = DB::table('stock_libs')->orderBy('description', 'ASC')->get();
        return view('import_excel', compact('data'));
    }

    // $request will receive excel file upload request for import data
    function import(Request $request) {
        // set validation rules first
        $this->validate($request, [
            'select_file' => 'required|mimes:xls,xlsx'
        ]);

        // getrealpath() will return temporary path of selected file which has been stored under path variable
        $path = $request->file('select_file')->getRealPath();

        // use package to store excel data to mysql
        // use cmd and type composer require maatwebsite/excel and go to config/app.php to add lines

        //importing
        //load method will load a file
        //get returns all sheets and rows data which has been stored under $data
        // $data = Excel::load($path)->get();
        $data = Excel::load($path)->get();

        if($data->count() > 0) {
            //toArray method will convert $data object to array
            foreach($data->toArray() as $key => $value) {
                foreach($value as $row) {
                    $insert_data[] = array(
                        'stock_code'        => $row['stock_code'],
                        'description'       => $row['description'],
                        'unit'              => $row['unit'],
                        'expense_category'  => $row['expense_category']
                    );
                }
            }

            if(!empty($insert_data)) {
                DB::table('stock_libs')->insert($insert_data);
            }
        }
        return back()->with('success', 'Excel Data Imported successfully.');
    }
}
