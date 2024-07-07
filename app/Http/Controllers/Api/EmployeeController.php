<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Importation du model emplolyee
use App\Models\Model\Employee;

// Importation de image intervention
use Image;
use DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::all();
        return response()->json($employee);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /* public function store(Request $request)
    {
        $validation = $request->validate([
            'nom_complet' => 'required|max:255',
            'email' => 'required',
            'num_cni' => 'required|max:10',
            'adresse' => 'required',
            'date_naissance' => 'required',
            'telephone1' => 'required',
            'salaire' => 'required',
        ]);

        // Validation de l'image
        if($request->photo){ 
            $position = strpos($request->photo, ';');
            $sub = substr($request->photo, 0, $position);
            $ext = explode('/', $sub)[1];

            $name = time().".".$ext;
            $img = Image::make($request->photo)->resize(240,200);
            $upload_path = 'backend/employee/';
            $image_url = $upload_path.$name;
            $img->save($image_url);
            

            $employee = new Employee;
            $employee->nom_complet = $request->nom_complet;
            $employee->email = $request->email;
            $employee->num_cni = $request->num_cni;
            $employee->adresse = $request->adresse;
            $employee->date_naissance = $request->date_naissance;
            $employee->photo = $image_url;
            $employee->telephone1 = $request->telephone1;
            $employee->telephone2 = $request->telephone2;
            $employee->salaire = $request->salaire;
            
            $employee->save();

        }
        else{
            $employee = new Employee;
            $employee->nom_complet = $request->nom_complet;
            $employee->email = $request->email;
            $employee->num_cni = $request->num_cni;
            $employee->adresse = $request->adresse;
            $employee->date_naissance = $request->date_naissance;
            $employee->telephone1 = $request->telephone1;
            $employee->telephone2 = $request->telephone2;
            $employee->salaire = $request->salaire;
            $employee->save();
        }
    } */

    public function store(Request $request)
    {
    
        // Validation des données typées
    $validation = $request->validate([
        'nom_complet' => 'required|max:255',
        'email' => 'required|email',
        'num_cni' => 'required|max:10',
        'date_naissance' => 'required|date',
        'telephone1' => 'required',
        'salaire' => 'required|numeric',
    ]);

        // Instancier le model
        $employee = new Employee;
        $employee->nom_complet = $request->nom_complet;
        $employee->email = $request->email;
        $employee->num_cni = $request->num_cni;
        $employee->adresse = $request->adresse;
        $employee->date_naissance = $request->date_naissance;
        $employee->telephone1 = $request->telephone1;
        $employee->telephone2 = $request->telephone2;
        $employee->salaire = $request->salaire;

        // Formatage de l'image et sauvegarde
        if ($request->photo) {
            $photo = $request->photo;
            $position = strpos($photo, ';');
            $sub = substr($photo, 0, $position);
            $ext = explode('/', $sub)[1];
            $name = time().'.'.$ext;
            // Décoder l'image base64
            $image = str_replace('data:image/'.$ext.';base64,', '', $photo);
            $image = str_replace(' ', '+', $image);
            $imageData = base64_decode($image);
            $upload_path = 'backend/employee/';
            $image_url = $upload_path.$name;       
            // Vérifier si le répertoire de sauvegarde existe
            if (!file_exists($upload_path)) {
                mkdir($upload_path, 0777, true);
            }
        
            // Sauvegarder l'image décodée
            file_put_contents(public_path($image_url), $imageData);     
            $employee->photo = $image_url;
        }
        // Enregistrement dans la base de donnée
        $employee->save();
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        $employee = DB::table('employees')->where('id',$id)->first();
        return response()->json($employee);
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
        $data = array();
        $data['nom_complet'] = $request->nom_complet;
        $data['email'] = $request->email;
        $data['num_cni'] = $request->num_cni;
        $data['adresse'] = $request->adresse;
        $data['date_naissance'] = $request->date_naissance;
        $data['telephone1'] = $request->telephone1;
        $data['telephone2'] = $request->telephone2;
        $data['salaire'] = $request->salaire;
        $image = $request->newphoto;

        // Verifier si l'image a été modifier
        if ($image) {
            $position = strpos($image, ';');
            $sub = substr($image, 0, $position);
            $ext = explode('/', $sub)[1];
            $name = time().'.'.$ext;
            // Décoder l'image base64
            $image = str_replace('data:image/'.$ext.';base64,', '', $photo);
            $image = str_replace(' ', '+', $image);
            $imageData = base64_decode($image);
            $upload_path = 'backend/employee/';
            $image_url = $upload_path.$name;       
            // Vérifier si le répertoire de sauvegarde existe
            if (!file_exists($upload_path)) {
                mkdir($upload_path, 0777, true);
            }
        
            // Sauvegarder l'image décodée
            $success = file_put_contents(public_path($image_url), $imageData); 
            
            if($success){
                $data['photo'] = $image_url;
                $imageData = DB::table('employees')->where('id',$id)->first();
                $image_path = $imageData->photo;
                $done = unlink(public_path($image_path));

                $user = DB::table('employees')->where('id',$id)->update($data);

            }
        }else{
            $oldphoto = $request->photo;
            $data['photo'] = $oldphoto;
            $user = DB::table('employees')->where('id',$id)->update($data);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    $employee = DB::table('employees')->where('id', $id)->first();
    // vérifier si la photo existe
    if ($employee) {
        $photo = $employee->photo;
        if ($photo) {
            // supprimer la photo
            if (file_exists(public_path($photo))) {
                unlink(public_path($photo));
            }
        }
        DB::table('employees')->where('id', $id)->delete();
        return response()->json(['message' => 'Employee deleted successfully']);
    } else {
        return response()->json(['message' => 'Employee not found'], 404);
    }
}

}
