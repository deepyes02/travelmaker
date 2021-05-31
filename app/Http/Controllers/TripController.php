<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\Category;

class TripController extends Controller
{
    //public view trip
    public function index()
    {
        return view('trips', ['trips' => Trip::with('category')->get()]);
    }

    //public view trip by slug
    public function trip_by_slug(Trip $trip)
    {
        return view('trip', ['trip' => $trip]);
    }

    //admin Trips Archieve
    public function getAdminTrips()
    {
        return view('admin.trips', ['trips' => Trip::with('user', 'category')->get()]);
    }
    //admin "Add trip" form view
    public function getAddAdminTrip()
    {
        return view('admin.add-trip', ['categories' => Category::all()]);
    }
    // admin "edit trip" form view
    public function getEditAdminTrip(Trip $trip)
    {
        return view('admin.edit-trip', ['trip' => $trip], ['categories' => Category::all()]);
    }
    public function createNewTrip(Request $request)
    {
        $trip = new Trip;
        $trip->category_id = $request->category;
        $trip->user_id = $request->user_id;
        $trip->name = $request->trip_name;
        $trip->slug = $request->trip_slug;
        $trip->difficulty = $request->trip_difficulty;
        $trip->max_altitude_mtr = $request->trip_max_alt_mtr;
        $trip->save();
        return redirect('admin/edit-trip/' . $trip->slug)->with('status', "Trip {$trip->name} has been added successfully");
    }

    public function updateTrip(Request $request)
    {
        // return $request;
        //grab the trip by it's id
        $trip_id = $request->trip_id;
        $trip = Trip::find($trip_id);
        //start updating new values
        $trip->name = $request->trip_name;
        $trip->slug = $request->trip_slug;
        $trip->difficulty = $request->trip_difficulty;
        $trip->max_altitude_mtr = $request->trip_max_alt_mtr;
        $trip->category_id = $request->category;
        //run the eloquent sql
        $trip->save();
        return redirect("admin/edit-trip/{$trip->slug}")->with('status', "Trip {$trip->name} updated successfully!");
    }

    public function deleteTrip(Request $request)
    {
        $trip = Trip::find($request->trip_id);
        if ($trip !== null) {
            $trip->delete();
            return redirect(route('trips'))->with('status', "Trip {$trip->name} deleted sucessfully");
        } else {
            return redirect(route('trips'))->with('status', "Trip not deleted, try again");
        }
    }

    public function getSoftDeletedTrips()
    {
        return view('admin.trashed-trips', ['trips' => Trip::onlyTrashed()->get()]);
    }

    public function forceDeleteTrip(Request $request)
    {
        $trip = Trip::onlyTrashed()->find($request->trip_id);
        if ($trip !== null) { //make sure trip exists, serverside
            $trip->forceDelete();
            return redirect(route('getTrashedTrips'))->with('status', "Trip {$trip->name} permanently deleted");
        } else {
            return "Sorry trip not found";
        }
    }

    public function restoreTrip(Request $request)
    {
        $trip = Trip::onlyTrashed()->find($request->trip_id);
        if ($trip !== null) {
            $trip->restore();
            return redirect(route('getTrashedTrips'))->with('status', "Trip {$trip->name} restored successfully");
        } else {
            return redirect(route('getTrashedTrips'))->with('status', "Sorry can't restore the trip");
        }
    }
}
