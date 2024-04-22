<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Event;
use App\Models\User;
use App\Models\EventUser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{

    public function index(Request $request)
    {
        try {
            $eventId = $request->event_id;
            $users = User::whereNotIn('id', function ($query) use ($eventId) {
                $query->select('user_id')
                    ->from('event_user')
                    ->where('event_id', $eventId);
            })->get();

            return response()->json([
                "message" => "Sucess",
                "data" => $users
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                "message" => $th->getMessage(),
                "data" => []
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        try {
            $userID = $request->user()->id;

            $user = User::with('events')->findOrFail($userID);

            return response()->json([
                "message" => "Sucess",
                "data" => $user
            ], Response::HTTP_OK);

        } catch (\Throwable $th) {
            return response()->json([
                "message" => $th->getMessage(),
                "data" => []
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $user = $request->user();
            $user->update($request->all());

            return response()->json([
                "message" => "Sucess",
                "data" => $user
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                "message" => $th->getMessage(),
                "data" => []
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function confirmParticipation(Request $request)
    {
        try {
            $userId = $request->user()->id;

            $invite = EventUser::where('event_id', $request->id)
                ->where('user_id', $userId)
                ->first();

            $invite->update(['confirmed' => true]);

            return response()->json([
                "message" => "Confirm invite with sucess",
                "data" => []
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                "message" => $th->getMessage(),
                "data" => []
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function events(Request $request)
    {
        try {
            $userId = $request->user()->id;

            $user = User::find($userId);

            $events = $user->events()
                ->wherePivot('confirmed', true)
                ->get();

            return response()->json([
                "message" => "Sucess",
                "data" => $events
            ], Response::HTTP_OK);

        } catch (\Throwable $th) {
            return response()->json([
                "message" => $th->getMessage(),
                "data" => []
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function eventsInvites(Request $request)
    {
        try {
            $userId = $request->user()->id;

            $user = User::find($userId);

            $events = $user->events()
                ->wherePivot('confirmed', false)
                ->get();

            return response()->json([
                "message" => "Sucess",
                "data" => $events
            ], Response::HTTP_OK);

        } catch (\Throwable $th) {
            return response()->json([
                "message" => $th->getMessage(),
                "data" => []
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
