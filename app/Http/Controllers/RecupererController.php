<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recuperer;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

 class RecupererController extends Controller
{

    public function store(Request $request) {
        DB::beginTransaction();
        try {

            $existingUser = User::where('email', $request->email)->first();
            if ($existingUser) {
                // If the email already exists, return an error message
                DB::rollBack();
                return redirect()->back()->with('error', "L'adresse e-mail existe déjà. Veuillez utiliser une adresse e-mail différente.");
            }
            $user=new User();
            $user->email=$request->email;
            $user->name=$request->nom.' '.$request->prenom;
            $user->password=Hash::make($request->password);
            $user->save();
            $directory = public_path("pdf");

            $recuperer=new Recuperer();
            $recuperer->prenom=$request->prenom;
            $recuperer->nom=$request->nom;
            $recuperer->dateNaissance=$request->dateNaissance;
            $recuperer->adresse=$request->adresse;
            $recuperer->telephone=$request->telephone;
            $recuperer->sexe=$request->sexe;
            $recuperer->ville=$request->ville;
            $recuperer->pays=$request->pays;
            $recuperer->npa=$request->npa;
            $recuperer->numeroAvs=$request->numeroAvs;
            $recuperer->caissePensionActuelle=$request->caissePensionActuelle;
            $recuperer->travaille=$request->travaille;
            $recuperer->salarie=$request->salarie;
            $recuperer->recto ='data:image/png;base64,'. base64_encode(file_get_contents($request->file('recto')->getRealPath()));
            $recuperer->verso ='data:image/png;base64,'.base64_encode(file_get_contents($request->file('verso')->getRealPath()));
            $recuperer->signature=$request->signature;
            $recuperer->user_id=$user->id;
            $recuperer->save();

            $data=Recuperer::where("id",$recuperer->id)->first();
                $pdf = PDF::loadView('invoice',compact('data'));
            $pdf->getDomPDF()->getOptions()->set('isRemoteEnabled', true);
            $pdf->getDomPDF()->setHttpContext(stream_context_create([
                'ssl' => [  'verify_peer' => false,  'verify_peer_name' => false,  ],
            ]));
            $pdfPath = public_path('pdf/'.$data->nom.'-'.$data->prenom.'-'.$data->numeroAvs.'.pdf'); // Define the path where you want to save the PDF
            $pdf->save($pdfPath);
            DB::commit();
            return redirect()->back()->with('succes', "Votre demande a été envoyée avec succés .");
        } catch (\Exception $ex) {
                 DB::rollback();
                 return $ex->getMessage();
               return redirect()->back()->with('error', "Une erreur s'est produite, veuillez réessayer");
        }

    }



    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return  view('loading'); // Redirect to a dashboard or any other route after successful login.
        }

        return redirect()->back()->with('error', "Votre e-mail ou votre mot de passe est incorrect !");
    }
}
