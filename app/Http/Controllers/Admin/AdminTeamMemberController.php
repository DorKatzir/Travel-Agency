<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class AdminTeamMemberController extends Controller
{
    public function index() {
        $team_members = TeamMember::get();
        return view('admin.team.index', compact('team_members'));
    }

    public function create() {
        return view('admin.team.create');
    }

    public function create_submit(Request $request) {

        $obj = new TeamMember();

        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'photo' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);

        $final_name = 'team-member_'.time().'.'.$request->photo->extension();
        $request->photo->move( public_path('uploads'), $final_name );
        $obj->photo = $final_name;

        $obj->name = $request->name;
        $obj->designation = $request->designation;
        $obj->address = $request->address;
        $obj->email = $request->email;
        $obj->phone = $request->phone;
        $obj->biography = $request->biography;
        $obj->facebook = $request->facebook;
        $obj->twitter = $request->twitter;
        $obj->linkedin = $request->linkedin;
        $obj->instagram = $request->instagram;

        $obj->save();

        return redirect()->route('admin_team_index')->with('success','Team Member Created Successfully!');

    }

    public function edit($id) {

        $member = TeamMember::where('id', $id)->first();
        return view('admin.team.edit', compact('member'));
    }

    public function edit_submit(Request $request, $id) {

        $member= TeamMember::where('id', $id)->first();

        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        if ( $request->hasFile('photo') ) {

            $request->validate([
                'photo' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            ]);

            unlink( public_path('uploads/' . $member->photo) );

            $final_name = 'team-member_'.time().'.'.$request->photo->extension();
            $request->photo->move( public_path('uploads'), $final_name );

            $member->photo = $final_name;
        }

        $member->name = $request->name;
        $member->designation = $request->designation;
        $member->address = $request->address;
        $member->email = $request->email;
        $member->phone = $request->phone;
        $member->biography = $request->biography;
        $member->facebook = $request->facebook;
        $member->twitter = $request->twitter;
        $member->linkedin = $request->linkedin;
        $member->instagram = $request->instagram;

        $member->save();

        return redirect()->back()->with('success', 'Team Member Updated Successfully');

    }


    public function delete($id) {

        $member = TeamMember::where('id', $id)->first();
        unlink( public_path('uploads/' . $member->photo) );
        $member->delete();

        return redirect()->route('admin_team_index')->with('success', 'Team Member Deleted Successfully');
    }
}
