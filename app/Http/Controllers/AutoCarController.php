<?php

namespace App\Http\Controllers;

use App\AutoCar;
use App\Automaker;
use App\Http\Requests\CarsRequest;
use Illuminate\Http\Request;

class AutoCarController extends Controller
{
    /**
     * @var AutoCar
     */
    private $autocar;
    /**
     * @var Automaker
     */
    private $automaker;

    /**
     * AutoCarController constructor.
     * @param AutoCar $autocar
     * @param Automaker $automaker
     */
    public function __construct(AutoCar $autocar, Automaker $automaker)
    {
        $this->autocar = $autocar;
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
        $cars = $this->autocar->search($search)
            ->orderBy('id')
            ->paginate(3);
        return view('adminlte::car.index', compact('cars', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marks = $this->automaker->pluck('name', 'id');
        $car = $this->autocar->all();
        return view('adminlte::car.create', compact('car', 'marks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * Validação personalizada
     *
     * @param CarsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarsRequest $request)
    {
        $dataForm = $request->all();

        $car['name'] = $dataForm['name'];
        $car['description'] = $dataForm['description'];
        $car['price'] = $dataForm['price'];
        $car['year'] = $dataForm['year'];
        $car['automaker_id'] = $dataForm['automaker_id'];

        if($request->hasFile('image')){
            $image = $request->file('image');
            $ex = $image->guessClientExtension();
            $directory = "img/car";
            $name_image = "img_".rand(1111,9999).".".$ex;
            $image->move($directory, $name_image);
            $car['image'] = $directory.'/'.$name_image;
        }
//        dd($car);
        $this->autocar->create($car);
        return redirect()->route('car.index')->with('msg', 'VEÍCULO CADASTRADO COM SUCESSO!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marks = $this->automaker->pluck('name', 'id');
        $car = $this->autocar->find($id);
        return view('adminlte::car.edit', compact('car', 'marks'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataForm = $request->all();

        $car['name'] = $dataForm['name'];
        $car['description'] = $dataForm['description'];
        $car['price'] = $dataForm['price'];
        $car['year'] = $dataForm['year'];
        $car['automaker_id'] = $dataForm['automaker_id'];

        if($request->hasFile('image')){
            $image = $request->file('image');
            $ex = $image->guessClientExtension();
            $directory = "img/car";
            $name_image = "img_".rand(1111,9999).".".$ex;
            $image->move($directory, $name_image);
            $car['image'] = $directory.'/'.$name_image;
        }
//        dd($car);
        $this->autocar->find($id)->update($car);
        return redirect()->route('car.index')->with('msg', 'VEÍCULO CADASTRADO COM SUCESSO!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->autocar->find($id)->delete();
        return redirect()->route('car.index')->with('msg', 'VEÍCULO EXCLUÍDO COM SUCESSO!');
    }
}
