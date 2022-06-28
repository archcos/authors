<?php
namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Traits\ApiResponser;
use DB;

Class AuthorController extends Controller {
    use ApiResponser;

    private $request;
    public function __construct(Request $request){
        $this->request = $request;
    }


    public function index(){

        $author = Author::all();

        return $this->successResponse($author);
    }

    public function add(Request $request){
        $rules = [
            'fullname' => 'required|max:150',
            'gender' => 'required|max:10',
            'birthday' => 'required|date:y-m-d',
        ];

        $this->validate($request, $rules);

        $author = Author::create($request->all());

    return $this->successResponse($author, Response::HTTP_CREATED);
    }

    public function show($id){
        $author = Author::where('id', $id)->first();
        if($author){
            return $this->successResponse($author);
        }
            return $this->errorResponse("Author id not found", Response::HTTP_NOT_FOUND);
        }

    public function update(Request $request, $id)  {
        $author = Author::findOrFail($id);
        $author->update($request->all());
    
            return $this->successResponse($author, Response::HTTP_CREATED);
        }

    public function delete($id, Request $request)
        {
            $author = Author::findOrFail($id);
            $author->delete($request->all());

            return $this->successResponse($author, Response::HTTP_OK);
        }

}