<?php

namespace App\Repositories;

use App\Models\Event;
use App\Models\Participant;
use App\Repositories\BaseRepository;
use App\User;
use Carbon\Carbon;
use Auth;

class UserRepository
{

    use BaseRepository;

    protected $model;
    protected $today;

    public function __construct(User $user)
    {
        $this->model = $user;
        $this->today = Carbon::today()->format('Y-m-d');
    }

    /**
     * Get the page of articles without draft scope.
     *
     * @param  integer $number
     * @param  string $sort
     * @param  string $sortColumn
     * @return collection
     */
    public function page($number = 10, $sort = 'desc', $sortColumn = 'created_at')
    {

        return $this->model->orderBy($sortColumn, $sort)->paginate($number);
    }

    /**
     * Get the article record without draft scope.
     *
     * @param  int $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->model->where('id', $id)->with('participantUsers')->first();
    }

    /**
     * Update the article record without draft scope.
     *
     * @param  int $id
     * @param  array $input
     * @return boolean
     */
    public function update($id, $input)
    {
        $this->model = $this->model->withoutGlobalScope(DraftScope::class)->findOrFail($id);

        return $this->save($this->model, $input);
    }

    /**
     * Get the article by article's slug.
     * The Admin can preview the article if the article is drafted.
     *
     * @param $slug
     * @return object
     */
    public function getBySlug($slug)
    {

        $event = $this->model->where('slug', $slug)->firstOrFail();

        return $event;
    }


    /**
     * Search the articles by the keyword.
     *
     * @param  string $key
     * @return collection
     */
    public function search($key)
    {
        $key = trim($key);

        return $this->model
            ->where('title', 'like', "%{$key}%")
            ->orderBy('published_at', 'desc')
            ->get();
    }

    /**
     * Delete the draft article.
     *
     * @param int $id
     * @return boolean
     */
    public function destroy($id)
    {
        return $this->getById($id)->delete();
    }

    public function getUpcomingEvents($sort = 'desc', $sortColumn = 'start_date')
    {
        $select = [
            'e.id',
            'e.title',
            'e.description',
            'e.address',
            'e.start_date',
            'e.end_date',
            'e.user_id',
            'e.slug',
            'e.lat',
            'e.lng',
            'p.user_id as user',
        ];

        return $this->model->select($select)
            ->from('events as e')
            ->leftJoin('participants as p', function ($query) {
                $query->on('p.event_id', '=', 'e.id');
                $query->where('p.user_id', Auth::id());
            })
            ->where('e.end_date', '>', $this->today)
            ->orderBy('e.' . $sortColumn, $sort)
            ->get();
    }

    public function getPastEvents($sort = 'desc', $sortColumn = 'start_date')
    {

        return $this->model
            ->where('end_date', '<', $this->today)
            ->orderBy($sortColumn, $sort)
            ->limit(3)
            ->get();
    }

    public function registerForEvent($event, $user)
    {
        return Participant::create([
            'user_id'  => $user->id,
            'event_id' => $event->id,
        ]);
    }
}
