<?php

namespace Parking\Http\Controllers;

use Illuminate\Http\Request;
use Parking\User;

class WaitingListController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $users = User::whereNotNull('rank')->get();
        return view('editWaitingList', compact('users'));
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        dd($user);
        return redirect()->route('waitingList.edit');
    }
}
