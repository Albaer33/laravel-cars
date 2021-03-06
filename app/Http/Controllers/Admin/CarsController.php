<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Car;
Use App\Http\Controllers\Controller;
use App\Category;
use App\Optional;


class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();        
        return view('admin.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $optionals = Optional::all();
        
        return view('admin.cars.create', compact('categories', 'optionals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = $request->all();
        $request->validate($this->getValidationRules());
        
        // creo nuova variabile model, la popolo e salvo
        $new_car = new Car();
        $new_car->fill($form_data);
        $new_car->save();

        if(array_key_exists('optionals', $form_data)) {
            $new_post->tags()->sync($form_data['tags']);
        } 

        return redirect()->route('admin.cars.show', ['car' => $new_car->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::findOrFail($id);        
        return view('admin.cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::findOrFail($id);
        $categories = Category::all();
        $optionals = Optional::all();

        return view('admin.cars.edit', compact('car', 'categories', 'optionals'));
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
        $request->validate($this->getValidationRules());
        $form_data = $request->all();
        $car_to_update = Car::findOrFail($id);

        if(isset($form_data['optional'])) {
            $car_to_update->optionals()->sync($form_data['optional']); 
        } else {
            $car_to_update->optionals()->sync([]);
        }

        $car_to_update->update($form_data);

        return redirect()->route('admin.cars.show', ['car'=> $car_to_update->id] );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car_to_delete = Car::findOrFail($id);
        $car_to_delete->optionals()->sync([]);
        $car_to_delete->delete();

        return redirect()->route('admin.cars.index');
    }

    protected function getValidationRules() {
        return [
            'marca' => 'required|max:30',
            'modello' => 'required|max:30',
            'cilindrata' => 'required|max:10',
            'porte' => 'required|max:6',
            'img' => 'required|max:250',
            'category_id' => 'exists:categories,id|nullable',
            'optionals' => 'exists:optionals,id'
        ];
    }

}
