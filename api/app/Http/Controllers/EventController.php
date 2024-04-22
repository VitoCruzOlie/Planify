<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Models\EventUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\EventResource;

class EventController extends Controller
{
    public function __construct(protected Event $repository)
    {

    }
    public function index()
    {
        try {
            $events = $this->repository->with('users')->get();
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

    public function create(EventRequest $request)
    {
        try {
            $event = $request->validated();
            $user = $request->user();

            $eventCreated = $this->repository->create($event);
            $eventCreated->users()->attach($user);

            $invite = EventUser::where('event_id', $eventCreated->id)
                ->where('user_id', $user->id)
                ->first();

            $invite->update(['confirmed' => true]);

            return response()->json([
                "message" => "Event create with sucess",
                "data" => $eventCreated
            ], Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response()->json([
                "message" => $th->getMessage(),
                "data" => []
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(Request $request)
    {
        try {
            $event = $this->repository->findOrFail($request->id);

            $usersConfirmed = $event->users()
                ->wherePivot('confirmed', true)
                ->get();

            $userInvited = $event->users()
                ->wherePivot('confirmed', false)
                ->get();

            return response()->json([
                "message" => "Sucess",
                "data" => [
                    "events" => $event,
                    "users" =>
                        ["users_confirmed" => $usersConfirmed, "users_invited" => $userInvited]
                ]
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                "message" => $th->getMessage(),
                "data" => []
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(Request $request)
    {
        try {
            $event = $this->repository->findOrFail($request->id);
            $event->update($request->all());
            return response()->json([
                "message" => "Sucess",
                "data" => $event
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                "message" => $th->getMessage(),
                "data" => []
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $this->repository->findOrFail($request->id)
                ->delete();

            return response()->json([
                "message" => "",
                "data" => []
            ], Response::HTTP_NO_CONTENT);
        } catch (\Throwable $th) {
            return response()->json([
                "message" => $th->getMessage(),
                "data" => []
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function invite(Request $request)
    {
        try {
            $eventId = $request->id;
            $user = User::where("email", $request->email)->firstOrFail();

            $invite = EventUser::where('event_id', $eventId)
                ->where('user_id', $user->id)
                ->first();

            if ($invite) {
                return response()->json([
                    "message" => "This person is areadly invited",
                    "data" => []
                ], Response::HTTP_BAD_REQUEST);
            }

            $event = $this->repository->findOrFail($eventId);

            $event->users()->attach($user, ['confirmed' => false]);

            return response()->json([
                "message" => "Invite submit with sucess",
                "data" => new EventResource($event->with('users')->find($eventId))
            ], Response::HTTP_CREATED);

        } catch (\Throwable $th) {
            return response()->json([
                "message" => $th->getMessage(),
                "data" => []
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function removeInvite(Request $request)
    {
        try {
            $user = User::where("email", $request->email)->firstOrFail();

            EventUser::where('event_id', $request->id)
                ->where('user_id', $user->id)
                ->delete();

            return response()->json([
                "message" => "",
                "data" => []
            ], Response::HTTP_NO_CONTENT);
        } catch (\Throwable $th) {
            return response()->json([
                "message" => $th->getMessage(),
                "data" => []
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
