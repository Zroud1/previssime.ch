<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// use App\CongeAgents; // Assuming you have a CongeAgents model

// public function cancelConge(Request $request)
// {
//     // Retrieve the records with order = 20232100
//     $congeAgents=CongeAgent::where('order', 20232100)->get();
//     //reulst before anulation [
//     //     {
//     //         "id": 90791,
//     //         "matricule": "01589",
//     //         "annee": "2022",
//     //         "order": "20232100",
//     //         "dateDebut": "2023-08-22",
//     //         "dateFin": "2023-08-28",
//     //         "frtJourneDebut": "Matin",
//     //         "frtJourneFin": "Après midi",
//     //         "type": 1,
//     //         "annule": 0,

//     //     },
//     //     {
//     //         "id": 90792,
//     //         "matricule": "01589",
//     //         "annee": "2023",
//     //         "order": "20232100",
//     //         "dateDebut": "2023-08-29",
//     //         "dateFin": "2023-09-15",
//     //         "frtJourneDebut": "Matin",
//     //         "frtJourneFin": "Après midi",
//     //         "type": 1,
//     //         "annule": 0,
//     //     }
//     // ]



//     // Check if any records were found
//     if ($congeAgents->isEmpty()) {
//         return redirect()->back()->with('error', 'No records found for order 20232100');
//     }



//             $dt_ret = $request->input('dt_ret');
//            $congeAgentPeroide= DB::table('conge_agents') ->select(  DB::raw('MIN(conge_agents.dateDebut) AS DateDebut'),  DB::raw('MAX(conge_agents.dateFin) AS DateFin') )
//            ->where(['conge_agents.order'=> '20232100','conge_agents.annule'=> false,'conge_agents.matricule'=> '01589'])
//             ->groupBy('conge_agents.order' )->orderBy('conge_agents.order') ->first();

//             // result $congeAgentPeroide {
//             //     "DateDebut": "2023-08-22",
//             //     "DateFin": "2023-09-15"
//             // }

//             if (empty($dt_ret) || $dt_ret < $congeAgentPeroide->dateDebut || $dt_ret > $congeAgentPeroide->dateFin) {
//                 return redirect()->back()->with('error', 'Invalid input for Date de reprise');
//             }
// // applay login this

//                //reulst after anulation [
//     //     {
//     //         "id": 90791,
//     //         "matricule": "01589",
//     //         "annee": "2022",
//     //         "order": "20232100",
//     //         "dateDebut": "2023-08-22",
//     //         "dateFin": "2023-08-28",
//     //         "frtJourneDebut": "Matin",
//     //         "frtJourneFin": "Après midi",
//     //         "type": 1,
//     //         "annule": 0,

//     //     },
//     //     {
//     //         "id": 90792,
//     //         "matricule": "01589",
//     //         "annee": "2023",
//     //         "order": "20232100",
//     //         "dateDebut": "2023-08-29",
//     //         "dateFin": "2023-09-15",
//     //         "frtJourneDebut": "Matin",
//     //         "frtJourneFin": "Après midi",
//     //         "type": 1,
//     //         "annule": 1,
//     //     }
//     {
//         //         "id": 90793,
//         //         "matricule": "01589",
//         //         "annee": "2022",
//         //         "order": "20232100",
//         //         "dateDebut": "023-08-25",
//         //         "dateFin": "2023-08-28",
//         //         "frtJourneDebut": "Matin",
//         //         "frtJourneFin": "Après midi",
//         //         "type": 1,
//         //         "annule": 1,
//         //     }
//     // ]





//  }




//  public function cancelConge(Request $request)
// {

//     $congeAgents = CongeAgent::where('order',  $request->order)->get();

//      if ($congeAgents->isEmpty()) {
//         return redirect()->back()->with('error', 'No records found for order 20232100');
//     }

//      $congeAgentPeroide = DB::table('conge_agents')
//         ->select(
//             DB::raw('MIN(conge_agents.dateDebut) AS DateDebut'),
//             DB::raw('MAX(conge_agents.dateFin) AS DateFin')
//         )
//         ->where([
//             'conge_agents.order' => $request->order,
//             'conge_agents.annule' => false,
//             'conge_agents.matricule' => $request->matricule
//         ])
//         ->groupBy('conge_agents.order')
//         ->orderBy('conge_agents.order')
//         ->first();

//      if ( $request->dateReprise < $congeAgentPeroide->DateDebut ||  $request->dateReprise> $congeAgentPeroide->DateFin) {
//         return redirect()->back()->with('error', 'Invalid input for Date de reprise');
//     }

//     foreach ($congeAgents as $congeAgent) {
//         if ($congeAgent->annule == 0) {
//             $DateDebut = $congeAgent->dateDebut;
//             $DateFin = $congeAgent->dateFin;

//             if ($request->dateReprise >= $DateDebut && $request->dateReprise <= $DateFin) {

//                 $congeAgent->update(['dateDebut'=>$request->dateReprise]);

//                $conge=new $congeAgent();
//                $conge->matricule= $congeAgent->matricule;
//                $conge->annee= $congeAgent->annee;
//                $conge->order= $congeAgent->order;
//                $conge->dateDebut= Carbon::parse($request->dateReprise)->addDay();
//                $conge->dateFin= $congeAgent->dateFin;
//                $conge->frtJourneDebut= $congeAgent->frtJourneDebut;
//                $conge->frtJourneFin= $congeAgent->frtJourneFin;
//                $conge->type= $congeAgent->type;
//                $conge->annule = 1;
//                $conge->save();
//              }
//         }
//     }

//     // If none of the non-annulled records match the dateReprise, you can return an error.
//     return redirect()->back()->with('error', 'Invalid input for Date de reprise');



// }




//  //reulst before anulation
//  [
//     {
//         "id": 90791,
//         "matricule": "01589",
//         "annee": "2022",
//         "order": "20232100",
//         "dateDebut": "2023-08-22",
//         "dateFin": "2023-08-28",
//         "frtJourneDebut": "Matin",
//         "frtJourneFin": "Après midi",
//         "type": 1,
//         "annule": 0,

//     },
//     {
//         "id": 90792,
//         "matricule": "01589",
//         "annee": "2023",
//         "order": "20232100",
//         "dateDebut": "2023-08-29",
//         "dateFin": "2023-09-15",
//         "frtJourneDebut": "Matin",
//         "frtJourneFin": "Après midi",
//         "type": 1,
//         "annule": 0,
//     }
// ]




//      //reulst after anulation
// [
//     {
//         "id": 90791,
//         "matricule": "01589",
//         "annee": "2022",
//         "order": "20232100",
//         "dateDebut": "2023-08-22",
//         "dateFin": "2023-08-28",
//         "frtJourneDebut": "Matin",
//         "frtJourneFin": "Après midi",
//         "type": 1,
//         "annule": 0,

//     },
//     {
//         "id": 90792,
//         "matricule": "01589",
//         "annee": "2023",
//         "order": "20232100",
//         "dateDebut": "2023-08-29",
//         "dateFin": "2023-09-15",
//         "frtJourneDebut": "Matin",
//         "frtJourneFin": "Après midi",
//         "type": 1,
//         "annule": 1,
//     }
//     {
//         "id": 90793,
//         "matricule": "01589",
//         "annee": "2022",
//         "order": "20232100",
//         "dateDebut": "023-08-25",
//         "dateFin": "2023-08-28",
//         "frtJourneDebut": "Matin",
//         "frtJourneFin": "Après midi",
//         "type": 1,
//         "annule": 1,
//     }
// ]
