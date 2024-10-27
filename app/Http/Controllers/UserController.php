<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scripts\SSP;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function settings(){
        return view('auth.user');
    }

    public function sing(){
        return view('auth.sing');
    }

    // Populate data table ajax
    public function populateDtSing(Request $request)
    {
        if (request()->ajax()) {       
            
            $table = <<<EOT
                (
                    SELECT
                    musics.id as id,
                    musics.name as name,
                    musics.URL as URL,
                    musics.user_id as user_id,
                    users.name as user_name
                    FROM  musics
                    INNER JOIN users ON  musics.user_id = users.id
                    ) temp
                EOT;
            // Table's primary key
            $primaryKey = 'id';
            
            $columns = array(
                array('db' => 'id',             'dt' => 'id'),
                array('db' => 'name',           'dt' => 'name'),
                array('db' => 'URL',            'dt' => 'URL'),
                array('db' => 'user_name',      'dt' => 'user_name'),
                array('db' => 'user_id',        'dt' => 'user_id'),
            );  
            
            // SQL server connection information
            $sql_details = array(
                'user' => env('DB_USERNAME'),
                'pass' => env('DB_PASSWORD'),
                'db'   => env('DB_DATABASE'),
                'host' => env('DB_HOST'),
            );
            echo json_encode(
                SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns)
            );
            return;
        } else {
            return abort(404);
        }
    }

    public function storeYoutubeLink(Request $request)
{
    // Valide o link do YouTube
    $request->validate([
        'youtube_link' => ['required', 'regex:/^(https?\:\/\/)?(www\.youtube\.com|youtu\.?be)\/.+$/']
    ]);
    

    // Salve o link no banco de dados (modifique de acordo com sua estrutura)
    DB::table('musics   ')
    ->insert([
        'name' => 'Padrao',
        'URL' => $request->input('youtube_link'),
        'user_id' => auth()->user()->id,
        'created_at' =>  date("Y/m/d H:i:s"),
    ]);

    return response()->json(['success' => true, 'message' => 'Link salvo com sucesso!']);
}


}
