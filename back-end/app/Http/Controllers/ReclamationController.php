<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Probleme;
use App\Models\Reclamation;
use Database\Seeders\problemSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class ReclamationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Reclamation::select("*", "clients.id as c_id")->join('clients', 'clients.id', '=', 'reclamations.client_id')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // UserController.php

        // public function createUserWithPost(Request $request)
        // {
        //     $user = User::create($request->only(['name', 'email']));
        //     $post = new Post($request->only(['title', 'content']));
        //     $user->posts()->save($post);

        //     return response()->json(['message' => 'User and post created successfully']);
        // }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Create probleme
        $probleme = [
            'description' => $request->description
        ];

        // Create client
        $client = [
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'CIN' => $request->CIN,
            'csc' => $request->csc,
        ];

        // Create reclamation
        $reclamation = [
            'titre' => $request->titre,
            'status' => $request->status
        ];

        $record = Probleme::create($probleme);
        $client['probleme_id'] = $record->id;

        $record2 = Client::create($client);

        $reclamation['client_id'] = $record2->id;

        $record3 = Reclamation::create($reclamation);

        if ($record3) {
            return response()->json(['secces', $record3], 200);
        }


        // $clientID=$client->id;



        // // Create reclamation with the last inserted client and probleme IDs
        // $reclamation = Reclamation::create([
        //     'titre' => $request->titre,
        //     'status' => $request->status,
        //     'client_id' => $clientID,
        // ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Reclamation::select("*", "clients.id as c_id", "problemes.id as p_id")
            ->join('clients', 'clients.id', '=', 'reclamations.client_id')
            ->join('problemes', 'problemes.id', '=', 'clients.probleme_id')
            ->where('reclamations.id', '=', $id)
            ->get();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return Reclamation::select("*", "clients.id as c_id", "problemes.id as p_id")
            ->join('clients', 'clients.id', '=', 'reclamations.client_id')
            ->join('problemes', 'problemes.id', '=', 'clients.probleme_id')
            ->where('reclamations.id', '=', $id)
            ->get();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updatetables = Reclamation::join('clients', 'clients.id', '=', 'reclamations.client_id')
            ->join('problemes', 'problemes.id', '=', 'clients.probleme_id')
            ->where('reclamations.id', '=', $id)
            ->update([
                'problemes.description' => $request->description,
                'clients.nom' => $request->nom,
                'clients.prenom' => $request->prenom,
                'clients.CIN' => $request->CIN,
                'clients.csc' => $request->csc,
                'reclamations.titre' => $request->titre,
                'reclamations.status' => $request->status
            ]);


        return response()->json($updatetables, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $daletetables = Reclamation::join('clients', 'clients.id', '=', 'reclamations.client_id')
            ->join('problemes', 'problemes.id', '=', 'clients.probleme_id')
            ->where('reclamations.id', '=', $id)
            ->delete();
        return response()->json($daletetables, 201);
    }
}