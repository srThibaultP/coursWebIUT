<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titre = $_POST['titre'];
        $commentaire = $_POST['description'];
        try {
            $user = auth()->user()->id;
            $id = DB::select("SELECT COUNT(*) AS total FROM tickets");
            $id = ($id[0]->total) + 1;
            DB::insert("INSERT INTO laravel.tickets (id, titre, auteur) VALUES (?, ?, ?);", [$id, $titre, $user]);
            return DB::select("INSERT INTO laravel.tickets_commentaires (ticket_id, auteur, commentaire) VALUES (?, ?, ?);", [$id, $user, $commentaire]);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        try {
            $user = auth()->user()->id;
            $listeTickets = DB::select("SELECT DISTINCT t.id, titre, users.name, t.created_at, t.updated_at FROM tickets t INNER JOIN users ON t.auteur = users.id INNER JOIN tickets_commentaires tc ON t.id = tc.ticket_id WHERE t.auteur= $user ORDER BY t.created_at DESC");
            return view('tickets/liste')->with('infos', );
        } catch (\Throwable $th) {
            return $th;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        try {
            $id = $_POST['id'];
            $user = auth()->user()->id;
            return view('tickets/modify')->with('infos', DB::select("SELECT t.id, titre, utc.name, tc.created_at, tc.updated_at, tc.commentaire FROM tickets t INNER JOIN users uta ON t.auteur = uta.id INNER JOIN tickets_commentaires tc ON t.id = tc.ticket_id INNER JOIN users utc ON tc.auteur = utc.id WHERE t.id = $id ORDER BY t.created_at DESC"));
        } catch (\Throwable $th) {
            return $th;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $commentaire = $_POST['description'];
        $ticket_id = $_POST['id'];
        try {
            $user = auth()->user()->id;
            DB::select("INSERT INTO laravel.tickets_commentaires (ticket_id, auteur, commentaire, created_at) VALUES (?, ?, ?, ?);", [$ticket_id, $user, $commentaire, date("Y-m-d H:i:s")]);
            return view('tickets/modify')->with('infos', DB::select("SELECT t.id, titre, utc.name, tc.created_at, tc.updated_at, tc.commentaire FROM tickets t INNER JOIN users uta ON t.auteur = uta.id INNER JOIN tickets_commentaires tc ON t.id = tc.ticket_id INNER JOIN users utc ON tc.auteur = utc.id WHERE t.id = $ticket_id ORDER BY t.created_at DESC"));
        } catch (\Throwable $th) {
            return $th;
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
        //
    }
}
