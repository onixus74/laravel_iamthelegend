<?php namespace IAmLegend\Presenters;


use Laracasts\Presenter\Presenter;

class StatusPresenter extends Presenter
{

    public function timeSincePublished() {
        return $this->created_at->diffForHumans();
    }

}