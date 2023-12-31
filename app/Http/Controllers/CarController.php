<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Category;
use App\Traits\Common;

class CarController extends Controller
{
    use Common;
    private $columns = [
        'title',
        'description',
        'published',
        'category_id'
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cars = Car::get();
        $categories = Category::get(); 
        return view('cars', compact('cars','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::get(); 
        return view('addCar',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //$request -> associative array
    {
        //
        // return dd($request->request); //dd datadump == echo but for associative array
        // $cars= new Car();
        // $cars->title= "BMW";
        // $cars->description= "BMW deccription";
        // $cars->published = 1;
        // $cars->save();
        // return 'Data added successfully';
        //////////////////////////////////////////////////////////////////////////
        // $cars= new Car();
        // $cars->title= $request->title;
        // $cars->description= $request->description;
        // if(isset($request->published)){
        //     $cars->published = 1;
        // }else{
        //     $cars->published = 0;
        // }
        // $cars->save();
        // return '<h1>Data added successfully</h1>';
        //////////////////////////////////////////////////////////////////////////
        // $cars = $request->only($this->columns);
        // $cars['published'] = isset($request->published);
        // Car::create($cars);
        // return redirect('cars');
        //////////////////////////////////////////////////////////////////////////
        // $messages=[
        //     'title.required'=>'العنوان مطلوب',
        //     // 'title.string'=>'Should be string',
        //     'description.required'=> 'should be text',
        //     ];
        //////////////////////////////////////////////////////////////////////////

        $messages = $this->messages();
        $cars = $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'required|string',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'category_id' => 'required',
        ], $messages); //

        $fileName = $this->uploadFile($request->image, 'assets/images');

        $cars = $request->only($this->columns);
        $cars['published'] = isset($request->published);
        $cars['image'] = $fileName;
        Car::create($cars);
        return redirect('cars');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $car = Car::findOrFail($id);
        $categories = Category::get(); 
        return view('viewCar', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $car = Car::findOrFail($id);
        $categories = Category::get(); 
        return view('updateCar', compact('car','categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) //request->form data ,, string->parameter from route
    {
        // $cars = $request->only($this->columns);
        // $cars['published'] = isset($request->published);
        // Car::where('id', $id)->update($cars);
        // return redirect('cars');
        ///////////////////////////////////////////////////////////////////////////////////////////
        // $imup->validate([
        //     'title' => 'required|string|max:50',
        //     'description' => 'required|string',
        //     'image' => 'nullable|mimes:png,jpg,jpeg|max:2048', // Allow empty image for updates
        // ]);

        // // Find the car to update
        // // $car = Car::findOrFail($id);

        // // Handle image update
        // if ($imup->hasFile('image')) {
        //     // Upload new image
        //     $fileName = $this->uploadFile($request->image, 'assets/images');
        //     // Delete the old image if needed, depending on your requirements
        //     Car::delete('assets/images/' . $cars->image);
        //     // Update the car with the new image
        //     $cars->image = $fileName;
        // }
        //         $car['published'] = isset($request->published);


        // Car::where('id', $id)->update($cars);

        // // $car->save();

        // return redirect('cars')->with('success', 'Car updated successfully');
        //////////////////////////////////////////////////////////////////////////////////////////
        //Task7
        $messages = $this->messages();
        $cars = $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'required|string',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048', //nullable or sometimes

            //Task 10
            'category_id' => 'required',
            
        ], $messages); //
        $cars = $request->only($this->columns);
        if ($request->hasFile('image')) {
            $fileName = $this->uploadFile($request->image, 'assets/images');
            $cars['image'] = $fileName;
            // unlink("assets/images/" . $request->oldImage); //to delete old image
        }
        $cars['published'] = isset($request->published);
        Car::where('id', $id)->update($cars); //where or findorfail
        return redirect('cars')->with('success', 'Car updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::where('id', $id)->delete();
        return redirect('cars');
    }
    ///////////////////////////////////////////////////////////////////////////
    public function trashed()
    {
        $cars = Car::onlyTrashed()->get();
        return view('trashed', compact('cars'));
    }

    public function forceDelete(string $id)
    {
        Car::where('id', $id)->forceDelete();
        return redirect('cars');
    }

    public function restore(string $id)
    {
        Car::where('id', $id)->restore();
        return redirect('cars');
    }

    public function messages()
    {
        return [
            'title.required' => 'عنوان السيارة مطلوب',
            'title.string' => 'Should be string',
            'description.required' => 'Should be text',
            'image.required' => 'Please insert image',
            'image.mimes' => 'Incorrect image type',
            'image.max' => 'Image size exceeded the limit ',
            'category_id.required' => 'Please select category',

        ];
    }

}
