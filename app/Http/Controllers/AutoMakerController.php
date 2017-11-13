<?php

namespace App\Http\Controllers;

use App\Automaker;
use App\Http\Requests\AutoMakerRequest;
use App\Http\Requests\MarksRequest;
use Illuminate\Http\Request;

class AutoMakerController extends Controller
{
    /**
     * @var Automaker
     */
    private $automaker;

    /**
     * AutoMakerController constructor.
     * @param Automaker $automaker
     */
    public function __construct(Automaker $automaker)
    {
        $this->automaker = $automaker;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $marks = $this->automaker->search($search)
            ->orderBy('id')
            ->paginate(3);
        return view('adminlte::mark.index', compact('marks', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminlte::mark.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MarksRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(MarksRequest $request)
    {
        $dataForm = $request->all();

        $mark['name'] = $dataForm['name'];
        $mark['description'] = $dataForm['description'];
        if($request->hasFile('image')){
            $image = $request->file('image');
            $ex = $image->guessClientExtension();
            $directory = "img/marks";
            $name_image = "img_".rand(1111,9999).".".$ex;
            $image->move($directory, $name_image);
            $mark['image'] = $directory.'/'.$name_image;
        }
        $this->automaker->create($mark);
        return redirect()->route('mark.index')->with('msg', 'MONTADORA CADASTRADA COM SUCESSO!!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mark = $this->automaker->find($id);
        return view('adminlte::mark.edit', compact('mark'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MarksRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(MarksRequest $request, $id)
    {
        $dataForm = $request->all();

        $mark['name'] = $dataForm['name'];
        $mark['description'] = $dataForm['description'];
        if($request->hasFile('image')){
            $image = $request->file('image');
            $ex = $image->guessClientExtension();
            $directory = "img/padres";
            $name_image = "img_".rand(1111,9999).".".$ex;
            $image->move($directory, $name_image);
            $mark['image'] = $directory.'/'.$name_image;
        }

        $this->automaker->find($id)->update($mark);
        return redirect()->route('mark.index')->with('msg', 'MONTADORA ALTERADA COM SUCESSO!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->automaker->find($id)->delete();
        return redirect()->route('mark.index')->with('msg', 'MONTADORA EXCLUÍDA COM SUCESSO!');
    }
}
