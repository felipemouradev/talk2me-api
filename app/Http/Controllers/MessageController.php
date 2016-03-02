<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Message;
use App\Group;
class MessageController extends Controller
{
    //
    //
    public function index(Request $request){
        $query = $request->all();
        $group_query_slug = (isset($query['group'])) ? $query['group'] : null;

        $data = Message::getMessegesByGroup($group_query_slug);

        if (empty($data)) return response()->json(['response'=>'Sem mensagens nesse grupo']);

        return response()->json(['response'=>$data]);
    }

    public function store(Request $request){
        $data = $request->all();
        //dd($data);
        if (!empty($data)) {
            $save = Message::create($data);
            if ($save) {
                return response()->json(['response'=>'Mensagem Salva'],200);
            }
        }
        return response()->json(['response'=>false],403);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        $data['id'] = $id;
        if (!empty($data)){
            $update = Message::find($id)->update($data);
            if($update) {
                return response()->json(['response'=>'Atualizado com sucesso! '],200);
            }
        }
        return response()->json(['response'=>'Ocorreu um erro !'],400);
    }

    public function destroy($id){
        $del = Message::destroy($id);

        if($del) return response()->json(['response'=>'Deletado com sucesso!']);

        return response()->json(['response'=>'Ocorreu um erro!']);
    }

}
