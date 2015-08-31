<?php

use Minedun\LolApi\Lol;

Route::get('/home', [
    'as' => 'home',
    'uses' => 'PagesController@home'
]);

Route::resource('tournaments', 'TournamentController');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/statuses', [
        'as' => 'statuses_path',
        'uses' => 'StatusesController@index'
    ]);

    Route::post('/statuses', [
        'as' => 'statuses_store_path',
        'uses' => 'StatusesController@store'
    ]);

    Route::get('/users', [
        'as' => 'browse_users',
        'uses' => 'PagesController@users'
    ]);

    Route::get('/@{name}', [
        'as' => 'profile_path',
        'uses' => 'UsersController@show'
    ]);

    Route::post('follows', [
        'as' => 'follows_path',
        'uses' => 'FollowersController@store'
    ]);

    Route::delete('follows/{id}', [
        'as' => 'unfollows_path',
        'uses' => 'FollowersController@destroy'
    ]);

    Route::post('statuses/{id}/comments', [
        'as' => 'comment_path',
        'uses' => 'CommentsController@store'
    ]);

    Route::get('/query', 'UsersController@search');

    Route::get('/@{name}/teams', [
        'as' => 'my_teams_path',
        'uses' => 'TeamsController@index'
    ]);

    Route::get('/@{name}/tournaments', [
        'as' => 'my_tournaments_path',
        'uses' => 'TournamentsController@index'
    ]);

    Route::post('/friends', [
        'as' => 'add_friend_path',
        'uses' => 'FriendsController@requestFriendship'
    ]);

    Route::post('/friends/accept', [
        'as' => 'accept_friend_path',
        'uses' => 'FriendsController@acceptFriendship'
    ]);

    Route::delete('/friends/deny/{sender_id}', [
        'as' => 'deny_friend_path',
        'uses' => 'FriendsController@denyFriendship'
    ]);

    Route::post('/@{name}/teams', [
        'as' => 'create_team',
        'uses' => 'TeamsController@create'
    ]);

    Route::get('/@{name}/teams/{team}', [
        'as' => 'user_team',
        'uses' => 'TeamsController@show'
    ]);

    Route::get('/@{name}/teams/{team}/members', [
        'as' => 'team_members',
        'uses' => 'TeamsController@members'
    ]);

    Route::get('/api/users', [
        'as' => 'api_users',
        'uses' => 'UsersController@usersToBeAdded'
    ]);

    Route::post('/@{name}/teams/{team}/members/sendInvitation', [
        'as' => 'addInvitationToTeam',
        'uses' => 'TeamsController@sendInvitation'
    ]);

    Route::post('/teams/accept', [
        'as' => 'accept_team_invite',
        'uses' => 'TeamsController@acceptTeamInvitation'
    ]);

});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

/**
 * Call to LOL API
 */

Route::get('/api/lol', function () {
    $lol = new Lol();
    $api = $lol->Api();
    $api->setRegion('euw');
    $league = $api->team();
    dd($league);
});

