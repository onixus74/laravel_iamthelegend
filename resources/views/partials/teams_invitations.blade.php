<?php $invitations = Auth::user()->getTeamInvites() ?>
<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
       data-close-others="true">
        <i class="fa fa-user-plus"> <span class="badge badge-success"> {{ $invitations->count() }} </span></i>
    </a>
    <ul class="dropdown-menu">
        <li class="external">
            <h3><span class="bold"> {{ $invitations->count() }} pending</span> Invitation(s)</h3>
        </li>
        <li>
            <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                @foreach ( $invitations as $request )
                    <li>
                        <div class="request">
                            <span class="time">
                                <div>
                                    {!! Form::open(['route' => 'accept_team_invite' ,'class' => 'friends_request']) !!}
                                    {!! Form::hidden('teamIdToAccept', $request->team_id) !!}
                                        <button type="submit" class="btn btn-xs"><i class="fa fa-check"></i></button>
                                    {!! Form::close() !!}

                                    {!! Form::open(['class' => 'friends_request']) !!}
                                        <button type="submit" class="btn btn-xs"><i class="fa fa-times"></i></button>
                                    {!! Form::close() !!}
                                </div>
                            </span>
                            <span class="details">
                                <span class="label label-sm label-icon label-success">
                            <i class="fa fa-plus"></i>
                            </span>
                                {{ $request->sender->name }}
                            </span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </li>
    </ul>
</li>