<?php namespace IAmLegend\Presenters;


use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter
{

    public function gravatar($email, $size = 30) {
        $email = md5($email);

        return "//www.gravatar.com/avatar/{$email}?s={$size}&d=identicon";
    }

    public function followerCount() {
        $count = $this->entity->followers()->count();
        $plural = str_plural('Follower', $count);

        return "{$count} {$plural}";
    }

    public function statusCount() {
        $count = $this->entity->statuses()->count();
        $plural = str_plural('Status', $count);

        return "{$count} {$plural}";
    }

}